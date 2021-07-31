(function(
    window,
    mapboxgl,
    turf
) {
    mapboxgl.accessToken = window.conf['token'];
    const map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/formsatz/ckdd82sa40tk11iqncuk172qq',
        center: { lng: -1.613660, lat: 54.985688 }, // Newcastle
        // center: { lat: -35.28241, lng: 149.14731 }, // Canberra
        zoom: 14,
        maxZoom: 24,
    });
    window.vos = new Vos(map, turf);
})(
    window,
    mapboxgl,
    turf
);

