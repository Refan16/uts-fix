<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pariwisata Kota Batu</title>
  
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
   integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
   crossorigin=""/>

   <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
   integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
   crossorigin=""></script>

  <style>
    #mapid { height: 300px; }
  </style>
</head>
<header>
  <link href="{{asset('css/info.css')}}" rel="stylesheet">

<h1>INFORMASI PARIWISATA KOTA BATU  </h1>
<h2> Dinas Pariwisata Kota Batu </h2>
  </header>
<body>
<h2 style="color:black"  >Name Location : Coban Rondo  | Description   : Tempat Wisata | Kode Pos      : 65391 </h2>
  <h2 style="color:black"  >latitude      : -7.883889  | longitude     : 112.47667 </h2>
  <h2 style="color:black"  >Maps  </h2>
  <div id="mapid">
  </div>
</body>
<script>
  var mymap = L.map('mapid').setView([-7.876093,112.5077932], 15);
  
  L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		maxZoom: 18,
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox/streets-v11',
		tileSize: 512,
		zoomOffset: -1
	}).addTo(mymap);
  L.marker([-7.876093,112.5077932]).addTo(mymap)
		.bindPopup("<b>Air Terjun</b><br />Coban Rondo Pujon").openPopup();

	L.circle([-7.876093,112.5077932], 300, {
		color: 'red',
		fillColor: '#f03',
		fillOpacity: 0.5
	}).addTo(mymap).bindPopup("I am a circle.");
</script>
</html>
  
  
  
  