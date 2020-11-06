function Handler(map, view) {
    this.map = map;
    this.locate();
    this.view = view;
    this.map.on('click', this.click.bind(this));
    this.map.on('contextmenu', this.rightClick.bind(this));
}
Object.assign(Handler.prototype, {
    click(event) {
        if (this.keyHeld(event)) {
            this.view.setCenter(event.lngLat);
        } else {
            this.view.setDestination(event.lngLat);
        }
    },
    rightClick(event) {
        this.view.setCenter(event.lngLat);
    },
    keyHeld(event) {
        return event.originalEvent.altKey
            || event.originalEvent.metaKey
            || event.originalEvent.shiftKey
        ;
    },
    locate() {
        this.map.addControl(
            new mapboxgl.GeolocateControl({
                positionOptions: {
                    enableHighAccuracy: true
                },
                trackUserLocation: true
            })
        );
    },
});
