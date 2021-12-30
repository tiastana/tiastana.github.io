<!DOCTYPE html>
<html>

<head>
    <title>WebGIS</title>
    <link rel="stylesheet" href="leaflet/leaflet.css" />
    <link rel="stylesheet" href="css/style.css" />
    <script src="leaflet/leaflet.js"></script>
    <script src="leaflet/leaflet-providers-master/leaflet-providers.js"></script>
    <script src="js/jquery.min.js"></script>
</head>

<body>
    <div id="map">
        <script>
            var map = L.map('map').setView([-7.849216, 110.402225], 12);

            var baseLayers = {
                'Esri.WorldTopoMap': L.tileLayer.provider('Esri.WorldTopoMap').addTo(map),
                'Esri WorldImagery': L.tileLayer.provider('Esri.WorldImagery'),
                'OSM Default': L.tileLayer.provider('OpenStreetMap.DE'),
                'OSM France': L.tileLayer.provider('OpenStreetMap.France')
            };

            /* Memanggil Layer Bangunan */
            var diPutat = L.geoJson(null, {
                style: function(feature) {
                    return {
                        color: "red",
                        fill: "red",
                        weight: 1,
                        opacity: 1,
                        fillOpacity: 1
                    };
                }
            });
            $.getJSON("data/daerah_irigasi.geojson", function(data) {
                diPutat.addData(data);
            });

            var mapLayers = {
                'Daerah Irigasi': diPutat
            };

            L.control.layers(baseLayers, mapLayers).addTo(map);
        </script>
    </div>
</body>

</html>