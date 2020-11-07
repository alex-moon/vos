function View(map, manager, turf) {
    this.map = map;
    this.manager = manager;
    this.turf = turf;
    this.map.on('load', this.init.bind(this));
}
Object.assign(View.prototype, {
    center: null,
    bearing: -7.113626699927894,
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
                        'icon-allow-overlap': true,
                        'text-allow-overlap': true,
                        'icon-image': 'custom-marker',
                        'text-field': ['get', 'label'],
                        'text-offset': [0, 1],
                        'text-anchor': 'top'
                    },
                });
                this.map.addLayer({
                    id: 'infos',
                    type: 'symbol',
                    source: 'centers',
                    paint: {
                        'text-color': 'white'
                    },
                    layout: {
                        'text-field': ['get', 'info'],
                        'text-size': 12,
                        'text-offset': [3, 0],
                        'text-anchor': 'left',
                        'text-justify': 'auto',
                    },
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
                this.initPopups();
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
        if (obj.distance.isNull() && obj.aphelion.isNull()) {
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
            return this.getCircle(obj.width, center, true);
        }

        return this.getOval(obj.width, obj.length, center, true);
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
        if (obj.distance.isNull() && obj.aphelion.isNull()) {
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
    getFeature(obj, geometry, type) {
        const properties = {};

        if (type === 'center') {
            properties['info'] = this.getInfo(obj);
            properties['label'] = obj.name;
        }
        return {
            type: 'Feature',
            geometry,
            properties,
        };
    },
    getInfo(obj) {
        let info = [];
        if (obj.distance && !obj.distance.isNullOrZero()) {
            info.push("distance: " + obj.distance.toString());
        }
        if (obj.aphelion && !obj.aphelion.isNullOrZero()) {
            info.push("aphelion: " + obj.aphelion.toString());
        }
        if (obj.perihelion && !obj.perihelion.isNullOrZero()) {
            info.push("perihelion: " + obj.perihelion.toString());
        }
        if (obj.width && !obj.width.isNullOrZero()) {
            info.push("width: " + obj.width.toString());
        }
        if (obj.length && !obj.length.isNullOrZero()) {
            info.push("length: " + obj.length.toString());
        }
        return info.join("\n");
    },
    initPopups() {
        const popup = new mapboxgl.Popup({
            closeButton: false,
            closeOnClick: false
        });

        this.map.on('mouseenter', 'centers', (e) => {
            const description = e.features[0].properties.info;
            if (description) {
                this.map.getCanvas().style.cursor = 'pointer';

                let coordinates = e.features[0].geometry.coordinates.slice();

                while (Math.abs(e.lngLat.lng - coordinates[0]) > 180) {
                    coordinates[0] += e.lngLat.lng > coordinates[0] ? 360 : -360;
                }

                popup.setLngLat(coordinates).setHTML(description).addTo(this.map);
            }
        });

        this.map.on('mouseleave', 'centers', () => {
            this.map.getCanvas().style.cursor = '';
            popup.remove();
        });
    },

    getPoint(center) {
        const point = this.turf.point(
            this.pc(center)
        );
        return point.geometry;
    },
    getCircle(distance, center, isSize) {
        const radius = isSize
            ? distance.valueInKilometers() / 2
            : distance.valueInKilometers();
        const circle = this.turf.circle(
            this.pc(center),
            radius
        );
        return circle.geometry;
    },

    getOrbit(aphelion, perihelion, focus) {
        if (perihelion.isNullOrZero()) {
            return this.getCircle(aphelion, focus);
        }
        if (aphelion.isNullOrZero()) {
            return this.getCircle(perihelion, focus);
        }
        const p = perihelion.valueInKilometers();
        const a = aphelion.valueInKilometers();
        const length = p + a;
        const semiMajorAxis = length / 2;
        const center = this.turf.destination(
            this.pc(focus),
            semiMajorAxis - p,
            this.bearing
        );

        const semiMinorAxis = Math.sqrt(p * a);
        const oval = this.turf.ellipse(
            center.geometry.coordinates,
            semiMinorAxis,
            semiMajorAxis,
            {angle: this.bearing}
        );
        return oval.geometry;
    },

    getOval(width, length, center, isSize) {
        const semiMinorAxis = isSize
            ? width.valueInKilometers() / 2
            : width.valueInKilometers();
        const semiMajorAxis = isSize
            ? length.valueInKilometers() / 2
            : length.valueInKilometers();
        const oval = this.turf.ellipse(
            this.pc(center),
            semiMinorAxis,
            semiMajorAxis,
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
