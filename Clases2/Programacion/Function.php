<?php // apertura 
class Longitud{
  public function mm_mm($cant)
  {
    return $res = $cant/1;
  }
  public function mm_cm($cant)
  {
    return $res = $cant/10;
  }
  public function mm_m($cant)
  {
    return $res = $cant / 1000;
  }
  public function mm_km($cant)
  {
    return $res = $cant / 1000000;
  }
}

$cant = 10;
$desde = 'mm';
$hasta = 'km';
$funcion = $desde.'_'.$hasta;
$resultado = new Longitud();
echo $resultado->$funcion($cant);
//final ?> 