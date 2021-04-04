(function(
    window,
    mapboxgl,
    turf
) {
    mapboxgl.accessToken = window.conf['token'];
    const map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/formsatz/ckdd82sa40tk11iqncuk172qq',
        // center: { lng: -1.6136609779949822, lat: 54.98568856840052 },
        center: { lat: -35.28241, lng: 149.14731 },
        zoom: 14,
        maxZoom: 24,
    });
    window.vos = new Vos(map, turf);
})(
    window,
    mapboxgl,
    turf
);

