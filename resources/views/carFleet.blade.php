<!--
The layout page should be called at the top of every page.
-->
@extends ('layout')

<!--Displays all relevant car data in database for users-->

@section('pageHead')
<title>EZshare - Car  Information</title>
<style>
    body{
    color: #1e3f5a;
    }
    h1{
    padding: 10px;
    }
</style>

@endsection

@section('content')


  <div class="container table-responsive-sm">
    <h1 class = "text-center"> Our Fleet</h1>

    <ul class="nav nav-tabs" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#Tier1">Tier 1</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#Tier2">Tier 2</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#Tier3">Tier 3</a>
      </li>
    </ul>

    <div class="tab-content">

    <div id="Tier1" class="container tab-pane active"><br>
        <table class="table">
          <thead class="thead-dark">
           <tr>
            <th colspan = "3">Tier 1</th>
             </tr>
              </thead>
               <tbody>
<!--The foreach loops goes through each record sent in tier1,2,3 cars and stores it in $car, we use $car in the included page.-->
      @foreach($tier1Cars as $car)
      @include('backend.carInfo')
      @endforeach

        </tbody>
        </table>
         </div>

      <div id="Tier2" class="container tab-pane fade"><br>

          <table class="table">
            <thead class="thead-dark">
             <tr>
              <th colspan = "3">Tier 2</th>
               </tr>
                </thead>
                 <tbody>
        @foreach($tier2Cars as $car)

        @include('backend.carInfo')

        @endforeach


          </tbody>
          </table>
           </div>
        <div id="Tier3" class="container tab-pane fade"><br>

            <table class="table">
              <thead class="thead-dark">
               <tr>
                <th colspan = "3">Tier 3</th>
                 </tr>
                  </thead>
                   <tbody>
          @foreach($tier3Cars as $car)

          @include('backend.carInfo')

          @endforeach


            </tbody>
            </table>
             </div>
        </div>



      </div>

@endsection
