@extends ('layout')
@section('pageHead')
<title>EZshare - Account  Information</title>
<style>
h1{
  padding: 10px;
}
.table{
     margin-bottom: 100px;
}
.container table-responsive-sm{
border-style: solid;

}
</style>
<!--@include('backend.signUpPro')-->
@endsection
@section('content')
<div class="container table-responsive-sm">
  <h1 class = "text-center">My Account</h1>

  <ul class="nav nav-tabs" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" data-toggle="tab" href="#Profile">Profile</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#Bookings">Bookings</a>
    </li>
  </ul>
<div class="tab-content">

<div id="Profile" class="container tab-pane active"><br>

  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th colspan = "3">Profile</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td rowspan="8">  <img src="{{ asset('/icons/profile.png') }}" class="rounded img-fluid"  alt="sedan" width="300" height="500"> </td>
        <!--$email = $_SESSION["email"];-->



@php
$email = "chris@gmail.com";
$users = $customers->where('email', $email);
@endphp
@isset($users)

@foreach($users as $user)
    <th>Name:</th>
      <td>{{$user->firstName}} {{$user->lastName}} </td>
    </tr>
    <tr>
      <th>Email:</th>
      <td> {{$user->email}} </td>
    </tr>
    <tr>
      <th>Phone:</th>
      <td>{{$user->phone}}</td>
    </tr>
    <tr>
      <th>Address:</th>
      <td>{{$user->street}}, {{$user->suburb}}, {{$user->state}}, {{$user->postcode}}, {{$user->country}}</td>
    </tr>
@endforeach


@endisset



      </tr>

    </tbody>
  </table>
</div>
<div id="Bookings" class="container tab-pane fade"><br>
  <table class="table table-bordered">
    <thead class="thead-dark">
      <tr>
            <th colspan = '10' >Current Bookings</th>
      </tr>
    </thead>
    <tbody>

      <tr>
            <th>Booking ID</th>

            <th>Registration Number</th>

            <th>Total Price</th>

            <th>Pick Up location</th>

            <th>Return location</th>

            <th>Date Booked</th>

            <th>Time Booked</th>

            <th>Hours Booked</th>

            <th>Minutes Booked</th>

            <th>Return car?</th>
      </tr>

      @php
        $email = "chris@gmail.com";
        $user = $customers->where('email', $email);
        $userBookings = $bookings->where('email', $email);
        $ongoingBooking = $userBookings->where('completed', 0);
      @endphp

      @if($ongoingBooking->isNotEmpty())

          @foreach($ongoingBooking as $ongoing)
                        <tr>
                        <td>{{$ongoing->bookingID}}</td>
                        <td>{{$ongoing->rego}}</td>
                        <td>{{$ongoing->totalPrice}}</td>
                        <td>{{$ongoing->pickupLocation}}</td>
                        <td>{{$ongoing->returnLocation}}</td>
                        <td>{{$ongoing->dateBooked}}</td>
                        <td>{{$ongoing->timeBooked}}</td>
                        <td>{{$ongoing->hoursBooked}}</td>
                        <td>{{$ongoing->minutesBooked}}</td>
                        <td>
                        <form action='/unbook' method='patch'>
                        {{csrf_field()}}
                        <input type='hidden' id='bookId' name='bookId' value="{{$ongoing->bookingID}}">
                        <input type='hidden' id='carRego' name='carRego' value="{{$ongoing->rego}}">
                        <input type='submit'>
                          </button></form>
                        </td>
                        </tr>
            @endforeach

@else

  <tr>
  <td class='text-center' colspan = '10'>You have no current bookings!</td>
  </tr>
@endif






    </tbody>
  </table>
  <table class="table table-bordered">
    <thead class="thead-dark">
      <tr>
            <th colspan = '9' > Previous Bookings</th>
      </tr>
    </thead>
    <tbody>

      <tr>
            <th>Booking ID</th>

            <th>Registration Number</th>

            <th>Total Price</th>

            <th>Pick Up location</th>

            <th>Return location</th>

            <th>Date Booked</th>

            <th>Time Booked</th>

            <th>Hours Booked</th>

            <th>Minutes Booked</th>

      </tr>
      @php
          $email = "chris@gmail.com";
          $user = $customers->where('email', $email);
          $userBookings = $bookings->where('email', $email);
          $completedBooking = $userBookings->where('completed', 1);
      @endphp

          @if($completedBooking->isNotEmpty())
            @foreach($completedBooking as $completed)
              <tr>
                <td>{{$completed->bookingID}}</td>
                <td>{{$completed->rego}}</td>
                <td>{{$completed->totalPrice}}</td>
                <td>{{$completed->pickupLocation}}</td>
                <td>{{$completed->returnLocation}}</td>
                <td>{{$completed->dateBooked}}</td>
                <td>{{$completed->timeBooked}}</td>
                <td>{{$completed->hoursBooked}}</td>
                <td>{{$completed->minutesBooked}}</td>
              </tr>
            @endforeach
          @else
              <tr>
                <td class='text-center' colspan = '10'>You have no past bookings!</td>
              </tr>
          @endif




    </tbody>
  </table>

</div>

</div>

</div>




@endsection
