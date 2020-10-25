function Size(value, unit) {
    this.value = value;
    this.unit = unit;
}
Size.null = () => {
    return new Size(0, '');
};
Object.assign(Size.prototype, {
    isHumanSized() {
        if (this.unit === 'km') {
            return this.value < 200 && this.value > 0.001;
        }
        if (this.unit === 'm') {
            return this.value < 200000 && this.value > 1;
        }
        return false;
    },
    isNull() {
        return this.unit === '';
    },
    isZero() {
        return this.value === 0;
    },
    isNullOrZero() {
        return this.isNull() || this.isZero();
    },
    valueInKilometers() {
        if (this.unit === 'm') {
            return this.value / 1000;
        }
        return this.value;
    },
    toString() {
        return this.value.toFixed(2)
            + ' '
            + this.unit;
    }
});
