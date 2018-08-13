
function calcdistance(){

var lat1 = 39.46;
var long1 = -0.36;
var lat2 = 40.40;
var long2 = -3.68;

var distance = google.maps.geometry.spherical.computeDistanceBetween(new google.maps.LatLng(latitude1, longitude1), new google.maps.LatLng(latitude2, longitude2));

console.log(lat1);
}
