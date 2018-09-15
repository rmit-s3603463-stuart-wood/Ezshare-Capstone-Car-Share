<!doctype html>
<html lang="en">
<head>
  <?php include_once('head.php'); ?>
  <script src="https://cdn.pubnub.com/sdk/javascript/pubnub.4.19.0.min.js"></script>

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

     </head>
     <body>
      <?php  include_once('navbar.php');?>
      <div id="map"></div>

      <script>

          /**
           * The CenterControl adds a control to the map that recenters the map on
           * Chicago.
           * This constructor takes the control DIV as an argument.
           * @constructor
           */

          //Custom Button
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
          var whitecar = 'resources/assets/icons/white-car.png';
          var redcar = 'resources/assets/icons/yellow-car.png';
          var greycar = 'resources/assets/icons/grey-car.png';
          var contentString;
          var clusterMarker = [];
          var x = 0;

          var initialize = function() {
            map  = new google.maps.Map(document.getElementById('map'),
             {center:{lat:lat,lng:lng},
             zoom:17,
             gestureHandling: 'greedy'});
             var infoWindow = new google.maps.InfoWindow();

             contentString = "You are Here!"
             var userinfowindow = new google.maps.InfoWindow({
                content: contentString
              });
             infoWindow.setContent('You are here!');

            mark = new google.maps.Marker();
            usermark = new google.maps.Marker({position:{lat:lat, lng:lng}, map:map});
            usermark.addListener('click', function() {userinfowindow.open(map, usermark);});
            map.setCenter(currentLocation());

            // Create OverlappingMarkerSpiderfier instsance
              var oms = new OverlappingMarkerSpiderfier(map,
               {markersWontMove: true, markersWontHide: true});

                     // This is necessary to make the Spiderfy work
                oms.addListener('click', function(mark) {
               infoWindow.setContent(mark.desc);
               infoWindow.open(map, mark);
             });

             <?php
                  $sql = "SELECT * FROM cars";// REPLACE SED123 WITH _POST['rego'] whihc is taken from the map button click
                   $result = $conn->query($sql);
                   if ($result->num_rows > 0) {
                   // output data of each row
                   $x=1;
                   $firstNum = true;
                   $row_count = $result->num_rows;
                   $cartier;
                   $loc;
                    while($row = $result->fetch_assoc()) {
                  list($lat, $long) = explode(", ",$row["carCords"]);
                  if(($row["booked"]==0) && ($row["availability"]==1)){
                    if($x==1 || $firstNum == true){
                    $loc = '[{ lat: '.$lat.', lng: '.$long.'}';
                    $cartier = '["'.$row["tier"].'"';
                    $firstNum = false;
                  //  echo $firstNum;
                    }else{

                      if ($x == $row_count) {
                        $loc.=',{lat: '.$lat.', lng: '.$long.'}];';
                        $cartier.=',"'.$row["tier"].'"];';
                     }else{
                       $loc.=',{lat: '.$lat.', lng: '.$long.'}';
                       $cartier.=',"'.$row["tier"].'"';
                     }
                    }

                  }else if($x == $row_count){
                    $loc.='];';
                    $cartier.='];';
                  }
                  $x+=1;

                    }
                    echo "var locations =$loc";
                    echo "var cartier =$cartier";
                  }
                  ?>
                  <?php

                  $sql = "SELECT * FROM cars";// REPLACE SED123 WITH _POST['rego'] whihc is taken from the map button click
                  $result = $conn->query($sql);
                  if ($result->num_rows > 0) {
          // output data of each row
                    $x=1;
                      echo "var markercontent=new Array();";
                     while($row = $result->fetch_assoc()) {
                       if(($row["booked"]==0) && ($row["availability"]==1)){
                       $txt='<div id=\'content\'><div id=\'siteNotice\'></div></div><h1 id=\'firstHeading\' class=\'firstHeading\'>Car '.$x.'</h1><div id=\'bodyContent\'><p>'.$row["make"].' '.$row["model"].'</br> Licence Plate: '.$row["rego"].'</p>';
                       if($row["booked"]==1){
                         $txt.='<p>This car is currently booked.</p>';
                       }elseif($row["availability"]==0){
                         $txt.='<p>This car is currently under maintenance.</p>';
                       }else{
                          $txt.='<p>This car is ready to be used.</p>';
                       }

                        $txt.='<form action=\'bookinginfo.php\' method=\'post\'><button name=\'bookRego\' type=\'submit\' value="'.$row["rego"].'">Book this car</button></form></div></div>';

                       $txt=json_encode($txt,JSON_UNESCAPED_SLASHES);
                       echo "markercontent.push($txt);";
                       $x+=1;

                     }

                     }

                     }
              ?>

              var closest;
              var markArr= new Array();
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
                 }
                  new MarkerClusterer(map, clusterMarker, {imagePath: 'resources/assets/img/m', maxZoom: 15});

                 if (navigator.geolocation) {
                      navigator.geolocation.getCurrentPosition(function(position) {
                       userlat= position.coords.latitude;
                       userlng= position.coords.longitude;
                       google.maps.event.addListener(map, 'click', function() {find_closest_marker(markArr,userlat,userlng,map )});

                   }, function() {
                     handleLocationError(true, infoWindow, map.getCenter());
                   });
                 } else {
                   // Browser doesn't support Geolocation
                   handleLocationError(false, infoWindow, map.getCenter());
                 }

          };

          window.initialize = initialize;

          var redraw = function(payload) {
            lat = payload.message.lat;
            lng = payload.message.lng;
            if(x==0){
              map.setCenter(currentLocation());
              x=1;
            }

            usermark.setPosition({lat:lat, lng:lng, alt:0});
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
          }, 10000);

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
            //  alert(markArr[closest].position);
              // map.setZoom(19);
            //  map.panTo(markArr[closest].position);
              //document.write("succ");
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
                 <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
                 <script async defer
                 src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyC_73tP_C7flbCk3IJKMclKYVWzz2HsVfE&callback=initialize">
               </script>
               <script src="oms.min.js"></script>
               <script src="markerclusterer.min.js"></script>
             </body>
           <?php include_once('footer.php');?>
           </html>
