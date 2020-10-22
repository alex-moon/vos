(function(
    window,
    mapboxgl,
    turf
) {
    mapboxgl.accessToken = window.conf['token'];
    const map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/formsatz/ckdd82sa40tk11iqncuk172qq',
        center: [-1.619675, 55.007126],
        zoom: 14,
    });
    window.vos = new Vos(map, turf);
})(
    window,
    mapboxgl,
    turf
);
