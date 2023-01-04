<?php


//valor del kilometraje actualizable
$killometros=115600;

//valor de cada cuanto se hace el mantenimiento preventivo, este valor cambia dependiendo del mantenimiento en este caso es cambio de aceite
$valoraceite=5000;

//declaracion de variables para definir cuando cambia de color el semafoto
$v=0;
$w=0;
$y=0;
$z=0;

// bucle el cual comienza de 0 y termina en el valor de los kilometros datos, aumentando el valor del mantenimiento
// preventivo en este caso suma cada 5000 km por cambio de aceite

for($x=0;$x<=$killometros;$x=$x+$valoraceite){

    $v=$x;
    //valor de inicio del rango
    echo "inicio=",$v;

    $y= $x+3500;
    //valor intermedio de rango
    echo " medio1=",$y;

    $z= $x+4500;
    //valor intermedio 2 del rango
    echo " medio2=",$z;

    $w= $x+5000;
    //valor final del rango
    echo "fin=",$w;

    echo "</br>";

}
// if para saber a que color semafoto pertenece las variables dadas
if($killometros>=$v && $killometros<$y){
    echo "verde";
}
if($killometros>=$y && $killometros<$z){
    echo "naranja";
}
if($killometros>=$z && $killometros<=$w){
    echo "rojo";
}



