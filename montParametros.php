<!DOCTYPE html>
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

include("api/conexion.php");
$db = getDB();

$res=$db->query("SELECT * FROM USUARIO ORDER by ID_USUARIO DESC LIMIT 1; ");

while ($row = $res->fetch(PDO::FETCH_ASSOC) ) {
    $idusuario=$row['ID_USUARIO'];
    $nombres_apellidos=$row['NOM_USUARIO'];
    $marca=$row['MARCA_USUARIO'];
    $ano=$row['ANO_USUARIO'];
    $placa=$row['PLACA_USUARIO'];
    $correo=$row['CORREO_USUARIO'];
    $killometros=$row['KIL_USUARIO'];
}

$res2=$db->query("SELECT * FROM DATOSSIGFOX ORDER by ID_DATOS DESC LIMIT 1; ");

while ($row = $res2->fetch(PDO::FETCH_ASSOC) ) {
    $ID_DATOS=$row['ID_DATOS'];
    $ID_DEVICE=$row['ID_DEVICE'];
    $OPERADOR=$row['OPERADOR'];
    $TIMESTAMP=$row['TIMESTAMP'];
    $SECUENCIA=$row['SECUENCIA'];
    $DATA=$row['DATA'];
    $RPM=$row['RPM'];
    $VEL=$row['VEL'];
    $IAT=$row['IAT'];
    $TPS=$row['TPS'];
    $ECT=$row['ECT'];
    $MAP=$row['MAP'];
}

//color <120	>=120
$color1="";
if($VEL<120){
    $color1='#00FF04';
}
if($VEL>=120){
    $color1='#FC0000';
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'mail.algoritmia-seap.com';  // Host de conexión SMTP
    $mail->SMTPAuth = true;
    $mail->Username = 'info@algoritmia-seap.com';                 // Usuario SMTP
    $mail->Password = 'Farmacid2022';                           // Password SMTP
    $mail->SMTPSecure = 'tls';                            // Activar seguridad TLS
    $mail->Port = 587;                                    // Puerto SMTP
    $mail->setFrom('info@algoritmia-seap.com');		// Mail del remitente
    $mail->addAddress($correo);     // Mail del destinatario
    $mail->isHTML(true);
    $mail->Subject = 'Velocidad (Km/ H)';  // Asunto del mensaje
    $mail->Body    = 'Hola estimado/a '.$nombres_apellidos.',reduzca la velocidad de manera inmediata, debido a que puede probocar o tener un accidente de tránsito, con consecuencias irreparables';    // Contenido del mensaje (acepta HTML)
    $mail->AltBody = 'Este es el contenido del mensaje en texto plano';    // Contenido del mensaje alternativo (texto plano)
    $mail->send();
    echo '<script>alert("Una Alerta de Velocidad (Km/ H) se ha enviado a su correo electrónico")</script>';
}

//color >=10	<10
$color2="";
if($IAT>10){
    $color2='#00FF04';
}
if($IAT<=10){
    $color2='#FC0000';
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'mail.algoritmia-seap.com';  // Host de conexión SMTP
    $mail->SMTPAuth = true;
    $mail->Username = 'info@algoritmia-seap.com';                 // Usuario SMTP
    $mail->Password = 'Farmacid2022';                           // Password SMTP
    $mail->SMTPSecure = 'tls';                            // Activar seguridad TLS
    $mail->Port = 587;                                    // Puerto SMTP
    $mail->setFrom('info@algoritmia-seap.com');		// Mail del remitente
    $mail->addAddress($correo);     // Mail del destinatario
    $mail->isHTML(true);
    $mail->Subject = 'Sensor IAT (°C)';  // Asunto del mensaje
    $mail->Body    = 'Hola estimado/a '.$nombres_apellidos.',Realizar  lo que recomienda la aplicación de manera urgente. Además leer el siguiente blog para poder obtener mayor información del Sensor IAT, debido a que los valores emitidos por el sensor no son los adecuados. https://www.hella.com/techworld/es/Informacion-Tecnica/Sensores-y-actuadores/Sensor-de-temperatura-del-aire-de-admision-4326/ ';    // Contenido del mensaje (acepta HTML)
    $mail->AltBody = 'Este es el contenido del mensaje en texto plano';    // Contenido del mensaje alternativo (texto plano)
    $mail->send();
    echo '<script>alert("Una Alerta de Sensor IAT (°C) se ha enviado a su correo electrónico")</script>';
}

//color >=0 y <=100	<0 y >100
$color3="";
if($TPS<=100){
    $color3='#00FF04';
}
if($TPS>100){
    $color3='#FC0000';
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'mail.algoritmia-seap.com';  // Host de conexión SMTP
    $mail->SMTPAuth = true;
    $mail->Username = 'info@algoritmia-seap.com';                 // Usuario SMTP
    $mail->Password = 'Farmacid2022';                           // Password SMTP
    $mail->SMTPSecure = 'tls';                            // Activar seguridad TLS
    $mail->Port = 587;                                    // Puerto SMTP
    $mail->setFrom('info@algoritmia-seap.com');		// Mail del remitente
    $mail->addAddress($correo);     // Mail del destinatario
    $mail->isHTML(true);
    $mail->Subject = 'Sensor TPS (%)';  // Asunto del mensaje
    $mail->Body    = 'Hola estimado/a '.$nombres_apellidos.',realizar  lo que recomienda la aplicación de manera urgente. Además leer el siguiente blog para poder obtener mayor información del Sensor TPS, debido a que los valores emitidos por el sensor no son los adecuados.                                           https://codigosdtc.com/sensor-tps/ ';    // Contenido del mensaje (acepta HTML)
    $mail->AltBody = 'Este es el contenido del mensaje en texto plano';    // Contenido del mensaje alternativo (texto plano)
    $mail->send();
    echo '<script>alert("Una Alerta de Sensor TPS (%) se ha enviado a su correo electrónico")</script>';
}


//color 70>=y <95	<70 y >=95
$color4="";
if($ECT>=70 && $ECT<95){
    $color4='#00FF04';
}
if($ECT<70 || $ECT>=95){
    $color4='#FC0000';
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'mail.algoritmia-seap.com';  // Host de conexión SMTP
    $mail->SMTPAuth = true;
    $mail->Username = 'info@algoritmia-seap.com';                 // Usuario SMTP
    $mail->Password = 'Farmacid2022';                           // Password SMTP
    $mail->SMTPSecure = 'tls';                            // Activar seguridad TLS
    $mail->Port = 587;                                    // Puerto SMTP
    $mail->setFrom('info@algoritmia-seap.com');		// Mail del remitente
    $mail->addAddress($correo);     // Mail del destinatario
    $mail->isHTML(true);
    $mail->Subject = 'Sensor ECT (°C)';  // Asunto del mensaje
    $mail->Body    = 'Hola estimado/a '.$nombres_apellidos.', realizar  lo que recomienda la aplicación de manera urgente. Además leer el siguiente blog para poder obtener mayor información del Sensor ECT, debido a que los valores emitidos por el sensor no son los adecuados, o es posible que su motor esté en riesgo.                         https://www.hella.com/techworld/es/Informacion-Tecnica/Sensores-y-actuadores/Revision-del-sensor-de-temperatura-del-refrigerante-4277/              ';    // Contenido del mensaje (acepta HTML)
    $mail->AltBody = 'Este es el contenido del mensaje en texto plano';    // Contenido del mensaje alternativo (texto plano)
    $mail->send();
    echo '<script>alert("Una Alerta de Sensor ECT (°C) se ha enviado a su correo electrónico")</script>';
}

//color >=50 y <190	, <50 y >=190
$color5="";
if($MAP>=50 && $MAP<190){
    $color5='#00FF04';
}
if($MAP<50 || $MAP>=190){
    $color5='#FC0000';
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'mail.algoritmia-seap.com';  // Host de conexión SMTP
    $mail->SMTPAuth = true;
    $mail->Username = 'info@algoritmia-seap.com';                 // Usuario SMTP
    $mail->Password = 'Farmacid2022';                           // Password SMTP
    $mail->SMTPSecure = 'tls';                            // Activar seguridad TLS
    $mail->Port = 587;                                    // Puerto SMTP
    $mail->setFrom('info@algoritmia-seap.com');		// Mail del remitente
    $mail->addAddress($correo);     // Mail del destinatario
    $mail->isHTML(true);
    $mail->Subject = 'Sensor MAP (KPa)';  // Asunto del mensaje
    $mail->Body    = 'Hola estimado/a '.$nombres_apellidos.', realizar  lo que recomienda la aplicación de manera urgente. Además leer el siguiente blog para poder obtener mayor información del Sensor MAP, debido a que los valores emitidos por el sensor no son los adecuados, o es posible que su motor esté en riesgo.                     https://www.autoavance.co/blog-tecnico-automotriz/sensor-map-para-que-sirve/';    // Contenido del mensaje (acepta HTML)
    $mail->AltBody = 'Este es el contenido del mensaje en texto plano';    // Contenido del mensaje alternativo (texto plano)
    $mail->send();
    echo '<script>alert("Una Alerta de Sensor MAP (KPa) se ha enviado a su correo electrónico")</script>';
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
                        <a href="mantPreventivo.php" class="waves-effect waves-dark"><i class="fa fa-desktop"></i>Mantenimiento Preventivo</a>
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

                    <div class="col-xs-12">

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
                            <br>Kilometraje : <strong> <?php echo $killometros ?></strong>
						</div>
                            <div class="card-content">


                                <center><h3><strong>Descripción del dispositivo</strong></h3></center>
                                <br>Id dispositivo : <strong> <?php echo $ID_DEVICE ?></strong>
                                <br>Operador : <strong> <?php echo $OPERADOR ?></strong>
                                <br>Fecha y Hora : <strong> <?php echo $TIMESTAMP ?></strong>
                                <br>Secuencia: <strong> <?php echo $SECUENCIA ?></strong>

                            </div>
                                <div class="card-content">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th>Monitoreo</th>
                                                <th>Valor</th>
                                                <th>Alerta</th>
                                                <th>Info</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>RPM</td>
                                                <td><?php echo $RPM ?></td>
                                                <td><input type="color" value="" disabled></td>

                                            </tr>
                                            <tr>
                                                <td>Velocidad</td>
                                                <td><?php echo $VEL ?></td>
                                                <td><input type="color" value="<?php echo $color1 ?>" disabled></td>
                                                <td><button class="btn btn-info" type="button" data-toggle="modal" data-target="#exampleModal1"></button></td>
                                            </tr>
                                            <tr>
                                                <td>IAT</td>
                                                <td><?php echo $IAT ?></td>
                                                <td><input type="color" value="<?php echo $color2 ?>" disabled></td>
                                                <td><button class="btn btn-info" type="button" data-toggle="modal" data-target="#exampleModal2"></button></td>
                                            </tr>
                                            <tr>
                                                <td>TPS</td>
                                                <td><?php echo $TPS ?></td>
                                                <td><input type="color" value="<?php echo $color3 ?>" disabled></td>
                                                <td><button class="btn btn-info" type="button" data-toggle="modal" data-target="#exampleModal3"></button></td>
                                            </tr>
                                            <tr>
                                                <td>ECT</td>
                                                <td><?php echo $ECT ?></td>
                                                <td><input type="color" value="<?php echo $color4 ?>" disabled></td>
                                                <td><button class="btn btn-info" type="button" data-toggle="modal" data-target="#exampleModal4"></button></td>
                                            </tr>
                                            <tr>
                                                <td>MAP</td>
                                                <td><?php echo $MAP ?></td>
                                                <td><input type="color" value="<?php echo $color5 ?>" disabled></td>
                                                <td><button class="btn btn-info" type="button" data-toggle="modal" data-target="#exampleModal5"></button></td>
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
    </br></br></br></br>   </br></br></br></br>   </br></br></br>
				<footer><p>Todos los derechos reservados: <a href="https://algoritmia-seap.com/">algoritmia-seap.com</a></p>


				</footer></center>
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>

    <!-- Modal 1-->
    <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Velocidad (Km/ H)</h5>
                </div>
                <div class="modal-body">
                    Transitar con una velocidad de acuerdo a las leyes de tránsito.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal 2-->
    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Sensor IAT (°C)</h5>
                </div>
                <div class="modal-body">
                    Sensor IAT (Sensor de temperatura de aire de entrada), basicamente mientras que va aumentando la señal de temperatura en el sensor, la tensión va disminuyendo.
                    <br>Los síntomas de que está fallando el sensor IAT se mencionan a continuación:
                    <br> 1.-Aumento en las emisiones de monóxido de carbono (CO)
                    <br> 2.-Exagerado consumo de combustible.
                    <br> 3.-Inconvenientes en el arranque en frÍo.
                    <br> 4.-Aceleración un poco elevada o marcadamente aumentada.
                    <br> 5.-La computadora no puede controlar adecuadamente el tiempo de encendido.
                    <br> 6.-Advertencia de la luz Check Engine.
                    <br> 7.-Pérdida de potencia
                    <br><br>  Las posibles causas de fallas se mencionan a continuación:
                    <br> 1.-Cortocircuito: Los cables que salen del conector del sensor se encuentran en corto circuito. Esto puede suceder porque el aislante del cable se ha partido o cuarteado y los cables de cobre se han unido porque quedaron expuestos.
                    <br> 2.-El conector del sensor se quebró y las terminales del interior se unieron provocando el corto-circuito.
                    <br> 3.-El sensor se ha dañado por completo.
                    <br><br>  Para poder corregir las posibles causas, se debe realizar lo siguiente:
                    <br> 1.-Revisa que el conector del sensor no se encuentre dañado o quebrado.
                    <br> 2.-Observa los terminales que se encuentran dentro del conector, para verificar si existe un corto circuito.
                    <br> 3.-Inspecciona la goma que aísla ambos cables del conector para ver si esta partida con el cobre expuesto al aire libre.
                    <br> 4.-Comprueba la resistencia del sensor tomando en cuenta la temperatura.
                    <br> 5.-Sustituye el sensor en caso que sea necesario, para realizar este último paso debemos realizar primero una comprobación del mismo, el proceso está en limpienza del sensor IAT, especificado en el mantenimiento preventivo de la aplicación.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal 3-->
    <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Sensor TPS (%)</h5>
                </div>
                <div class="modal-body">

                    Sensor de posición del acelerador, es un transmisor que controla el suministro de combustible en los vehículos a través de una señal que se manda a una computadora.
                    <br><br>Las funciones del sensor TPS son las siguientes:
                    <br>1.-Corregir la dosificación de combustible.
                    <br>2.-Corregir el avance de encendido.
                    <br>3.-Controlar la marcha mínima (ralentí)
                    <br>4.-Controla la activación de la válvula EGR.
                    <br>5.-Controla la activación del Canister.
                    <br>6.-Desconecta el aire acondicionado en aceleración súbita.
                    <br>7.-Conecta a masa cuando la mariposa se encuentra cerrada.
                    <br><br>Para identificar que el sensor TPS presenta falla esté muy atento a las señales que el auto puede presentar, los siguientes síntomas.
                    <br>1.-Pérdida de potencia: es uno de los síntomas que se pueden percibir cuando el sensor TPS se encuentra dañado.
                    <br>2.-Jaloneo del motor: se presenta cuando algunas de las pistas internas tiene una ruptura, esto genera una señal irregular que presenta jaloneo.
                    <br>3.-Marcha mínima (ralentí) inestable: Un problema causado por un TPS en mal estado es la pérdida del control de marcha mínima, quedando el motor acelerado o regulando en un régimen incorrecto.
                    <br>4.-Check engine encendido: en el momento que se enciende el Check engine se debe revisar con el escáner el origen de la falla. Cuanto el TPS presenta alguna falla se enciende este testigo en el tablero.
                    <br>5.-El TPS se desajusta con la temperatura: La falla se presenta como pérdida del control de marcha mínima, en otras palabras el motor se queda acelerado o regula en un régimen inadecuado en ciertas condiciones. El fenómeno se debe a que el TPS al tomar temperatura en el compartimento del motor, modifica su resistencia y el valor mínimo cambia sorpresivamente. En esta condición la ECU no reconoce la condición de marcha mínima y por consiguiente no efectúa su control.
                    <br><br>Las posibles causas de fallas se mencionan a continuación:
                    <br>1.-Cortocircuito: Los cables que salen del conector del sensor se encuentran en corto-circuito. Esto puede suceder porque el aislante del cable se ha partido o cuarteado y los cables de cobre se han unido porque quedaron expuestos.
                    <br>2.-El conector del sensor se quebró y las terminales del interior se unieron provocando el corto-circuito.
                    <br>3.-El sensor se ha dañado por completo.
                    <br><br>Para poder corregir las posibles causas, se debe realizar lo siguiente:
                    <br>1.-Asegurarse que el cableado no esté dañado, ya sea en corto circuito o abierto. En este caso, se debe reemplazar el cableado.
                    <br>2.-Fijarse si el arnés no se encuentre oxidado, sulfatado o quebrado.
                    <br>3.-De ser necesario reemplazarlo, retirar el sensor TPS como si fuera a limpiar el cual se encuentra especificado en el mantenimiento preventivo.

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal 4-->
    <div class="modal fade" id="exampleModal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Sensor ECT (°C)</h5>
                </div>
                <div class="modal-body">
                    El ECT es un sensor termistor, es decir, posee una resistencia que va a cambiar de acuerdo a la variación de la temperatura. Estos tipos de sensores son de Coeficiente de Temperatura Negativo. El significado de este término indica que la resistencia va a disminuir cuando se eleva la temperatura.
                    <br>Los síntomas que presenta el motor que tiene el sensor ECT dañado o sucio son:
                    <br><br>1.-Encendido pobre cuando el motor está frio.
                    <br>2.-Aumento en el consumo de combustible, ya que la ECU intenta enriquecer la mezcla carburante.
                    <br>3.-Disminución de la potencia.
                    <br>4.-Se observa humo negro en el escape.
                    <br> 5.-El motor se sobrecalienta porque el electro-ventilador se retarda en encender o no la hace en absoluto.
                    <br><br>Las posibles causas de fallas se mencionan a continuación:
                    <br>1.-Cortocircuito: Los cables que salen del conector del sensor se encuentran en corto-circuito. Esto puede suceder porque el aislante del cable se ha partido o cuarteado y los cables de cobre se han unido porque quedaron expuestos.
                    <br>2.-El conector del sensor se quebró y las terminales del interior se unieron provocando el corto-circuito.
                    <br>3.-El sensor se ha dañado por completo.
                    <br><br>Para poder corregir las posibles causas, se debe realizar lo siguiente:
                    <br>1.-Revisa que el conector del sensor no se encuentre dañado o quebrado.
                    <br>2.-Observa los terminales que se encuentran dentro del conector, para verificar si existe un corto circuito.
                    <br>3.-Inspecciona la goma que aísla ambos cables del conector para ver si esta partida con el cobre expuesto al aire libre.
                    <br>4.-Comprueba la resistencia del sensor tomando en cuenta la temperatura.
                    <br>5.-Que el anticoagulante no esté viejo o sea de mala calidad.
                    <br>6.-Que el termostato no se encuentre pegado.
                    <br>7.-La bomba de agua funcioné correctamente.
                    <br>8.-Observa que el electro ventilador opere adecuadamente.
                    <br>9.-El aceite se encuentre en el nivel correcto.
                    <br>10.-Sustituye el sensor en caso de que sea necesario, para realizar este último paso debemos realizar primero una comprobación y de ser necesario el cambio, para lo cual se debe seguir la extracción del sensor especificada en el mantenimiento preventivo, en limpieza del sensor ECT.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal 5-->
    <div class="modal fade" id="exampleModal5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Sensor MAP (KPa)</h5>
                </div>
                <div class="modal-body">
                    Sensor de presión absoluta del múltiple, es el encargado de enviar a la computadora la señal que indica los cambios en la presión dentro del múltiple de admisión.
                    <br><br>Los síntomas de falla son los siguientes:
                    <br>1.-Falla en el encendido y detonación excesiva.
                    <br>2.-Perdida de potencia
                    <br>3.-Se eleva el consumo de combustible
                    <br>4.-Humo negro
                    <br>5.-El motor puede detenerse
                    <br>6.-Enciende la luz Check Engine
                    <br><br>Las posibles causas de fallas son las que se mencionan a continuación:
                    <br>1.-El sensor MAP es delicado, por lo tanto se debe tener cuidado al momento de instalar o quitar del motor. Ya que contiene componentes de electrónica.
                    <br>2.-Cualquier tipo de humedad en el aire que ingresa por admisión, puede dañar los componentes internos del sensor.
                    <br>3.-Cuando existen fugas de vacío en el colector de admisión, se presenta un mal funcionamiento del sensor MAP, y su señal es errática.
                    <br>4.-Los daños sobre el cableado del sensor desde y hacia la ecu, así como conectores en mal estado, afectarán el funcionamiento del senso
                    <br><br>Para corregir los diferentes problemas realizar los siguientes pasos:
                    <br>1.-Revisa que el conector del sensor no se encuentre dañado o quebrado.
                    <br>2.-Observa los terminales que se encuentran dentro del conector, para verificar si existe un corto circuito.
                    <br>3.-Inspecciona la goma que aísla ambos cables del conector para ver si esta partida con el cobre expuesto al aire libre.
                    <br>4.-Comprueba la resistencia del sensor tomando en cuenta la temperatura.
                    <br>5.-Sustituye el sensor en caso que sea necesario, para realizar este último paso debemos realizar primero una comprobación del mismo, el proceso que está especificado en limpienza del sensor MAP, del mantenimiento preventivo.

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
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