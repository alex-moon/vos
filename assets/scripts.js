(function(window, mapboxgl) {
    mapboxgl.accessToken = window.conf['token'];
    const map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/formsatz/ckdd82sa40tk11iqncuk172qq',
        center: [-1.619686, 55.007138],
        zoom: 14,
    });
    window.vos = new Vos(map);
})(window, mapboxgl);
