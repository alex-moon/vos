function Handler(map, view) {
    this.map = map;
    this.view = view;
    this.map.on('click', this.click.bind(this));
}
Object.assign(Handler.prototype, {
    click(event) {
        if (this.keyHeld(event)) {
            this.view.setDestination(event.lngLat);
        } else {
            this.view.setCenter(event.lngLat);
        }
    },
    keyHeld(event) {
        return event.originalEvent.altKey
            || event.originalEvent.modKey
            || event.originalEvent.shiftKey
        ;
    }
});
