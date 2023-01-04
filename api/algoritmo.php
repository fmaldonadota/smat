<?php

$killometros=115600;
$valoraceite=5000;

$v=0;
$w=0;
$y=0;
$z=0;

for($x=0;$x<=$killometros;$x=$x+$valoraceite){

    $v=$x;
    echo "inicio=",$v;

    $y= $x+3500;
    echo " medio1=",$y;

    $z= $x+4500;
    echo " medio2=",$z;

    $w= $x+5000;
    echo "fin=",$w;

    echo "</br>";

}

if($killometros>=$v && $killometros<$y){
    echo "verde";
}
if($killometros>=$y && $killometros<$z){
    echo "naranja";
}
if($killometros>=$z && $killometros<=$w){
    echo "rojo";
}



