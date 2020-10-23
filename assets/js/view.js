function View(map, manager, turf) {
    this.map = map;
    this.manager = manager;
    this.turf = turf;
    this.map.on('load', this.init.bind(this));
}
Object.assign(View.prototype, {
    center: null,
    bearing: 0,
    init() {
        this.center = this.map.getCenter().wrap();
        this.map.loadImage(
            '/assets/marker.png',
            (error, image) => {
                if (error) {
                    throw error;
                }

                this.map.addImage('custom-marker', image);

                this.map.addSource('sizes', {
                    type: 'geojson',
                    data: this.getSizes(),
                });
                this.map.addSource('distances', {
                    type: 'geojson',
                    data: this.getDistances(),
                });
                // this.map.addLayer({
                //     id: 'distances',
                //     type: 'line',
                //     source: 'distances',
                //     paint: {
                //         'line-color': '#ffffff',
                //         'line-opacity': 1,
                //         'line-dasharray': [4, 4],
                //     },
                // });
                this.map.addLayer({
                    id: 'sizes-points',
                    type: 'symbol',
                    source: 'sizes',
                    paint: {
                        'text-color': 'white'
                    },
                    layout: {
                        'icon-image': 'custom-marker',
                        'text-field': ['get', 'name'],
                        'text-offset': [0, 1],
                        'text-anchor': 'top'
                    },
                });
                this.map.addLayer({
                    id: 'sizes-lines',
                    type: 'line',
                    source: 'sizes',
                    paint: {
                        'line-color': '#ffffff',
                        'line-opacity': 1,
                    },
                });
            }
        );
    },
    setCenter(center) {
        this.center = center;
        this.reload();
    },
    setDestination(destination) {
        this.bearing = this.turf.bearing(
            this.pc(this.center),
            this.pc(destination)
        );
        this.reload();
    },
    reload() {
        this.map.getSource('sizes').setData(this.getSizes());
        this.map.getSource('distances').setData(this.getDistances());
    },
    getSizes() {
        const data = {
            type: 'FeatureCollection',
            features: [
                this.getFeature(
                    {name: 'Sun'},
                    this.getPoint(this.center)
                ),
            ],
        };
        for (const obj of this.manager.all()) {
            const sizeGeometry = this.getSizeGeometry(obj);
            if (sizeGeometry !== null) {
                data.features.push(this.getFeature(obj, sizeGeometry, 'size'));
            }
        }
        return data;
    },
    getDistances() {
        const data = {
            type: 'FeatureCollection',
            features: [],
        };
        for (const obj of this.manager.all()) {
            const distanceGeometry = this.getDistanceGeometry(obj);
            if (distanceGeometry !== null) {
                data.features.push(this.getFeature(obj, distanceGeometry, 'distance'));
            }
        }
        return data;
    },
    getSizeGeometry(obj) {
        let center;
        try {
            center = this.getCenterLatLng(obj);
        } catch (e) {
            console.log('failed to translate', this.center, obj.distance.valueInKilometers(), this.bearing);
            return null;
        }

        if (obj.length.isNull() && obj.width.isNull()) {
            return this.getPoint(center);
        }

        if (obj.width.isZero()) {
            return this.getPoint(center);
        }

        if (obj.length.isNull()) {
            return this.getCircle(obj.width, center);
        }

        return this.getOval(obj.width, obj.length, center);
    },
    getDistanceGeometry(obj) {
        return null;
        const center = this.center;
        if (obj.aphelion.isNull() && obj.perihelion.isNull()) {
            if (obj.distance.isNull()) {
                return null;
            }

            return this.getCircle(obj.distance, center);
        }

        return this.getOrbit(obj.aphelion, obj.perihelion, center);
    },
    getCenterLatLng(obj) {
        const distance = obj.aphelion.isNull()
            ? obj.distance
            : obj.aphelion
        ;
        console.log('translating', distance, obj);
        const center = this.turf.destination(
            this.pc(this.center),
            distance.valueInKilometers(),
            this.bearing
        );
        return this.ll(center.geometry.coordinates);
    },
    getFeature(obj, geometry, label) {
        const properties = {};

        if (label !== 'distance') {
            properties['name'] = obj.name;
        }
        return {
            type: 'Feature',
            geometry,
            properties,
        };
    },

    getPoint(center) {
        const point = this.turf.point(
            this.pc(center)
        );
        return point.geometry;
    },
    getCircle(distance, center) {
        console.log('getting circle', distance, center);
        const circle = this.turf.circle(
            this.pc(center),
            distance.valueInKilometers()
        );
        return circle.geometry;
    },

    getOrbit(aphelion, perihelion, center) {
        return this.getCircle(aphelion, center);
    },

    getOval(width, length, center) {
        const oval = this.turf.ellipse(
            this.pc(center),
            width.valueInKilometers(),
            length.valueInKilometers()
        );
        return oval.geometry;
    },

    pc(lngLat) {
        return [
            lngLat.lng,
            lngLat.lat
        ];
    },
    ll(coords) {
        return {
            lng: coords[0],
            lat: coords[1],
        };
    },
});
