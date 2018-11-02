@php

  $Loc=$cars->pluck('carCords');
  $Loc=json_encode($Loc);
  echo json_encode($loc);
  

@endphp
