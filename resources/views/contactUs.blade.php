@extends ('layout')
    @section('pageHead')
		<title>Contacts</title>
    <style>
      #HQ {
        height: 27%;
				float:right;

       }
			 h1{
 			  padding: 10px;
 			}
			 .table-borderless td,.table-borderless th {
			     border: 0;
			 }
 .hours{
float:left;

 }
 .contact{

	 clear:left	;
 }
 .foot{
	 clear:both;
 }
		.container {
		position: relative;
		padding-bottom: 20px;
		}

	@media screen and (max-width: 800px) {
    .container, #map {
        width: 100%;
        padding: 0;
    }
}
    </style>
  @section('content')
	<body>
		<div class="container">
			<h1 class = "text-center">Contact US</h1>
			<p class = "text-center">Have a question? Please get in touch by calling the number below.</br> Our dedicated customer care team will get back to you as soon as possible.</p>

					<div class ="hours">
					<table class="table table-borderless">
	  <thead>
	    <tr>
	      <th scope="col" colspan ="2">Customer care operating hours</th>

	    </tr>
	  </thead>
	  <tbody>

	    <tr>
				<td>Monday - Friday:</td>
	      <td>9:00 AM - 5:30PM</td>
	    </tr>
	    <tr>
				<td>Saturday:</td>
	      <td>11:00 AM - 4:30PM</td>
	    </tr>
	    <tr>
				<td>Sundays:</td>
				<td>Closed</td>
	    </tr>

	  </tbody>
	</table>
</div>
<img id ="HQ" img src={{asset('img/HQ.jpg')}} alt="HQ">
<div class="contact">
			<P><mark><u>Phone:</u></mark> 1800 145 234</P>
			<p><mark><u>Location:</u></mark> 123EZshareHQ, East Coburg VIC 3021</p>
		</div>
		 </div>
	</body>
</html>
@endsection
