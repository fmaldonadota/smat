<?php

include("conexion.php");
$db = getDB();

$iduser=$_POST['iduser'];
$kilact=$_POST['kilact'];


$res=$db->query("UPDATE USUARIO SET KIL_USUARIO='$kilact' WHERE ID_USUARIO='$iduser'");

echo '<script>alert(" Se Actualizo el kilometraje correctamente")</script>';
echo "<script language='JavaScript'>";
echo "location = '../mantPreventivo.php'";
echo "</script>";

?>
