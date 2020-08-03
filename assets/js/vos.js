function Vos(map) {
    this.map = map;
    this.manager = new Manager();
    this.view = new View(this.map, this.manager);
}
Object.assign(Vos.prototype, {
    getUrl(form) {
        return [
            '',
            form.elements.target.value,
            form.elements.measure.value,
            form.elements.value.value,
            form.elements.unit.value
        ].join('/');
    },

    async fetch (url) {
        const response = await fetch(url);
        return response.json();
    },

    handleResponse(response) {
        this.manager.load(response.data);
        this.view.reload();
    },

    go(form) {
        this.fetch(this.getUrl(form))
            .then(this.handleResponse.bind(this))
        ;
    }
});
