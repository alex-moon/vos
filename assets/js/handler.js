function Handler(map, view) {
    this.map = map;
    this.locate();
    this.view = view;
    this.map.on('click', this.click.bind(this));
    this.map.on('contextmenu', this.rightClick.bind(this));

    let mobileTimeout;
    let clearMobileTimeout = () => { clearTimeout(mobileTimeout); };
    this.map.on('touchstart', (e) => {
        if (e.originalEvent.touches.length <= 1) {
            mobileTimeout = setTimeout(
                () => {
                    this.rightClick(e)
                },
                500
            );
        }
    });
    this.map.on('touchend', clearMobileTimeout);
    this.map.on('touchcancel', clearMobileTimeout);
    this.map.on('touchmove', clearMobileTimeout);
    this.map.on('pointerdrag', clearMobileTimeout);
    this.map.on('pointermove', clearMobileTimeout);
    this.map.on('moveend', clearMobileTimeout);
    this.map.on('gesturestart', clearMobileTimeout);
    this.map.on('gesturechange', clearMobileTimeout);
    this.map.on('gestureend', clearMobileTimeout);
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
