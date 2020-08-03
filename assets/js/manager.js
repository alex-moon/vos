function Manager() {
    this.celestialObjects = [];
}
Object.assign(Manager.prototype, {
    load(data) {
        this.celestialObjects = [];
        for (const raw of data) {
            this.loadIfHumanSized(raw);
        }
    },
    loadIfHumanSized(raw) {
        const celestialObject = new CelestialObject(raw);
        if (celestialObject.isHumanSized()) {
            this.celestialObjects.push(celestialObject);
        }
    },
    all() {
        return this.celestialObjects;
    }
});
