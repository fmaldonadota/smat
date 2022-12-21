<?php

include("conexion.php");
$db = getDB();

$nompropietario=$_POST['nompropietario'];
$marca = $_POST['marca'];
$ano = $_POST['ano'];
$placa = $_POST['placa'];
$correo = $_POST['correo'];
$kil = $_POST['kil'];

$res=$db->query("INSERT INTO usuario
VALUES ('','$nompropietario','$marca','$ano','$placa','$correo','$kil')");

echo '<script>alert(" Se ingresaron los datos Correctamente")</script>';
echo "<script language='JavaScript'>";
echo "location = '../index.html'";
echo "</script>";

?>
