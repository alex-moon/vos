function Handler(map, view) {
    this.map = map;
    this.view = view;
    this.map.on('click', this.click.bind(this));
    this.map.on('contextmenu', this.rightClick.bind(this));
}
Object.assign(Handler.prototype, {
    click(event) {
        if (this.keyHeld(event)) {
            this.view.setDestination(event.lngLat);
        } else {
            console.log(event.lngLat);
            this.view.setCenter(event.lngLat);
        }
    },
    rightClick(event) {
        this.view.setDestination(event.lngLat);
    },
    keyHeld(event) {
        return event.originalEvent.altKey
            || event.originalEvent.metaKey
            || event.originalEvent.shiftKey
        ;
    }
});
