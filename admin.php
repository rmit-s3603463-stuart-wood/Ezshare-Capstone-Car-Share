<!doctype html>
<html lang="en">
<head>
  <?php include_once('head.php'); ?>
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

     </head>
     <body>
      <?php  include_once('navbar.php');?>
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
      var whitecar = 'resources/assets/icons/white-car.png';
      var redcar = 'resources/assets/icons/yellow-car.png';
      var greycar = 'resources/assets/icons/grey-car.png';
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
         zoom:12,
         gestureHandling: 'greedy'});
         var infoWindow = new google.maps.InfoWindow();

         contentString = "You are Here!"
         var userinfowindow = new google.maps.InfoWindow({
            content: contentString
          });
         infoWindow.setContent('You are here!');

        mark = new google.maps.Marker();
      //  usermark = new google.maps.Marker({position:{lat:lat, lng:lng}, map:map});
      //  usermark.addListener('click', function() {userinfowindow.open(map, usermark);});
        map.setCenter(currentLocation());

        // Create OverlappingMarkerSpiderfier instsance
            oms = new OverlappingMarkerSpiderfier(map,
           {markersWontMove: true, markersWontHide: true});

                 // This is necessary to make the Spiderfy work
            mapListener = oms.addListener('click', function(mark) {
           infoWindow.setContent(mark.desc);
           infoWindow.open(map, mark);
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
                 if($x==1){
                 $loc = '[{ lat: '.$lat.', lng: '.$long.'},';
                 $cartier = '["'.$row["tier"].'",';
                 }else{
                   if ($x == $row_count) {
                     $loc.='{lat: '.$lat.', lng: '.$long.'}];';
                     $cartier.='"'.$row["tier"].'"];';
                  } else {
                    $loc.='{lat: '.$lat.', lng: '.$long.'},';
                    $cartier.='"'.$row["tier"].'",';
                  }
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
                          $txt='<div id=\'content\'><div id=\'siteNotice\'></div></div><h1 id=\'firstHeading\' class=\'firstHeading\'>Car '.$x.'</h1><div id=\'bodyContent\'><p>'.$row["make"].' '.$row["model"].'</br> Licence Plate: '.$row["rego"].'</p>';
                          if($row["booked"]==1){
                            $txt.='<p>This car is currently booked by '.$row["currDriver"].'</p>';
                          }elseif($row["availability"]==0){
                            $txt.='<p>This car is currently under maintenance.</p>';
                          }else{
                             $txt.='<p>This car is ready to be used.</p>';
                          }
                          //$txt.='<p>Total Km: '.$row["totalkm"].' Km</p>';
                          //$txt.='<p>Journey Km: '.$row["journeykm"].' Km</p>';

                          $txt=json_encode($txt,JSON_UNESCAPED_SLASHES);

                          echo "markercontent.push($txt);";
                          $rego=$row["rego"];
                          $rego=json_encode($rego,JSON_UNESCAPED_SLASHES);
                          echo "carRego.push($rego);";

                          $totalkm=$row["totalkm"];
                          $totalkm=json_encode($totalkm,JSON_UNESCAPED_SLASHES);
                          echo "totalkm.push($totalkm);";

                          $currDriver=$row["currDriver"];
                          $currDriver=json_encode($currDriver,JSON_UNESCAPED_SLASHES);
                          echo "currDriver.push($currDriver);";
                          $x+=1;
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

                  clusterMap = new MarkerClusterer(map, clusterMarker, {imagePath: 'resources/assets/img/m', maxZoom: 15});

                  };
                  window.initialize = initialize;

                  function getCords() {
                          if (window.XMLHttpRequest) {
                              // code for IE7+, Firefox, Chrome, Opera, Safari
                              xmlhttp = new XMLHttpRequest();
                          } else {
                              // code for IE6, IE5
                              xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                          }
                          xmlhttp.onreadystatechange = function() {
                              if (this.readyState == 4 && this.status == 200) {
                                 markLoc= JSON.parse(this.responseText);
                              //  markerLoc=this.responseText
                            //    document.write(markLoc[1]);
                              //  document.write(this.responseText);
                              }
                          };
                          xmlhttp.open("GET","getCords.php",true);
                          xmlhttp.send();
                  }


                  function setDistance(currkm,carRego) {

                          if (window.XMLHttpRequest) {
                              // code for IE7+, Firefox, Chrome, Opera, Safari
                              xmlhttp = new XMLHttpRequest();
                          } else {
                              // code for IE6, IE5
                              xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                          }
                          xmlhttp.onreadystatechange = function() {
                              if (this.readyState == 4 && this.status == 200) {
                              //  markerLoc=this.responseText
                            //    document.write(markLoc[1]);
                                //document.write(this.responseText);

                              }
                          };
                          xmlhttp.open("GET","setDis.php?currkm="+currkm+"&carRego="+carRego,true);
                          xmlhttp.send();

                  }
                  function getDistance() {

                          if (window.XMLHttpRequest) {
                              // code for IE7+, Firefox, Chrome, Opera, Safari
                              xmlhttp = new XMLHttpRequest();
                          } else {
                              // code for IE6, IE5
                              xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                          }
                          xmlhttp.onreadystatechange = function() {
                              if (this.readyState == 4 && this.status == 200) {
                                dbCurrKm= JSON.parse(this.responseText);
                            //    document.write(markLoc[1]);
                                //document.write(this.responseText);

                              }
                          };
                          xmlhttp.open("GET","getDis.php",true);
                          xmlhttp.send();

                  }
                  getCords();
                  var lineCoordinatesPath= new Array ();
                  var lineCoords = new Array ();
                  var linelatlng=0;
                  var currKm;
                  var dbCurrKm=[];



                  var redraw = function(payload) {
                    lat = payload.message.lat;
                    lng = payload.message.lng;
                    if(x==0){
                      map.setCenter(currentLocation());

                    }
                    //clusterMap.setMap(null);
                    clusterMap.removeMarkers(markArr);
                    getCords();


                  //  document.write(markLoc[0]);

                    for (var i = 0; i < markArr.length; i ++) {
               var temparray = markLoc[i].split(",");
               var templat = parseFloat(temparray[0]);
               var templng = parseFloat(temparray[1]);
               var templatTEST = parseFloat(temparray[0]);
               var templngTEST = parseFloat(temparray[1]);

            //   document.write("<br>linelatlng: " + linelatlng);
            //   document.write("<br>templat: " + templat);
            //   document.write("<br>templng: " + templng);

               templat += parseFloat(linelatlng);
               templng += parseFloat(linelatlng);
              // document.write("<br>templatUPDATE: " + templat);
            //   document.write("<br>templngUPDATE: " + templng);

               linelatlng+=0.001;
              // document.write(templat +" " +templng+ "------ ");
               var templatlng= new google.maps.LatLng(templat, templng);
               var templatlngTEST= new google.maps.LatLng(templatTEST, templngTEST);
               //document.write("<br>templatlng: " + templatlng);
              //document.write("<br>linelatlng2: " + linelatlng);
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
              //document.write("<br>currkm: " + currkm);
              //document.write("<br>------------");
               setDistance(dbCurrKm[i],carRego[i]);
               var totalkmdec = parseFloat(totalkm[i]+dbCurrKm[i]);
              document.getElementById("car"+[i]).innerHTML = carRego[i];
              document.getElementById("jKm"+[i]).innerHTML = dbCurrKm[i].toFixed(2) +" km";
              document.getElementById("tKm"+[i]).innerHTML = totalkmdec.toFixed(2) +" km";
              document.getElementById("email"+[i]).innerHTML = currDriver[i];
            }else{
              dbCurrKm[i]=0;
            }
               //document.write(currkm);
               if(i==1){
                 markArr[i].setPosition(templatlngTEST);

               }else{
                 markArr[i].setPosition(templatlng);
               }
                //  document.write(templat +" " +templng+ "------ ");
                  if(x==0){
                    lineCoords[i]=new Array(templatlng);
                  }else{
                    lineCoords[i][x]=templatlng;
                  }

              //    lineCoordinatesPath[i] = new google.maps.Polyline({
                //   path: lineCoords[i],
              //     geodesic: true,
              //     strokeColor: '#2E10FF'
              //   });
              //   lineCoordinatesPath[i].setMap(map);

                    }

                      clusterMap.addMarkers(markArr);
                      x+=1;
                      //markArr[i].setMap(null);
                      //markArr[i]=null;
                  //  usermark.setPosition({lat:lat, lng:lng, alt:0});
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
                  }, 1000);

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

                 <table class="table">
                   <tbody>
                   <tr><th class="table-active">Car: </th><th class="table-active">Current Journey km: </th><th class="table-active">Total km traveled: </th><th class="table-active">Booked By: </th></tr>
                   <?php
                   $sql = "SELECT * FROM cars";
                   $result = $conn->query($sql);

                     if ($result->num_rows > 0) {
                       $row_count = $result->num_rows;
                       $x=0;

                       while($row = $result->fetch_assoc()) {
                         echo'<tr><td id="car'.$x.'"></td><td id="jKm'.$x.'"></td><td id="tKm'.$x.'"></td><td id="email'.$x.'"></td></tr>';
                          $x+=1;
                       }

                      }

                   ?>
                 </tbody>
                 </table>

                 <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
                 <script async defer
                 src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyC_73tP_C7flbCk3IJKMclKYVWzz2HsVfE&callback=initialize&libraries=geometry">
               </script>
               <script src="oms.min.js"></script>
               <script src="markerclusterer.min.js"></script>
             </body>
     <?php include_once('footer.php');?>
     </html>
