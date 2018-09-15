<!doctype html>
<html lang="en">
<head>
  <?php include_once('head.php'); ?>
  <script src="calcdistance.js"></script>
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
      <?php require 'db_conn.php';?>
      <div id="map"></div>
      <script>

          /**
           * The CenterControl adds a control to the map that recenters the map on
           * Chicago.
           * This constructor takes the control DIV as an argument.
           * @constructor
           */

          //Custom Button
          function CenterControl(controlDiv) {

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
                    alert("Test");
                    calcdistance();
                  });

                }

                window.onload = function() {
                     // cluster marker
                     var clusterMarker = [];

                     var map = new google.maps.Map(document.getElementById('map'), {
                       center: {lat: -34.397, lng: 150.644},
                       zoom: 6,
                       mapTypeId: 'terrain'
                     });

                     // Create infowindow
                     var infoWindow = new google.maps.InfoWindow();

                     var centerControlDiv = document.createElement('div');
                             var centerControl = new CenterControl(centerControlDiv);

                             centerControlDiv.index = 1;
                             map.controls[google.maps.ControlPosition.RIGHT_TOP].push(centerControlDiv);

                            // Icons
                            var whitecar = 'resources/assets/icons/white-car.png';
                            var redcar = 'resources/assets/icons/red-car.png';
                            var greycar = 'resources/assets/icons/grey-car.png';


                                         if (navigator.geolocation) {
                                           navigator.geolocation.getCurrentPosition(function(position) {
                                             var pos = {
                                               lat: position.coords.latitude,
                                               lng: position.coords.longitude
                                             };

                                             infoWindow.setPosition(pos);
                                             infoWindow.setContent('You are here!');
                                             var marker = new google.maps.Marker({position: pos, map: map});
                                             infoWindow.open(map);
                                             map.setCenter(pos);
                                           }, function() {
                                             handleLocationError(true, infoWindow, map.getCenter());
                                           });
                                         } else {
                                           // Browser doesn't support Geolocation
                                           handleLocationError(false, infoWindow, map.getCenter());
                                         }

                     // Create OverlappingMarkerSpiderfier instsance
                     var oms = new OverlappingMarkerSpiderfier(map,
                       {markersWontMove: true, markersWontHide: true});

                     // This is necessary to make the Spiderfy work
                     oms.addListener('click', function(marker) {
                       infoWindow.setContent(marker.desc);
                       infoWindow.open(map, marker);
                     });
                               <?php
                                                   $sql = "SELECT * FROM cars";// REPLACE SED123 WITH _POST['rego'] whihc is taken from the map button click
                                                    $result = $conn->query($sql);
                                                    if ($result->num_rows > 0) {
                                                    // output data of each row
                                                    $x=1;
                                                    $row_count = $result->num_rows;
                                                    $cartier;
                                                    $loc;
                                                     while($row = $result->fetch_assoc()) {
                                                   list($lat, $long) = explode(", ",$row["carCords"]);
                                                   if(($row["booked"]==0) && ($row["availability"]==1)){
                                                     if($x==1){
                                                     $loc = '[{ lat: '.$lat.', lng: '.$long.'}';
                                                     $cartier = '["'.$row["tier"].'"';
                                                     }else{
                                                       if ($x == $row_count) {
                                                         $loc.=',{lat: '.$lat.', lng: '.$long.'}];';
                                                         $cartier.=',"'.$row["tier"].'"];';
                                                      } else {
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
                     // Some sample data
                     //var sampleData = [{lat:50, lng:3}, {lat:50, lng:3}, {lat:50, lng:7}];

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
                         marker = new google.maps.Marker({
                         icon: carcol,
                         position: location,
                         map: map
                       });

                                                                        // text to appear in window
                                                                       // marker.desc = "Number "+i;
                                                                        marker.desc = markcon;
                                                                        // needed to make Spiderfy work
                                                                        oms.addMarker(marker);

                                                                        // needed to cluster marker
                                                                        clusterMarker.push(marker);
                                                                      }

                                                                      new MarkerClusterer(map, clusterMarker, {imagePath: 'resources/assets/img/m', maxZoom: 15});
                                                                    }
                                                                    
                 </script>

                 <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
                 <script async defer
                 src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC_73tP_C7flbCk3IJKMclKYVWzz2HsVfE">
               </script>
               <script src="oms.min.js"></script>
               <script src="markerclusterer.min.js"></script>
           <?php include_once('footer.php');?>
           </html>
