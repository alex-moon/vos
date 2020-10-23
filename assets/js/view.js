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

                this.map.addSource('centers', {
                    type: 'geojson',
                    data: this.getCenters(),
                });
                this.map.addSource('sizes', {
                    type: 'geojson',
                    data: this.getSizes(),
                });
                this.map.addSource('distances', {
                    type: 'geojson',
                    data: this.getDistances(),
                });
                this.map.addLayer({
                    id: 'distances',
                    type: 'line',
                    source: 'distances',
                    paint: {
                        'line-color': '#ffffff',
                        'line-opacity': 1,
                        'line-dasharray': [4, 4],
                    },
                });
                this.map.addLayer({
                    id: 'centers',
                    type: 'symbol',
                    source: 'centers',
                    paint: {
                        'text-color': 'white'
                    },
                    layout: {
                        'icon-image': 'custom-marker',
                        'text-field': ['get', 'name'],
                        'text-offset': [0, 1],
                        'text-anchor': 'top'
                    },
                    filter: [
                        'all',
                        ['==', ['geometry-type'], 'Point'],
                    ],
                });
                this.map.addLayer({
                    id: 'sizes',
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
        this.map.getSource('centers').setData(this.getCenters());
        this.map.getSource('sizes').setData(this.getSizes());
        this.map.getSource('distances').setData(this.getDistances());
    },
    getCenters() {
        const data = {
            type: 'FeatureCollection',
            features: [
                this.getFeature(
                    {name: 'Sun'},
                    this.getPoint(this.center),
                    'center'
                ),
            ],
        };
        for (const obj of this.manager.all()) {
            const centerGeometry = this.getCenterGeometry(obj);
            if (centerGeometry !== null) {
                data.features.push(this.getFeature(obj, centerGeometry, 'center'));
            }
        }
        return data;
    },
    getSizes() {
        const data = {
            type: 'FeatureCollection',
            features: [],
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
        if (this.getDistanceGeometry(obj) === null) {
            return null;
        }

        let center;
        try {
            center = this.getCenterLatLng(obj);
        } catch (e) {
            console.log('failed to translate', this.center, obj.distance.valueInKilometers(), this.bearing);
            return null;
        }

        if (obj.length.isNull() && obj.width.isNull()) {
            return null;
        }

        if (obj.width.isZero()) {
            return null;
        }

        if (obj.length.isNull()) {
            return this.getCircle(obj.width, center);
        }

        return this.getOval(obj.width, obj.length, center);
    },
    getDistanceGeometry(obj) {
        const center = this.center;
        if (obj.aphelion.isNull() && obj.perihelion.isNull()) {
            if (obj.distance.isNull()) {
                return null;
            }

            return this.getCircle(obj.distance, center);
        }

        return this.getOrbit(obj.aphelion, obj.perihelion, center);
    },
    getCenterGeometry(obj) {
        if (this.getDistanceGeometry(obj) === null) {
            return null;
        }

        let center;
        try {
            center = this.getCenterLatLng(obj);
        } catch (e) {
            console.log('failed to translate', this.center, obj.distance.valueInKilometers(), this.bearing);
            return null;
        }

        return this.getPoint(center);
    },
    getCenterLatLng(obj) {
        const distance = obj.aphelion.isNull()
            ? obj.distance
            : obj.aphelion
        ;
        const center = this.turf.destination(
            this.pc(this.center),
            distance.valueInKilometers(),
            this.bearing
        );
        return this.ll(center.geometry.coordinates);
    },
    getFeature(obj, geometry, label) {
        const properties = {};

        if (label === 'center') {
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
        const circle = this.turf.circle(
            this.pc(center),
            distance.valueInKilometers()
        );
        return circle.geometry;
    },

    getOrbit(aphelion, perihelion, center) {
        try {
            return this.getOval(perihelion, aphelion, center);
        } catch (e) {
            console.log('failed to get orbit', aphelion.valueInKilometers(), perihelion.valueInKilometers(), center);
            return null;
        }
    },

    getOval(width, length, center) {
        const oval = this.turf.ellipse(
            this.pc(center),
            width.valueInKilometers(),
            length.valueInKilometers(),
            {angle: this.bearing}
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
