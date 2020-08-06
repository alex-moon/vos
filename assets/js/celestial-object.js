function CelestialObject(raw) {
    this.id = raw.id;
    this.name = raw.name;
    this.width = this.getIfHumanSized(raw.width);
    this.length = this.getIfHumanSized(raw.length);
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
    getIfHumanSized(raw) {
        if (raw) {
            const size = new Size(raw.value, raw.unit);
            if (size.isHumanSized()) {
                return size;
            }
        }
        return Size.null();
    },
});
