<?php
session_start();
function capcha($length){
$key=NULL;
$dato="0123456789abcdefghijklmnopqrstuvxyz";
for($i=0;$i<$length;$i++){
$key.=$dato{rand(0,34)};
}
return $key;
}

$_SESSION['texto'] =capcha(7);
$foto = imagecreatefromgif("../public/img/image6.gif");
$negro= imagecolorallocate($foto,120,120,120);
$rojo=imagecolorallocate($foto,220,12,20);
//$rgb[0] = rand(0,255);
//$rgb[1] = rand(0,255);
//$rgb[2] = rand(0,255);
//$colorAleatorioInvertido = imagecolorallocate($foto, 255-$rgb[0], 255-$rgb[1], 255-$rgb[2]);
for($j=0;$j<=220;$j=$j+15){
imageline($foto, $a=rand(0,220), 0, $j, 50, $negro);
imageline($foto, 0, $j-6, 220, $j-6,$negro);
}
/*
for ($i = 0;$i <=1500; $i++) {
   $randx = rand(0,220);
   $randy = rand(0,50);
   imagesetpixel($foto, $randx, $randy, $colorAleatorioInvertido);
}*/
//Imagen, tama�o, �ngulo, x, y, color, fuente, texto
//imagefttext($foto, 13,0, 55,14, $rojo, $font,$_SESSION['texto']);
imagestring($foto,90,63,0,$_SESSION['texto'],$rojo);
header("contet-type: image/gif");
imagegif($foto);
imagedestroy($foto);
?>
