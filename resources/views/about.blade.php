<!DOCTYPE html>
<html>

  <head>
    <title>    </title>
  </head>

  <body>
    <ul>
@foreach($users2 as $user2)
<li>
{{$user2->rego}}
</li>

@endforeach
</ul>


  </body>

</html>
