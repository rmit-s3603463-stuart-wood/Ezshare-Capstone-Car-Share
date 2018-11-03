@extends ('layout')
@section('pageHead')
<script src="https://cdn.pubnub.com/sdk/javascript/pubnub.4.19.0.min.js"></script>
<script type="text/javascript" src="http://pubnub.github.io/eon/lib/eon.js"></script>
<link type="text/css" rel="stylesheet" href="http://pubnub.github.io/eon/lib/eon.css" />
<!--<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&v=3&libraries=geometry"></script>-->
<title>EZshare - Car Hire on the Go</title>

   <!--  Bootstrap Code utilized is provided by w3schools at: https://www.w3schools.com/bootstrap4/
      Google Map code is provided by google developer documentation at: https://developers.google.com/maps/documentation/javascript/geolocation*/

        Always set the map height explicitly to define the size of the div
        element that contains the map. -->
        <style>
        #map {
         height: 94.5%;
       }
       /* Optional: Makes the sample page fill the window. */
       html, body {
         height: 100%;
         margin: 0;
         padding: 0;
       }
     </style>
     <!--Only admin can access tis page-->
     <?php
     if(session()->has('email')){
         if(session()->get('email')!='admin@ezshare.com.au'){
           header('Location: /map');
           exit;

         }

     }else{
       header('Location: /');
       exit;
     }
     ?>
@endsection
@section('content')
<div id="map"></div>

<script>

window.lat= -34.39;
window.lng= 150.644;
function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(updatePosition);
    }

    return null;
};

function updatePosition(position) {
  if (position) {
    window.lat = position.coords.latitude;
    window.lng = position.coords.longitude;
  }
}

setInterval(function(){updatePosition(getLocation());}, 500);

function currentLocation() {
  return {lat:window.lat, lng:window.lng};
};

var map;
var mark;
var whitecar = '/icons/white-car.png';
var redcar = '/icons/yellow-car.png';
var greycar = '/icons/grey-car.png';
var contentString;
var clusterMarker = [];
var x = 0;
var oms;
var clusterMap;
var markArr= [];
var markerLoc =[];
var carRego = [];
var currDriver = [];
var totalkm = [];
var initialize = function() {
  map  = new google.maps.Map(document.getElementById('map'),
   {center:{lat:lat,lng:lng},
   zoom:11,
   gestureHandling: 'greedy'});
   var infoWindow = new google.maps.InfoWindow();

   contentString = "You are Here!"
   var userinfowindow = new google.maps.InfoWindow({
      content: contentString
    });
   infoWindow.setContent('You are here!');

  mark = new google.maps.Marker();

  map.setCenter(currentLocation());

  // Create OverlappingMarkerSpiderfier instsance
      oms = new OverlappingMarkerSpiderfier(map,
     {markersWontMove: true, markersWontHide: true});

           // This is necessary to make the Spiderfy work
      mapListener = oms.addListener('click', function(mark) {
     infoWindow.setContent(mark.desc);
     infoWindow.open(map, mark);
   });
   @php
     $x=1;
     $firstNum = true;
     $cartier=0;
     $loc='empty';
   @endphp
   //create locations array for car markers
   @foreach($cars as $car)
   @php
    list($lat, $long) = explode(", ",$car->carCords);
   @endphp
    @if(($car->booked==0) &&($car->availability==1))
       @if($firstNum == true)
       @php
         $loc = '[{ lat: '.$lat.', lng: '.$long.'}';
         $cartier = '["'.$car->tier.'"';
         $firstNum = false;
       @endphp
       @elseif($loop->last)
       @php
       $loc.=',{lat: '.$lat.', lng: '.$long.'}];';
       $cartier.=',"'.$car->tier.'"];';
      @endphp
      @else
      @php
        $loc.=',{lat: '.$lat.', lng: '.$long.'}';
        $cartier.=',"'.$car->tier.'"';
      @endphp
      @endif
    @elseif($loop->last)
    @php
      $loc.='];';
      $cartier.='];';
    @endphp
    @endif
    @php
      $x+=1;
      @endphp
   @endforeach



//create marker popups with relevant car information
   @php
   echo "var locations =".$loc;
   echo "var cartier =".$cartier;
   @endphp
   @php
   $x=1;
   echo "var markercontent=new Array();";
   @endphp

   @foreach($cars as $car)
   @php
   list($lat, $long) = explode(", ",$car->carCords);
   @endphp
    @php
      $txt='<div id=\'content\'><div id=\'siteNotice\'></div></div><h1 id=\'firstHeading\' class=\'firstHeading\'>Car '.$x.'</h1><div id=\'bodyContent\'><p>'.$car->make.' '.$car->model.'</br> Licence Plate: '.$car->rego.'</p>';
  @endphp
       @if($car->booked==1)
      @php
              $txt.='<p>This car is currently booked by '.$car->currDriver.'</p>';
      @endphp
       @elseif($car->availability==0)
      @php
              $txt.='<p>This car is currently under maintenance.</p>';
      @endphp
       @else
      @php
               $txt.='<p>This car is ready to be used.</p>';
      @endphp
       @endif
      @php
              $txt=json_encode($txt,JSON_UNESCAPED_SLASHES);

              echo "markercontent.push($txt);";
              $rego=$car->rego;
              $rego=json_encode($rego,JSON_UNESCAPED_SLASHES);
              echo "carRego.push($rego);";

              $totalkm=$car->totalkm;
              $totalkm=json_encode($totalkm,JSON_UNESCAPED_SLASHES);
              echo "totalkm.push($totalkm);";

              $currDriver=$car->currDriver;
              $currDriver=json_encode($currDriver,JSON_UNESCAPED_SLASHES);
              echo "currDriver.push($currDriver);";
              $x+=1;

      @endphp
   @endforeach

               for (var i = 0; i < locations.length; i ++) {
                 var cartierloc=cartier[i];
                 var carcol=whitecar;
                 var point = locations[i];
                 var markcon= markercontent[i];
                 var location = new google.maps.LatLng(point.lat, point.lng);

                 switch(cartierloc) {
                   case "1":
                   carcol=whitecar;
                   break;
                   case "2":
                   carcol=greycar;
                   break;
                   case "3":
                   carcol=redcar;
                   break;
                   default:
                   carcol="error ";
                 }
                 // create marker at location
                   mark = new google.maps.Marker({
                   icon: carcol,
                   position: location,
                   map: map
                 });

              // text to appear in window
             // marker.desc = "Number "+i;
              mark.desc = markcon;
              // needed to make Spiderfy work
              oms.addMarker(mark);
              // needed to cluster marker
              clusterMarker.push(mark);
              markArr[i]=mark;
              //oms.removeListener('click', mapListener)
            //  oms.removeAllMarkers(markArr);
            //  markers[i].setMap(map);


            }

            clusterMap = new MarkerClusterer(map, clusterMarker, {imagePath: '/icons/m', maxZoom: 15});

            };
            window.initialize = initialize;
            //get the coords for all the cars - USED FOR FAKE CAR MOVEMENT - Not needed with an actual sensor
            function getCords() {
              $.ajax({
                             type:'GET',
                             url:'/getCords',
                             data:'_token = <?php echo csrf_token() ?>',
                             success:function(data){
                                markLoc=data;
                                //  document.write(markLoc);
                             }
                          });

            }



            getCords();

            var lineCoordinatesPath= new Array ();
            var lineCoords = new Array ();
            var linelatlng=0;
            var currKm;
            var dbCurrKm=[];


            //refresh the nearest location of the "find closest car" button
            var redraw = function(payload) {
              lat = payload.message.lat;
              lng = payload.message.lng;
              if(x==0){
                map.setCenter(currentLocation());

              }

              clusterMap.removeMarkers(markArr);
              getCords();
//this simulates car movement on the map - in an actual website with sensor data to get car locations, the car cords would be updated via a database query
              for (var i = 0; i < markArr.length; i ++) {
                 var temparray = markLoc[i].split(",");
                 var templat = parseFloat(temparray[0]);
                 var templng = parseFloat(temparray[1]);
                 var templatTEST = parseFloat(temparray[0]);
                 var templngTEST = parseFloat(temparray[1]);



         templat += parseFloat(linelatlng);
         templng += parseFloat(linelatlng);

         linelatlng+=0.001;
         var templatlng= new google.maps.LatLng(templat, templng);
         var templatlngTEST= new google.maps.LatLng(templatTEST, templngTEST);

         var kmlat = markArr[i].getPosition().lat();
         var kmlng = markArr[i].getPosition().lng();
         var kmlatlng = new google.maps.LatLng(kmlat, kmlng);
         if(i==1){
           currkm = google.maps.geometry.spherical.computeDistanceBetween(templatlngTEST,kmlatlng);
         }else{
           currkm = google.maps.geometry.spherical.computeDistanceBetween(templatlng,kmlatlng);

         }
         if(x!=0){
           dbCurrKm[i] += currkm/1000;

         var totalkmdec = parseFloat(totalkm[i]+dbCurrKm[i]);
        document.getElementById("car"+[i]).innerHTML = carRego[i];
        document.getElementById("jKm"+[i]).innerHTML = dbCurrKm[i].toFixed(2) +" km";
        document.getElementById("tKm"+[i]).innerHTML = totalkmdec.toFixed(2) +" km";
        document.getElementById("email"+[i]).innerHTML = currDriver[i];
      }else{
        dbCurrKm[i]=0;
      }
         if(i==1){
           markArr[i].setPosition(templatlngTEST);

         }else{
           markArr[i].setPosition(templatlng);
         }
            if(x==0){
              lineCoords[i]=new Array(templatlng);
            }else{
              lineCoords[i][x]=templatlng;
            }
              }

                clusterMap.addMarkers(markArr);
                x+=1;

            };

            var pnChannel = "map-channel";

            var pubnub = new PubNub({
            publishKey:   'pub-c-f7bdfeeb-bfd3-4273-85e8-4f134e51931e',
            subscribeKey: 'sub-c-d37a4c6e-b71e-11e8-b27d-1678d61e8f93'
            });

            pubnub.subscribe({channels: [pnChannel]});
            pubnub.addListener({message:redraw});

            setInterval(function() {
              pubnub.publish({channel:pnChannel, message:currentLocation()});
            }, 2500);

            function rad(x) {return x*Math.PI/180;}
            function find_closest_marker(  markArr,userlat,userlng,map ) {
                var lat = userlat;
                var lng = userlng;
                var R = 6371; // radius of earth in km
                var distances = [];
                var closest = -1;
                for( i=0;i<markArr.length; i++ ) {
                    var mlat = markArr[i].position.lat();;
                    var mlng = markArr[i].position.lng();
                    var dLat  = rad(mlat - lat);
                    var dLong = rad(mlng - lng);
                    var a = Math.sin(dLat/2) * Math.sin(dLat/2) +
                            Math.cos(rad(lat)) * Math.cos(rad(lat)) * Math.sin(dLong/2) * Math.sin(dLong/2);
                    var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));
                    var d = R * c;
                    distances[i] = d;
                    if ( closest == -1 || d < distances[closest] ) {
                        closest = i;
                    }
                }

                var centerControlDiv = document.createElement('div');
                var centerControl = new CenterControl(centerControlDiv, map,markArr[closest]);

                centerControlDiv.index = 1;
                map.controls[google.maps.ControlPosition.RIGHT_TOP].push(centerControlDiv);

               }

               function CenterControl(controlDiv, map,closestMarker) {

                    // Set CSS for the control border.
                    var controlUI = document.createElement('div');
                    controlUI.style.backgroundColor = '#fff';
                    controlUI.style.border = '2px solid #fff';
                    controlUI.style.borderRadius = '3px';
                    controlUI.style.boxShadow = '0 2px 6px rgba(0,0,0,.3)';
                    controlUI.style.cursor = 'pointer';
                    controlUI.style.marginBottom = '22px';
                    controlUI.style.textAlign = 'center';
                    controlUI.title = 'Click to locate the nearest car';
                    controlDiv.appendChild(controlUI);

                    // Set CSS for the control interior.
                    var controlText = document.createElement('div');
                    controlText.style.color = 'rgb(25,25,25)';
                    controlText.style.fontFamily = 'Roboto,Arial,sans-serif';
                    controlText.style.fontSize = '16px';
                    controlText.style.lineHeight = '38px';
                    controlText.style.paddingLeft = '5px';
                    controlText.style.paddingRight = '5px';
                    controlText.innerHTML = 'Click to locate the nearest car';
                    controlUI.appendChild(controlText);

                     // Setup the click event listeners: simply set the map to Chicago.
                     controlUI.addEventListener('click', function() {
                       map.setCenter(closestMarker.position);
                     });

                   }

           </script>
<!--The table displays the car coords and data, this is refreshed every 2500 ms-->
           <table class="table">
             <tbody>
             <tr><th class="table-active">Car: </th><th class="table-active">Current Journey km: </th><th class="table-active">Total km traveled: </th><th class="table-active">Booked By: </th></tr>
             <?php $x=0; ?>
             @foreach($cars as $car)
             @php
                echo'<tr><td id="car'.$x.'"></td><td id="jKm'.$x.'"></td><td id="tKm'.$x.'"></td><td id="email'.$x.'"></td></tr>';
                  $x+=1;
             @endphp
             @endforeach

           </tbody>
           </table>

           <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
           <script async defer
           src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyC_73tP_C7flbCk3IJKMclKYVWzz2HsVfE&callback=initialize&libraries=geometry">
         </script>
         <script src="/js/oms.min.js"></script>
         <script src="/js/markerclusterer.min.js"></script>
@endsection
