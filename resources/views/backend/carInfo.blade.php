     <tr><th>{{$car->model}}</th></tr>
     <tr><td rowspan="7">  <img src="{{ asset('/img') }}/{{$car->carPic}}" class="rounded img-fluid border border-dark"  alt="sedan" width="600" height="500"> </td><th class="table-active">Registration Number:</th><td>{{$car->rego}}</td></tr>
     <tr><th class="table-active">Make:</th><td>{{$car->make}}</td></tr>
     <tr><th class="table-active">Year:</th><td>{{$car->year}}</td></tr>
     <tr><th class="table-active">Tier:</th><td>{{$car->tier}}</td></tr>
     <tr><th class="table-active">Number of Seats:</th><td>{{$car->seatNo}}</td></tr>
     <tr><th class="table-active">Engine Type:</th><td>{{$car->engine}}</td></tr>
     <tr><th class="table-active border-color:black">Rental Price per hour:</th><td>${{$car->price}}</td></tr>
