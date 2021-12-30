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
			var map = [];

			/* Basemap Layers */
			var cartoLight = L.tileLayer("https://cartodb-basemaps-{s}.global.ssl.fastly.net/light_all/{z}/{x}/{y}.png", {
				maxZoom: 19,
				attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, &copy; <a href="https://cartodb.com/attributions">CartoDB</a>'
			});

			var G_Street = L.tileLayer('https://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
				maxZoom: 20,
				subdomains: ['mt0', 'mt1', 'mt2', 'mt3'],
				attribution: '&copy; Google Streets'
			});

			var G_Satellite = L.tileLayer('https://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}', {
				maxZoom: 20,
				subdomains: ["mt0", "mt1", "mt2", "mt3"],
				attribution: '&copy; Google Satellite'
			});

			/* Memanggil Layer DI */
			var daerahIrigasi = L.geoJson(null, {
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
				daerahIrigasi.addData(data);
			});

			map = L.map("map", {
				zoom: 14,
				center: [-7.849216, 110.402225],
				// Layers: [daerahIrigasi],
				zoomControl: false,
				attributionControl: false
			});

			var overlayers = {
				"Layers": {
					"Penggunaan Lahan": daerahIrigasi
				}
			};

			var layerControl = L.control.groupedLayers({}, overlayers, {
				collapsed: false,
				position: 'bottomleft'
			}).addTo(map);
		</script>
	</div>
</body>

</html>