function View(map, manager, turf) {
    this.map = map;
    this.manager = manager;
    this.turf = turf;
    this.map.on('load', this.init.bind(this));
}
Object.assign(View.prototype, {
    center: null,
    bearing: null,
    init() {
        this.center = this.map.getCenter().wrap();
        this.map.addSource('data', {
            type: 'geojson',
            data: this.getData(),
        });
        this.map.addLayer({
            id: 'data',
            type: 'line',
            source: 'data',
            paint: {
                'line-color': '#ffffff',
                'line-opacity': 1
            },
        });
        this.map.addLayer({
            'id': 'data-labels',
            'type': 'symbol',
            'source': 'data',
            'paint': {
                'text-color': '#ffffff',
            },
            'layout': {
                'text-field': ['get', 'name'],
                'text-variable-anchor': ['top', 'bottom', 'left', 'right'],
                'text-radial-offset': 0.5,
                'text-justify': 'auto',
                'icon-image': ['concat', ['get', 'icon'], '-15']
            }
        });
    },
    setCenter(center) {
        this.center = center;
        this.reload();
    },
    setDestination(destination) {
        this.bearing = this.turf.bearing(this.center, destination);
        this.reload();
    },
    reload() {
        this.map.getSource('data').setData(this.getData());
    },
    getData() {
        const data = {
            type: 'FeatureCollection',
            features: [],
        };
        for (const obj of this.manager.all()) {
            const distanceGeometry = this.getDistanceGeometry(obj);
            if (distanceGeometry !== null) {
                data.features.push(this.getFeature(obj, distanceGeometry, 'distance'));
                const sizeGeometry = this.getSizeGeometry(obj, distanceGeometry);
                if (sizeGeometry !== null) {
                    data.features.push(this.getFeature(obj, sizeGeometry, 'size'));
                }
            }
        }
        return data;
    },
    getSizeGeometry(obj, distanceGeometry) {
        const center = distanceGeometry.coordinates[0][0];
        if (obj.length.isNull()) {
            if (obj.width.isNull()) {
                return null;
            }

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
    getFeature(obj, geometry, label) {
        return {
            type: 'Feature',
            properties: {
                name: obj.name + ' ' + label,
            },
            geometry: geometry,
        };
    },

    getCircle(distance, center) {
        const circle = this.turf.circle(
            [center.lng, center.lat],
            distance.valueInKilometers()
        );
        console.log('got circle', circle.geometry);
        return circle.geometry;
    },

    getOrbit(aphelion, perihelion, center) {
        return this.getCircle(aphelion, center);
    },

    getOval(width, length, center) {
        return this.getCircle(width, center);
    },
});
