function CelestialObject(raw) {
    this.id = raw.id;
    this.name = raw.name;
    this.width = this.getIfHumanSized(raw.width, true);
    this.length = this.getIfHumanSized(raw.length, true);
    this.distance = this.getIfHumanSized(raw.distance);
    this.aphelion = this.getIfHumanSized(raw.aphelion);
    this.perihelion = this.getIfHumanSized(raw.perihelion);
}
Object.assign(CelestialObject.prototype, {
    isHumanSized() {
        return this.width.isHumanSized()
            || this.length.isHumanSized()
            || this.distance.isHumanSized()
            || this.aphelion.isHumanSized()
            || this.perihelion.isHumanSized()
        ;
    },
    getIfHumanSized(raw, force) {
        if (force === undefined) {
            force = false;
        }

        if (raw) {
            const size = new Size(raw.value, raw.unit);
            if (size.isHumanSized() || force) {
                return size;
            }
        }
        return Size.null();
    },
});
