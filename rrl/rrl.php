<html>
<head>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
  <!-- Leaflet plugin for displaying coordinates -->
  <script src="../maps/Leaflet.Coordinates-0.1.5.src.js"></script>

  
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="../css/style.css">
<style>
body
{
color: orange;
background-image: url(../images/222.jpg);  
background-size: cover; 
background-repeat: no-repeat;
}
input, select
{
color: orange;
background-color: transparent;
border: 0;
}
</style>
</head>
<body>
<?php 
try {
$pdo = new PDO('sqlite:../testdb.sqlite'); 
$id = $_GET['id'];
$sql_a1 = "SELECT a.tx_freq as freq, a.ANGLE_ELEV as angle, a.power as power, a.gain as gain, a.tx_losses as txl,  c.longitude as x, c.latitude as y FROM microws a, microwa b, position_mw c, equip_mw d, antenna_mw e WHERE a.role='A' AND a.MW_ID=".$id." and b.id=a.MW_ID AND a.site_id = c.id and b.eqpmw_id=d.id and a.ant_id=e.id";
$stmt = $pdo->prepare($sql_a1);
$stmt->execute();
$data_a1 =  $stmt->fetch(PDO::FETCH_ASSOC);

$sql_b1 = "SELECT c.longitude as x, c.latitude as y, a.gain as gain, a.rx_losses as rxl FROM microws a, microwa b, position_mw c, equip_mw d, antenna_mw e WHERE a.role='B' AND a.MW_ID=".$id." and b.id=a.MW_ID AND a.site_id = c.id and b.eqpmw_id=d.id and a.ant_id=e.id";
$stmt = $pdo->prepare($sql_b1);
$stmt->execute();
$data_b1 =  $stmt->fetch(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    echo $e->getMessage();  // 如果有错误就输出错误信息
}

?>
<div style="margin-top:15px; margin-left:15px">
<select>
<option selected>RRX-199->RRX-200</option>
</select><br>
Полезный сигнал: <input type="text" id="wantsig" /><br>
Не полезный сигнал: <input type="text" id="unwantsig" /><br>
IRF: <input type="text" id="irf" value="3.6" /><br>
Азимут передатчика: <input id="azimtx" value="12.3" /><br>
Азимут приемника: <input id="azimrx" value="192.3" /><br>
Расстояние: <input id="distxy" value="3520" /><br>

<input type="hidden" id="power" value="<?=$data_a1['power'];?>" />
<input type="hidden" id="gain1" value="<?=$data_a1['gain'];?>" />
<input type="hidden" id="txl1" value="<?=$data_a1['txl'];?>" />
<input type="hidden" id="rxl2" value="<?=$data_b1['rxl'];?>" />
<input type="hidden" id="gain2" value="<?=$data_b1['gain'];?>" />

<input type="hidden" id="coordAx" value="<?=$data_a1['x'];?>" />
<input type="hidden" id="coordAy" value="<?=$data_a1['y'];?>" />
<input type="hidden" id="coordBx" value="<?=$data_b1['x'];?>" />
<input type="hidden" id="coordBy" value="<?=$data_b1['y'];?>" />
<input type="hidden" id="angle" value="<?=$data_a1['angle'];?>" />
<input type="hidden" id="freq" value="<?php echo $data_a1['freq']/1000; ?>" />
</div>
<br>
  <div id="map" style="height: 500px;"></div>
<br>

    <canvas id="chartJSContainer" width="200px" height="100px"></canvas>

</body>
</html>
<script src="../js/chart.js"></script>
<script src="../js/chartjs-plugin-annotation.js"></script>
<script>
function dmsToDecimal(x) {
    x = parseFloat(x);
    var degrees = Math.floor(x);
    var minutes = Math.floor((x - degrees) * 100);
    var seconds = ((x - degrees - minutes / 100) * 10000).toFixed(4);
    
    var dd = degrees + minutes / 60 + seconds / 3600;
    return dd;
}

function deg2rad(deg) {
  return deg * (Math.PI/180);
}

function rad2deg(radians) {
  return radians * 180 / Math.PI;
}

function getDistance(lat1, lon1, lat2, lon2) {
lat1 = parseFloat(lat1);
lat2 = parseFloat(lat2);
lon1 = parseFloat(lon1);
lon2 = parseFloat(lon2);

if (lat1 < -90 || lat1 > 90 || lon1 < -180 || lon1 > 180 ||
        lat2 < -90 || lat2 > 90 || lon2 < -180 || lon2 > 180) {
        console.log("Invalid latitude or longitude values provided.");
        return;
    }


  var R = 6371; // 地球半径，单位为千米
  var dLat = deg2rad(lat2 - lat1);
  var dLon = deg2rad(lon2 - lon1); 
  var a = 
    Math.sin(dLat/2) * Math.sin(dLat/2) +
    Math.cos(deg2rad(lat1)) * Math.cos(deg2rad(lat2)) * 
    Math.sin(dLon/2) * Math.sin(dLon/2)
    ; 
  var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a)); 
  var distance = R * c; // 单位为千米
  return distance;
}

var ax = document.getElementById('coordAx').value;
var ay = document.getElementById('coordAy').value;
var bx = document.getElementById('coordBx').value;
var by = document.getElementById('coordBy').value;
var power = document.getElementById('power').value;
var gain1 = document.getElementById('gain1').value;
var gain2 = document.getElementById('gain2').value;
var txl1 = document.getElementById('txl1').value;
var rxl2 = document.getElementById('rxl2').value;
var freq = document.getElementById('freq').value;
ax = parseFloat(ax);
ay = parseFloat(ay);
bx = parseFloat(bx);
by = parseFloat(by);
freq = parseFloat(freq);
power = parseFloat(power);
console.log(power);
gain1 = parseFloat(gain1);
gain2 = parseFloat(gain2);
txl1 = parseFloat(txl1);
rxl2 = parseFloat(rxl2);
var x1 = dmsToDecimal(ax);
var x2 = dmsToDecimal(bx);
var y1 = dmsToDecimal(ay);
var y2 = dmsToDecimal(by);

var dist = getDistance(y1,x1,y2,x2);
var pointA = [y1,x1];
var pointB = [y2,x2];
var map = L.map('map').setView([y1,x1], 5);
 
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors'
    }).addTo(map);
let circle = L.circleMarker(pointA, {
          radius : 2,
          color  : '#00ffff',
          opacity: 0.75,
        }).addTo(map);
let circle2 = L.circleMarker(pointB, {
          radius : 2,
          color  : '#00ffff',
          opacity: 0.75,
        }).addTo(map);
var polyline = new L.Polyline([pointA,pointB], {
    color: 'red',
    weight: 3,
    opacity: 1

    }).addTo(map);

const eirp1 = power + gain1 - txl1;
const afsl = 32.4 + 20 * Math.log10(freq) + 20 * Math.log10(dist);
rsl1=eirp1-afsl+gain2-rxl2;
var ws = rsl1;
var txantatt = 0;
var rxantatt = 0;
var uws = power-txl1+gain1-txantatt-rxl2+gain2-rxantatt;
document.getElementById("wantsig").value=ws;
document.getElementById("unwantsig").value=uws;
document.getElementById("distxy").value=dist;

L.control.coordinates({
  position: "bottomright",
  decimals: 4,
  decimalSeperator: ".",
  labelTemplateLat: "Долгота： {y}",
  labelTemplateLng: "Ширина： {x}",
  useDMS: true,
  enableUserInput: false
}).addTo(map);





function getMouseElevation(lat, lng) {
var apiKey = 'sk.eyJ1IjoiYW5nZ2FyOTUiLCJhIjoiY2xwYjliZGgyMGVmNzJxcGJjanNxZmNmMyJ9.aQQ-ojygkKQpYw7fTubAcA';
  var url = `https://api.mapbox.com/v4/mapbox.mapbox-terrain-v2/tilequery/${lng},${lat}.json?layers=contour&limit=1&access_token=${apiKey}`;
  fetch(url)
    .then(response => response.json())
    .then(data => {
      var elevation = data.features[0].properties.ele;
      console.log('Ширина：' + lng + ', Долгота：' + lat + ', Высота от море: ' + elevation + ' метр');
      document.getElementById('ags').value = elevation + ' метр';
    })
    .catch(error => console.error('Error：', error));
	

}



function addMarker(point, label, id) {
  var marker = L.marker(point).addTo(map);
  marker.bindPopup("RRL station " + label + "<br>Coordinates: " + id).openPopup();
  return marker;
}


function connectMarkers(markerA, markerB) {
  var latlngs = [markerA.getLatLng(), markerB.getLatLng()];
  var polyline = L.polyline(latlngs, { color: 'red' }).addTo(map);
}


</script>