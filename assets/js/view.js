function View(map, manager) {
    this.map = map;
    this.manager = manager;
    this.map.on('load', this.init.bind(this));
}
Object.assign(View.prototype, {
    init() {
        // this.map.addSource('data', {
        //     type: 'geojson',
        //     data: {},
        // });
    },
    reload() {
        let source = this.map.getSource('data');
        if (source === undefined) {
            this.map.addSource('data', {
                type: 'geojson',
                data: this.getData(),
            });
        } else {
            source.setData(this.getData());
        }
    },
    getData() {
        const data = {
            type: 'FeatureCollection',
            features: [],
        };
        for (const obj of this.manager.all()) {
            const sizeGeometry = this.getSizeGeometry(obj);
            if (sizeGeometry !== null) {
                data.features.push(sizeGeometry);
            }
            const distanceGeometry = this.getDistanceGeometry(obj);
            if (distanceGeometry !== null) {
                data.features.push(distanceGeometry);
            }
        }
        return {
            type: 'geojson',
            data: data,
        };
    },
    getSizeGeometry(obj) {
        const feature = this.getEmptyFeature(obj);
        if (obj.length.isNull()) {
            if (obj.width.isNull()) {
                return null;
            }

            feature.geometry = this.getCircle(obj.width);
            return feature;
        }

        feature.geometry = this.getOval(obj.width, obj.length);
        return feature;
    },
    getDistanceGeometry(obj) {
        const feature = this.getEmptyFeature(obj);
        if (obj.aphelion.isNull() && obj.perihelion.isNull()) {
            if (obj.distance.isNull()) {
                return null;
            }

            feature.geometry = this.getCircle(obj.distance);
            return feature;
        }

        feature.geometry = this.getOrbit(obj.aphelion, obj.perihelion);
        return feature;
    },
    getEmptyFeature(obj) {
        return {
            type: 'Feature',
            properties: {
                name: obj.name,
            },
            geometry: null,
        };
    },
});
