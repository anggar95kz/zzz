    var map = L.map('map').setView([48.0196, 66.9237], 5);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);

    L.control.coordinates({
      position: "bottomright",
      decimals: 4,
      decimalSeperator: ".",
      labelTemplateLat: "Долгота： {y}",
      labelTemplateLng: "Ширина： {x}",
      useDMS: true,
      enableUserInput: false
    }).addTo(map);

function getElevation(lat, lng, apiKey) {
  var url = `https://api.mapbox.com/v4/mapbox.mapbox-terrain-v2/tilequery/${lng},${lat}.json?layers=contour&limit=1&access_token=${apiKey}`;

  fetch(url)
    .then(response => response.json())
    .then(data => {
      var elevation = data.features[0].properties.ele;
      console.log('Ширина：' + lng + ', Долгота：' + lat + ', Высота от море: ' + elevation + ' метр');
    })
    .catch(error => console.error('Error：', error));
}




    map.on('mousemove', function (e) {
      var lat = e.latlng.lat.toFixed(4);
      var lng = e.latlng.lng.toFixed(4);
      var mapboxApiKey = '';
      var elevation = getElevation(lat, lng, mapboxApiKey);
      
    });
