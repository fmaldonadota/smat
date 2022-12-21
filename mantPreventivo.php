<!DOCTYPE html>
<?php

include("api/conexion.php");
$db = getDB();

$res=$db->query("SELECT * FROM usuario ORDER by ID_USUARIO DESC LIMIT 1; ");

while ($row = $res->fetch(PDO::FETCH_ASSOC) ) {
    $idusuario=$row['ID_USUARIO'];
    $nombres_apellidos=$row['NOM_USUARIO'];
    $marca=$row['MARCA_USUARIO'];
    $ano=$row['ANO_USUARIO'];
    $placa=$row['PLACA_USUARIO'];
    $correo=$row['CORREO_USUARIO'];
    $killometros=$row['KIL_USUARIO'];
}

$killometros2=$killometros;
$valoraceite=5000;

$v=0;
$w=0;
$y=0;
$z=0;

$color="";

for($x=0;$x<=$killometros2;$x=$x+$valoraceite){

    $v=$x;
  //  echo "inicio=",$v;

    $y= $x+3500;
  //  echo " medio1=",$y;

    $z= $x+4500;
   // echo " medio2=",$z;

    $w= $x+5000;
   // echo "fin=",$w;

  //  echo "</br>";

}

if($killometros2>=$v && $killometros2<$y){
    $color='#00FF04';
}
if($killometros2>=$y && $killometros2<$z){
    $color="#F39C12";
}
if($killometros2>=$z && $killometros2<=$w){
    $color='#FC0000';
}



?>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SMAT</title>
	
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="assets/materialize/css/materialize.min.css" media="screen,projection" />
    <!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Morris Chart Styles-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="assets/js/Lightweight-Chart/cssCharts.css"> 
</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle waves-effect waves-dark" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand waves-effect waves-dark" href="index.html"><img src="assets/img/logo.png" width="100" height="50"></a>

        </nav>
		<!-- Dropdown Structure -->


	   <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li>
                        <a href="index.html"><i class="fa fa-dashboard"></i>Inicio</a>
                    </li>
                    <li>
                        <a href="mantPreventivo.html" class="waves-effect waves-dark"><i class="fa fa-desktop"></i>Mantenimiento Preventivo</a>
                    </li>
                    <li>
                        <a href="montParametros.php" class="waves-effect waves-dark"><i class="fa fa-bar-chart-o"></i>Monitoreo de Parametros</a>
                    </li>
                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->

		<div id="page-wrapper">

            <div id="page-inner">
                <div class="row">

                    <div class="col-xs-12 col-sm-6 col-md-3">

							<div class="card horizontal cardIcon waves-effect waves-dark">

						<div class="card-stacked">
						<div class="card-content">
                            <center><h3><strong>Descripción del Automovil</strong></h3></center>
                            <br>
                            Nombre del Propietario : <strong> <?php echo $nombres_apellidos ?></strong>
                            <br>Marca : <strong> <?php echo $marca ?></strong>
                            <br> Año: <strong> <?php echo $ano ?></strong>
                            <br>Placa : <strong> <?php echo $placa ?></strong>
                            <br>Correo : <strong> <?php echo $correo ?></strong>
                            <br>Kilometraje : <strong> <?php echo $killometros ?>   </strong>
                            <br><br><center><button class="btn btn-success">Actualizar Kilometraje</button></center>


						</div>
                                <div class="card-content">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th>Mantenimiento</th>
                                                <th>Alerta</th>
                                                <th>Resert</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>Aceite y Filtro</td>
                                                <td><input type="color" value="<?php echo $color ?>" disabled></td>
                                                <td><button class="btn btn-danger">X</button></td>
                                            </tr>
                                            <tr>
                                                <td>Kit de Bomba de Distribución</td>
                                                <td><input type="color" value="#ff0000" disabled></td>
                                                <td><button class="btn btn-danger">X</button></td>
                                            </tr>
                                            <tr>
                                                <td>Revision de Niveles</td>
                                                <td><input type="color" value="#ff0000" disabled></td>
                                                <td><button class="btn btn-danger">X</button></td>
                                            </tr>
                                            <tr>
                                                <td>Verificacion de fugas</td>
                                                <td><input type="color" value="#ff0000" disabled></td>
                                                <td><button class="btn btn-danger">X</button></td>
                                            </tr>
                                            <tr>
                                                <td>Filtro de Aire</td>
                                                <td><input type="color" value="#ff0000" disabled></td>
                                                <td><button class="btn btn-danger">X</button></td>
                                            </tr>
                                            <tr>
                                                <td>Bujias</td>
                                                <td><input type="color" value="#ff0000" disabled></td>
                                                <td><button class="btn btn-danger">X</button></td>
                                            </tr>
                                            <tr>
                                                <td>Aceite de Motor</td>
                                                <td><input type="color" value="#ff0000" disabled></td>
                                                <td><button class="btn btn-danger">X</button></td>
                                            </tr>
                                            <tr>
                                                <td>Liquido de Frenos</td>
                                                <td><input type="color" value="#ff0000" disabled></td>
                                                <td><button class="btn btn-danger">X</button></td>
                                            </tr> <tr>
                                                <td>Liquido Refrigerante</td>
                                                <td><input type="color" value="#ff0000" disabled></td>
                                                <td><button class="btn btn-danger">X</button></td>
                                            </tr> <tr>
                                                <td>ABC Motor</td>
                                                <td><input type="color" value="#ff0000" disabled></td>
                                                <td><button class="btn btn-danger">X</button></td>
                                            </tr>
                                            <tr>
                                                <td>ABC Frenos</td>
                                                <td><input type="color" value="#ff0000" disabled></td>
                                                <td><button class="btn btn-danger">X</button></td>
                                            </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>

						</div>
						</div>

                    </div>

                </div>


<center>
    </br></br></br></br>
				<footer><p>Todos los derechos reservados: <a href="https://algoritmia-seap.com/">algoritmia-seap.com</a></p>


				</footer></center>
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ingreso de Datos</h5>
                </div>
                <div class="modal-body">
                    <input placeholder="Nombre del propietario" id="nompropietario" type="text" class="validate">
                    <input placeholder="Marca" id="marca" type="text" class="validate">
                    <input placeholder="Año" id="ano" type="text" class="validate">
                    <input placeholder="Placa" id="placa" type="text" class="validate">
                    <input placeholder="Correo" id="correo" type="text" class="validate">
                    <input placeholder="Kilometraje" id="kil" type="text" class="validate">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
	
	<!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
	
	<script src="assets/materialize/js/materialize.min.js"></script>
	
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- Morris Chart Js -->
    <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
	
	
	<script src="assets/js/easypiechart.js"></script>
	<script src="assets/js/easypiechart-data.js"></script>
	
	 <script src="assets/js/Lightweight-Chart/jquery.chart.js"></script>
	
    <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script> 
 

</body>

</html>