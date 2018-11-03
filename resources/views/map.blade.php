@extends ('layout')
@section('pageHead')
<script src="https://cdn.pubnub.com/sdk/javascript/pubnub.4.19.0.min.js"></script>
<title>EZshare - Car Hire on the Go</title>
<style>
#map {
 height: 94.5%;
}

html, body {
 height: 100%;
 margin: 0;
 padding: 0;
}
</style>
<?php
if(session()->has('email')){
    if(session()->get('email')=='admin@ezshare.com.au'){
      header('Location: /adminMap');
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



    //get's user location and zooms in on it
    window.lat= -34.39;
    window.lng= 150.644;
    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(updatePosition);
        }

        return null;
    };
    //stores user location with geolocation into variables
    function updatePosition(position) {
      if (position) {
        window.lat = position.coords.latitude;
        window.lng = position.coords.longitude;
      }
    }
    //update user location every 500 ms
    setInterval(function(){updatePosition(getLocation());}, 500);
    //returns user location in array
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
    var markArr= new Array();

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
       @php
       echo "var locations =".$loc;
       echo "var cartier =".$cartier;
       @endphp

       @php
       $x=1;
       echo "var markercontent=new Array();";
       @endphp
       //create marker popups with relevant car information
       @foreach($cars as $car)
       @php
       list($lat, $long) = explode(", ",$car->carCords);
       @endphp
        @if(($car->booked==0) &&($car->availability==1))
        @php
          $txt='<div id=\'content\'><div id=\'siteNotice\'></div></div><h1 id=\'firstHeading\' class=\'firstHeading\'>Car '.$x.'</h1><div id=\'bodyContent\'><p>'.$car->make.' '.$car->model.'</br> Licence Plate: '.$car->rego.'</p>';
          $txt.='<p>This car is ready to be used.</p>';
          $txt.='<form action=\'/bookings\' method=\'post\'>'.csrf_field().'<button name=\'bookRego\' type=\'submit\' value="'.$car->rego.'">Book this car</button></form></div></div>';
          $txt=json_encode($txt,JSON_UNESCAPED_SLASHES);
          echo "markercontent.push($txt);";
          $x+=1;
          @endphp
        @endif
       @endforeach
       //Create each car marker and put them into clusters
        var closest;
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


             mark.desc = markcon;
             // needed to make Spiderfy work
             oms.addMarker(mark);

             // needed to cluster marker
             clusterMarker.push(mark);

             markArr[i]=mark;
           }
            new MarkerClusterer(map, clusterMarker, {imagePath: '/icons/m', maxZoom: 15});
            //creates button to find closes car to users location
           if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                 userlat= position.coords.latitude;
                 userlng= position.coords.longitude;
                 find_closest_marker(markArr,userlat,userlng,map);

             }, function() {
               handleLocationError(true, infoWindow, map.getCenter());
             });
           } else {
             // Browser doesn't support Geolocation
             handleLocationError(false, infoWindow, map.getCenter());
           }

    };

    window.initialize = initialize;
//refresh the nearest location of the "find closest car" button
    var redraw = function(payload) {
      lat = payload.message.lat;
      lng = payload.message.lng;
      if(x==0){
        map.setCenter(currentLocation());
        x=1;
      }

      usermark.setPosition({lat:lat, lng:lng, alt:0});
      map.controls[google.maps.ControlPosition.RIGHT_TOP].clear();
      find_closest_marker(markArr,lat,lng,map);
    };
//generates unique channel so that each user has a seperate map instance
    <?php
        if(session()->has('email'))
        {
               $x = rand();
               $x = md5(session()->get('email').$x);
               echo 'var UserID ="'.$x.'" ;';

        }
    ?>
    var pnChannel= "map-channel"+UserID;
    var pubnub = new PubNub({
    publishKey:   'pub-c-f7bdfeeb-bfd3-4273-85e8-4f134e51931e',
    subscribeKey: 'sub-c-d37a4c6e-b71e-11e8-b27d-1678d61e8f93'
    });
//redraws the map
    pubnub.subscribe({channels: [pnChannel]});
    pubnub.addListener({message:redraw});
//refreshes map every 5000 ms
    setInterval(function() {
      pubnub.publish({channel:pnChannel, message:currentLocation()});
    }, 5000);
//calculates closest car to user
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
       var eventExists =false;
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
             if(eventExists==true){
               controlUI.removeEventListener('click', function() {
                 map.setCenter(closestMarker.position);
               });
               controlUI.addEventListener('click', function() {
                 map.setCenter(closestMarker.position);
               });

             }else{
               controlUI.addEventListener('click', function() {
                 map.setCenter(closestMarker.position);
               });
               eventExists=true;
             }


           }

           </script>
           <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
           <script async defer
           src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyC_73tP_C7flbCk3IJKMclKYVWzz2HsVfE&callback=initialize">
         </script>
         <script src="/js/oms.min.js"></script>
         <script src="/js/markerclusterer.min.js"></script>

@endsection
