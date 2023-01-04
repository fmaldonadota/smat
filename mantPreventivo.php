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

$killometros2=$killometros;
$valoraceite=5000;

$v=0;
$w=0;
$y=0;
$z=0;

//color 5000 --- < 3500  >=3500 y <4500 >=4500 y <5000
$color="";
for($x=0;$x<=$killometros2;$x=$x+$valoraceite){
    $v=$x;
    $y= $x+3500;
    $z= $x+4500;
    $w= $x+5000;
}

if($killometros2>=$v && $killometros2<$y){
    $color='#00FF04';
}
if($killometros2>=$y && $killometros2<$z){
    $color="#F39C12";

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
    $mail->Subject = 'Cambio de Aceite Motor y Filtro';  // Asunto del mensaje
    $mail->Body    = 'Hola estimado/a '.$nombres_apellidos.', recomendamos por precaución de su motor un cambio de aceite y filtro del mismo.';    // Contenido del mensaje (acepta HTML)
    $mail->AltBody = 'Este es el contenido del mensaje en texto plano';    // Contenido del mensaje alternativo (texto plano)
    $mail->send();
    echo '<script>alert("Una Alerta de Cambio de Aceite Motor y Filtro se ha enviado a su correo electrónico")</script>';

}
if($killometros2>=$z && $killometros2<=$w){
    $color='#FC0000';

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
    $mail->Subject = 'Cambio de Aceite Motor y Filtro';  // Asunto del mensaje
    $mail->Body    = 'Hola estimado/a '.$nombres_apellidos.', porfavor se ha olvidado de realizar un cambio de aceite y filtro del mismo,  ya es hora.';    // Contenido del mensaje (acepta HTML)
    $mail->AltBody = 'Este es el contenido del mensaje en texto plano';    // Contenido del mensaje alternativo (texto plano)
    $mail->send();
    echo '<script>alert("Una Alerta de Cambio de Aceite Motor y Filtro se ha enviado a su correo electrónico")</script>';

}

//color 50000 --- >=40000 y <45000 ,  y>=45000 y <50000
$color2="";
for($x=0;$x<=$killometros2;$x=$x+50000){
    $v=$x;
    $y= $x+40000;
    $z= $x+45000;
    $w= $x+50000;
}

if($killometros2>=$v && $killometros2<$y){
    $color2='#00FF04';
}
if($killometros2>=$y && $killometros2<$z){
    $color2="#F39C12";

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
    $mail->Subject = 'Cambio Kit Banda de Distribución';  // Asunto del mensaje
    $mail->Body    = 'Hola estimado/a '.$nombres_apellidos.', recomendamos por precaución el cambio de kit de la banda de distribución';    // Contenido del mensaje (acepta HTML)
    $mail->AltBody = 'Este es el contenido del mensaje en texto plano';    // Contenido del mensaje alternativo (texto plano)
    $mail->send();
    echo '<script>alert("Una Alerta de Cambio Kit Banda de Distribución se ha enviado a su correo electrónico")</script>';
}
if($killometros2>=$z && $killometros2<=$w){
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
    $mail->Subject = 'Cambio Kit Banda de Distribución';  // Asunto del mensaje
    $mail->Body    = 'Hola estimado/a '.$nombres_apellidos.', porfavor no pierda el tiempo y cambie la banda de distribución, de lo contrario podría tener daños ireparables en su motor, lo que ocasionaría cambio y rectificación de piezas.';    // Contenido del mensaje (acepta HTML)
    $mail->AltBody = 'Este es el contenido del mensaje en texto plano';    // Contenido del mensaje alternativo (texto plano)
    $mail->send();
    echo '<script>alert("Una Alerta de Cambio Kit Banda de Distribución se ha enviado a su correo electrónico")</script>';
}

//color 5000 --- >=<4000	>=4000 y <4500 ,>=4500 y <=5000
$color3="";
for($x=0;$x<=$killometros2;$x=$x+$valoraceite){
    $v=$x;
    $y= $x+4000;
    $z= $x+4500;
    $w= $x+5000;
}

if($killometros2>=$v && $killometros2<$y){
    $color3='#00FF04';
}
if($killometros2>=$y && $killometros2<$z){
    $color3="#F39C12";
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
    $mail->Subject = 'Revisión de Niveles, mangeras y neumaticos';  // Asunto del mensaje
    $mail->Body    = 'Hola estimado/a '.$nombres_apellidos.', porfavor revise las mangueras de su automóvil, una inspección de sus neumáticos y los niveles sugeridos en la aplicación para su seguridad.';    // Contenido del mensaje (acepta HTML)
    $mail->AltBody = 'Este es el contenido del mensaje en texto plano';    // Contenido del mensaje alternativo (texto plano)
    $mail->send();
    echo '<script>alert("Una Alerta de Revisión de Niveles, mangeras y neumaticos se ha enviado a su correo electrónico")</script>';
}
if($killometros2>=$z && $killometros2<=$w){
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
    $mail->Subject = 'Revisión de Niveles, mangeras y neumaticos';  // Asunto del mensaje
    $mail->Body    = 'Hola estimado/a '.$nombres_apellidos.', porfavor revise  de manera inmediata las mangueras de su automóvil, una inspección de sus neumáticos y los niveles sugeridos en la aplicación para su seguridad.';    // Contenido del mensaje (acepta HTML)
    $mail->AltBody = 'Este es el contenido del mensaje en texto plano';    // Contenido del mensaje alternativo (texto plano)
    $mail->send();
    echo '<script>alert("Una Alerta de Revisión de Niveles, mangeras y neumaticos se ha enviado a su correo electrónico")</script>';
}

//color 15000 ---<12000	>=12000 y <14000 , >=14000 y <=15000
$color4="";
for($x=0;$x<=$killometros2;$x=$x+15000){
    $v=$x;
    $y= $x+12000;
    $z= $x+14000;
    $w= $x+15000;
}

if($killometros2>=$v && $killometros2<$y){
    $color4='#00FF04';
}
if($killometros2>=$y && $killometros2<$z){
    $color4="#F39C12";

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
    $mail->Subject = 'Cambio Filtro de Aire, ABC motor y ABC de frenos';  // Asunto del mensaje
    $mail->Body    = 'Hola estimado/a '.$nombres_apellidos.', porfavor por precaución,debe considerar un cambio de filtro de aire de acuerdo al uso dado al automóvil , realice un ABC de motor y un ABC de frenos, para localizar fallas que un especialista puede notar con mayor rapidez, ';    // Contenido del mensaje (acepta HTML)
    $mail->AltBody = 'Este es el contenido del mensaje en texto plano';    // Contenido del mensaje alternativo (texto plano)
    $mail->send();
    echo '<script>alert("Una Alerta de Cambio Filtro de Aire, ABC motor y ABC de frenos se ha enviado a su correo electrónico")</script>';
}
if($killometros2>=$z && $killometros2<=$w){
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
    $mail->Subject = 'Cambio Filtro de Aire, ABC motor y ABC de frenos';  // Asunto del mensaje
    $mail->Body    = 'Hola estimado/a '.$nombres_apellidos.', porfavor por precaución,cambie de manera inmediata el filtro de aire, realice de manera inmediata un ABC de motor y un ABC de frenos, para localizar fallas que un especialista puede notar con mayor rapidez.';    // Contenido del mensaje (acepta HTML)
    $mail->AltBody = 'Este es el contenido del mensaje en texto plano';    // Contenido del mensaje alternativo (texto plano)
    $mail->send();
    echo '<script>alert("Una Alerta de Cambio Filtro de Aire, ABC motor y ABC de frenos se ha enviado a su correo electrónico")</script>';
}

//color 35000 ---<25000	>25000 y <30000 ,>=30000 y <=35000
$color5="";
for($x=0;$x<=$killometros2;$x=$x+35000){
    $v=$x;
    $y= $x+25000;
    $z= $x+30000;
    $w= $x+35000;
}

if($killometros2>=$v && $killometros2<$y){
    $color5='#00FF04';
}
if($killometros2>=$y && $killometros2<$z){
    $color5="#F39C12";
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
    $mail->Subject = 'Cambio Filtro de Gasolina, Freno y Embrague';  // Asunto del mensaje
    $mail->Body    = 'Hola estimado/a '.$nombres_apellidos.', por precaución,debe considerar un cambio de filtro de gasolina y realice un cambio de líquido refrigerante de acuerdo al uso dado al automóvil.';    // Contenido del mensaje (acepta HTML)
    $mail->AltBody = 'Este es el contenido del mensaje en texto plano';    // Contenido del mensaje alternativo (texto plano)
    $mail->send();
    echo '<script>alert("Una Alerta de Cambio Filtro de Gasolina, Freno y Embrague se ha enviado a su correo electrónico")</script>';
}
if($killometros2>=$z && $killometros2<=$w){
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
    $mail->Subject = 'Cambio Filtro de Gasolina, Freno y Embrague';  // Asunto del mensaje
    $mail->Body    = 'Hola estimado/a '.$nombres_apellidos.', porfavor por precaución,cambie de manera inmediata el filtro de gasolina y realice un cambio de líquido refrigerante.';    // Contenido del mensaje (acepta HTML)
    $mail->AltBody = 'Este es el contenido del mensaje en texto plano';    // Contenido del mensaje alternativo (texto plano)
    $mail->send();
    echo '<script>alert("Una Alerta de Cambio Filtro de Gasolina, Freno y Embrague se ha enviado a su correo electrónico")</script>';
}

//color 10000 ---<8000	>=8000 y <9000 ,>=9000 y <=10000
$color6="";
for($x=0;$x<=$killometros2;$x=$x+10000){
    $v=$x;
    $y= $x+8000;
    $z= $x+9000;
    $w= $x+10000;
}

if($killometros2>=$v && $killometros2<$y){
    $color6='#00FF04';
}
if($killometros2>=$y && $killometros2<$z){
    $color6="#F39C12";
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
    $mail->Subject = 'Cambio Aceite Motor y Filtro';  // Asunto del mensaje
    $mail->Body    = 'Hola estimado/a '.$nombres_apellidos.', por precaución, inspeccione las bujías, para un mejor encendido de su motor.';    // Contenido del mensaje (acepta HTML)
    $mail->AltBody = 'Este es el contenido del mensaje en texto plano';    // Contenido del mensaje alternativo (texto plano)
    $mail->send();
    echo '<script>alert("Una Alerta de Cambio Aceite Motor y Filtro se ha enviado a su correo electrónico")</script>';
}
if($killometros2>=$z && $killometros2<=$w){
    $color6='#FC0000';
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
    $mail->Subject = 'Cambio Aceite Motor y Filtro';  // Asunto del mensaje
    $mail->Body    = 'Hola estimado/a '.$nombres_apellidos.', porfavor por precaución, inspeccione las bujías, para un mejor encendido de su motor, de manera inmediata.';    // Contenido del mensaje (acepta HTML)
    $mail->AltBody = 'Este es el contenido del mensaje en texto plano';    // Contenido del mensaje alternativo (texto plano)
    $mail->send();
    echo '<script>alert("Una Alerta de Cambio Aceite Motor y Filtro se ha enviado a su correo electrónico")</script>';
}

//color 30000 ---<<25000	>=25000 y <28000 ,>=28000 y <=30000
$color7="";
for($x=0;$x<=$killometros2;$x=$x+30000){
    $v=$x;
    $y= $x+25000;
    $z= $x+28000;
    $w= $x+30000;
}

if($killometros2>=$v && $killometros2<$y){
    $color7='#00FF04';
}
if($killometros2>=$y && $killometros2<$z){
    $color7="#F39C12";
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
    $mail->Subject = 'Cambio de Bujías';  // Asunto del mensaje
    $mail->Body    = 'Hola estimado/a '.$nombres_apellidos.', porfavor por precaución, realice un cambio de bujías, debido a que ya ha realizado algunas inspecciones previas.';    // Contenido del mensaje (acepta HTML)
    $mail->AltBody = 'Este es el contenido del mensaje en texto plano';    // Contenido del mensaje alternativo (texto plano)
    $mail->send();
    echo '<script>alert("Una Alerta de Cambio de Bujías se ha enviado a su correo electrónico")</script>';
}
if($killometros2>=$z && $killometros2<=$w){
    $color7='#FC0000';
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
    $mail->Subject = 'Cambio de Bujías';  // Asunto del mensaje
    $mail->Body    = 'Hola estimado/a '.$nombres_apellidos.', Hola estimado/a, porfavor por precaución, realice un cambio de bujías, de manera inmediata.';    // Contenido del mensaje (acepta HTML)
    $mail->AltBody = 'Este es el contenido del mensaje en texto plano';    // Contenido del mensaje alternativo (texto plano)
    $mail->send();
    echo '<script>alert("Una Alerta de Cambio de Bujías se ha enviado a su correo electrónico")</script>';
}

//color 35000 ---<25000	>=25000 y <28000 ,>=28000 y <=35000
$color8="";
for($x=0;$x<=$killometros2;$x=$x+35000){
    $v=$x;
    $y= $x+25000;
    $z= $x+28000;
    $w= $x+35000;
}

if($killometros2>=$v && $killometros2<$y){
    $color8='#00FF04';
}
if($killometros2>=$y && $killometros2<$z){
    $color8="#F39C12";
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
    $mail->Subject = 'Cambio Líquido de Freno, Embrague y Cambio Aceite de Transmisión';  // Asunto del mensaje
    $mail->Body    = 'Hola estimado/a '.$nombres_apellidos.', porfavor por precaución, realice un cambio de líquido de frenos , embrague de manera y aceite de transmisión.';    // Contenido del mensaje (acepta HTML)
    $mail->AltBody = 'Este es el contenido del mensaje en texto plano';    // Contenido del mensaje alternativo (texto plano)
    $mail->send();
    echo '<script>alert("Una Alerta de Cambio Líquido de Freno, Embrague y Cambio Aceite de Transmisión se ha enviado a su correo electrónico")</script>';
}
if($killometros2>=$z && $killometros2<=$w){
    $color8='#FC0000';
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
    $mail->Subject = 'Cambio Líquido de Freno, Embrague y Cambio Aceite de Transmisión';  // Asunto del mensaje
    $mail->Body    = 'Hola estimado/a '.$nombres_apellidos.',porfavor por precaución, realice un cambio de líquido de frenos, embrague de manera y aceite de transmisión. inmediata, para evitar accidentes de tránsito.';    // Contenido del mensaje (acepta HTML)
    $mail->AltBody = 'Este es el contenido del mensaje en texto plano';    // Contenido del mensaje alternativo (texto plano)
    $mail->send();
    echo '<script>alert("Una Alerta de Cambio Líquido de Freno, Embrague y Cambio Aceite de Transmisión se ha enviado a su correo electrónico")</script>';
}
//color 25000 ---<20000	>=20000 y 23000 ,>=23000 y 25000
$color9="";
for($x=0;$x<=$killometros2;$x=$x+25000){
    $v=$x;
    $y= $x+20000;
    $z= $x+23000;
    $w= $x+25000;
}

if($killometros2>=$v && $killometros2<$y){
    $color9='#00FF04';
}
if($killometros2>=$y && $killometros2<$z){
    $color9="#F39C12";
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
    $mail->Subject = 'Cambio de Batería';  // Asunto del mensaje
    $mail->Body    = 'Hola estimado/a '.$nombres_apellidos.',por precaución realice una revisión del estado de su batería.';    // Contenido del mensaje (acepta HTML)
    $mail->AltBody = 'Este es el contenido del mensaje en texto plano';    // Contenido del mensaje alternativo (texto plano)
    $mail->send();
    echo '<script>alert("Una Alerta de Cambio de Batería se ha enviado a su correo electrónico")</script>';
}
if($killometros2>=$z && $killometros2<=$w){
    $color9='#FC0000';
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
    $mail->Subject = 'Cambio de Batería';  // Asunto del mensaje
    $mail->Body    = 'Hola estimado/a '.$nombres_apellidos.', por precaución realice una revisión del estado de su batería, de manera inmediata.';    // Contenido del mensaje (acepta HTML)
    $mail->AltBody = 'Este es el contenido del mensaje en texto plano';    // Contenido del mensaje alternativo (texto plano)
    $mail->send();
    echo '<script>alert("Una Alerta de Cambio de Batería se ha enviado a su correo electrónico")</script>';
}


//color 45000 ---<38000	>=38000 y <43000 ,>=>=43000 y <=45000
$color10="";
for($x=0;$x<=$killometros2;$x=$x+45000){
    $v=$x;
    $y= $x+38000;
    $z= $x+43000;
    $w= $x+45000;
}

if($killometros2>=$v && $killometros2<$y){
    $color10='#00FF04';
}
if($killometros2>=$y && $killometros2<$z){
    $color10="#F39C12";
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
    $mail->Subject = 'Limpieza Sensor IAT y Sensor MAP ';  // Asunto del mensaje
    $mail->Body    = 'Hola estimado/a '.$nombres_apellidos.',realice una limpieza del sensor IAT y del sensor MAP, para que tenga una mayor vida útil de su sensor, y mejor control del aire de admisión.';    // Contenido del mensaje (acepta HTML)
    $mail->AltBody = 'Este es el contenido del mensaje en texto plano';    // Contenido del mensaje alternativo (texto plano)
    $mail->send();
    echo '<script>alert("Una Alerta de Limpieza Sensor IAT y Sensor MAP se ha enviado a su correo electrónico")</script>';
}
if($killometros2>=$z && $killometros2<=$w){
    $color10='#FC0000';
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
    $mail->Subject = 'Limpieza Sensor IAT y Sensor MAP';  // Asunto del mensaje
    $mail->Body    = 'Hola estimado/a '.$nombres_apellidos.', realice una limpieza del sensor IAT y del sensor MAP, de manera inmediata, para que tenga una mayor vida útil de su sensor, y mejor control del aire de admisión.';    // Contenido del mensaje (acepta HTML)
    $mail->AltBody = 'Este es el contenido del mensaje en texto plano';    // Contenido del mensaje alternativo (texto plano)
    $mail->send();
    echo '<script>alert("Una Alerta de Limpieza Sensor IAT y Sensor MAP se ha enviado a su correo electrónico")</script>';
}

//color 20000 ---<15000	>=15000 y <18000 ,>=18000 y <=20000
$color11="";
for($x=0;$x<=$killometros2;$x=$x+20000){
    $v=$x;
    $y= $x+15000;
    $z= $x+18000;
    $w= $x+20000;
}

if($killometros2>=$v && $killometros2<$y){
    $color11='#00FF04';
}
if($killometros2>=$y && $killometros2<$z){
    $color11="#F39C12";
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
    $mail->Subject = 'Limpieza Sensor TPS';  // Asunto del mensaje
    $mail->Body    = 'Hola estimado/a '.$nombres_apellidos.',realice una limpieza del sensor TPS, para que tenga una mayor vida útil de su sensor, y mejor control del suministro de combustible';    // Contenido del mensaje (acepta HTML)
    $mail->AltBody = 'Este es el contenido del mensaje en texto plano';    // Contenido del mensaje alternativo (texto plano)
    $mail->send();
    echo '<script>alert("Una Alerta de Limpieza Sensor TPS se ha enviado a su correo electrónico")</script>';
}
if($killometros2>=$z && $killometros2<=$w){
    $color11='#FC0000';
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
    $mail->Subject = 'Limpieza Sensor TPS';  // Asunto del mensaje
    $mail->Body    = 'Hola estimado/a '.$nombres_apellidos.', realice una limpieza del sensor TPS, de manera inmediata, para que tenga una mayor vida útil de su sensor, y mejor control del suministro de combustible';    // Contenido del mensaje (acepta HTML)
    $mail->AltBody = 'Este es el contenido del mensaje en texto plano';    // Contenido del mensaje alternativo (texto plano)
    $mail->send();
    echo '<script>alert("Una Alerta de Limpieza Sensor TPS se ha enviado a su correo electrónico")</script>';
}

//color 35000 ---<28000	>=28000 y <33000 ,>=33000 y <=35000
$color12="";
for($x=0;$x<=$killometros2;$x=$x+35000){
    $v=$x;
    $y= $x+28000;
    $z= $x+33000;
    $w= $x+35000;
}

if($killometros2>=$v && $killometros2<$y){
    $color12='#00FF04';
}
if($killometros2>=$y && $killometros2<$z){
    $color12="#F39C12";
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
    $mail->Subject = 'Limpieza Sensor ECT';  // Asunto del mensaje
    $mail->Body    = 'Hola estimado/a '.$nombres_apellidos.', realice una limpieza del sensor ECT, para que tenga una mayor vida útil de su sensor, y control de la temperatura de su motor.';    // Contenido del mensaje (acepta HTML)
    $mail->AltBody = 'Este es el contenido del mensaje en texto plano';    // Contenido del mensaje alternativo (texto plano)
    $mail->send();
    echo '<script>alert("Una Alerta de Limpieza Sensor ECT se ha enviado a su correo electrónico")</script>';
}
if($killometros2>=$z && $killometros2<=$w){
    $color12='#FC0000';
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
    $mail->Subject = 'Limpieza Sensor ECT';  // Asunto del mensaje
    $mail->Body    = 'Hola estimado/a '.$nombres_apellidos.',  realice una limpieza del sensor ECT, de manera inmediata, para que tenga una mayor vida útil de su sensor, y control de la temperatura de su motor.';    // Contenido del mensaje (acepta HTML)
    $mail->AltBody = 'Este es el contenido del mensaje en texto plano';    // Contenido del mensaje alternativo (texto plano)
    $mail->send();
    echo '<script>alert("Una Alerta de Limpieza Sensor ECT se ha enviado a su correo electrónico")</script>';
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
                            <br>Kilometraje : <strong> <?php echo $killometros ?>   </strong>
                            <br><br><center><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                    Actualizar Kilometraje
                                </button>
                            </center>


						</div>


                                <div class="card-content">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                            <tr>
                                                <th>Mantenimiento</th>
                                                <th>Alerta</th>
                                                <th>Info</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr class="odd gradeX">
                                                <td>Cambio Aceite Motor <br> y Filtro</td>
                                                <td><input type="color" value="<?php echo $color ?>" disabled></td>
                                                <td><button class="btn btn-info" type="button" data-toggle="modal" data-target="#exampleModal1"></button></td>
                                            </tr>
                                            <tr class="odd gradeX">
                                                <td>Cambio Kit Banda de <br> Distribución</td>
                                                <td><input type="color" value="<?php echo $color2 ?>" disabled></td>
                                                <td><button class="btn btn-info" type="button" data-toggle="modal" data-target="#exampleModal2"></button></td>
                                            </tr>
                                            <tr class="odd gradeX">
                                                <td>Revisión de Niveles</td>
                                                <td><input type="color" value="<?php echo $color3 ?>" disabled></td>
                                                <td><button class="btn btn-info" type="button" data-toggle="modal" data-target="#exampleModal3"></button></td>
                                            </tr>
                                            <tr class="odd gradeX">
                                                <td>Verificación de Fugas</td>
                                                <td><input type="color" value="<?php echo $color3 ?>" disabled></td>
                                                <td><button class="btn btn-info" type="button" data-toggle="modal" data-target="#exampleModal4"></button></td>
                                            </tr>
                                            <tr class="odd gradeX">
                                                <td>Cambio Filtro de Aire</td>
                                                <td><input type="color" value="<?php echo $color4 ?>" disabled></td>
                                                <td><button class="btn btn-info" type="button" data-toggle="modal" data-target="#exampleModal5"></button></td>
                                            <tr class="odd gradeX">
                                            <tr>
                                                <td>Cambio Filtro de Gasolina</td>
                                                <td><input type="color" value="<?php echo $color5 ?>" disabled></td>
                                                <td><button class="btn btn-info" type="button" data-toggle="modal" data-target="#exampleModal6"></button></td>
                                            </tr>
                                            <tr class="odd gradeX">
                                                <td>Inspección de Bujías</td>
                                                <td><input type="color" value="<?php echo $color6 ?>" disabled></td>
                                                <td><button class="btn btn-info" type="button" data-toggle="modal" data-target="#exampleModal7"></button></td>
                                            </tr>
                                            <tr class="odd gradeX">
                                                <td>Cambio de Bujías </td>
                                                <td><input type="color" value="<?php echo $color7 ?>" disabled></td>
                                                <td><button class="btn btn-info" type="button" data-toggle="modal" data-target="#exampleModal8"></button></td>
                                            </tr>
                                            <tr class="odd gradeX">
                                                <td>Cambio Líquido de <br> Freno y Embrague</td>
                                                <td><input type="color" value="<?php echo $color5 ?>" disabled></td>
                                                <td><button class="btn btn-info" type="button" data-toggle="modal" data-target="#exampleModal9"></button></td>
                                            </tr>
                                            <tr class="odd gradeX">
                                                <td>Cambio Líquido Refrigerante</td>
                                                <td><input type="color" value="<?php echo $color8 ?>" disabled></td>
                                                <td><button class="btn btn-info" type="button" data-toggle="modal" data-target="#exampleModal10"></button></td>
                                            </tr>
                                            <tr class="odd gradeX">
                                                <td>Revisión de Neumáticos</td>
                                                <td><input type="color" value="<?php echo $color3 ?>" disabled></td>
                                                <td><button class="btn btn-info" type="button" data-toggle="modal" data-target="#exampleModal11"></button></td>
                                            </tr>
                                            <tr class="odd gradeX">
                                                <td>Batería</td>
                                                <td><input type="color" value="<?php echo $color9 ?>" disabled></td>
                                                <td><button class="btn btn-info" type="button" data-toggle="modal" data-target="#exampleModal12"></button></td>
                                            </tr>
                                            <tr class="odd gradeX">
                                                <td>Cambio Aceite de Transmisión</td>
                                                <td><input type="color" value="<?php echo $color8 ?>" disabled></td>
                                                <td><button class="btn btn-info" type="button" data-toggle="modal" data-target="#exampleModal13"></button></td>
                                            </tr>
                                            <tr class="odd gradeX">
                                                <td>ABC Motor</td>
                                                <td><input type="color" value="<?php echo $color4 ?>" disabled></td>
                                                <td><button class="btn btn-info" type="button" data-toggle="modal" data-target="#exampleModal14"></button></td>
                                            </tr>
                                            <tr class="odd gradeX">
                                                <td>ABC Frenos</td>
                                                <td><input type="color" value="<?php echo $color4 ?>" disabled></td>
                                                <td><button class="btn btn-info" type="button" data-toggle="modal" data-target="#exampleModal15"></button></td>
                                            </tr>
                                            <tr class="odd gradeX">
                                                <td>Limpieza Sensor IAT </td>
                                                <td><input type="color" value="<?php echo $color10 ?>" disabled></td>
                                                <td><button class="btn btn-info" type="button" data-toggle="modal" data-target="#exampleModal16"></button></td>
                                            </tr>
                                            <tr class="odd gradeX">
                                                <td>Limpieza Sensor TPS</td>
                                                <td><input type="color" value="<?php echo $color11 ?>" disabled></td>
                                                <td><button class="btn btn-info" type="button" data-toggle="modal" data-target="#exampleModal17"></button></td>
                                            </tr>
                                            <tr class="odd gradeX">
                                                <td>Limpieza Sensor ECT</td>
                                                <td><input type="color" value="<?php echo $color12 ?>" disabled></td>
                                                <td><button class="btn btn-info" type="button" data-toggle="modal" data-target="#exampleModal18"></button></td>
                                            </tr>
                                            <tr class="odd gradeX">
                                                <td>Limpieza del Sensor MAP</td>
                                                <td><input type="color" value="<?php echo $color10 ?>" disabled></td>
                                                <td><button class="btn btn-info" type="button" data-toggle="modal" data-target="#exampleModal19"></button></td>
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
                    <h5 class="modal-title" id="exampleModalLabel">Actualizacion de Kilometraje </h5>
                </div>
                <form action="api/putKilometraje.php" method="post">
                <div class="modal-body">
                    <input placeholder="id" id="iduser" name="iduser" type="text" value="<?php echo $idusuario ?>" hidden>
                    <input placeholder="Kilometraje" id="kilometraje" name="kilometraje" type="text" value="<?php echo $killometros ?>" disabled>
                    <input placeholder="Kilometroje Actual" id="kilact" name="kilact" type="text" class="validate">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal1 -->
    <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cambio Aceite Motor y Filtro </h5>
                </div>
                    <div class="modal-body">
                        1.- Depende del Aceite que coloque, por lo general el aceite cada 5000km.<br>2.- Utilizar un aditivo para evitar mejorar la conservación del motor.<br>3.- Si desea hacer por su propia cuenta considerar lo siguiente:
                        <br><br>a.- Motor Frío
                        <br>b.- Comprar el aceite y el filtro
                        <br>c.- Tener la herramienta llaves de cadena y una bandeja para colocar el aceite, considerar que saldrá un galón mínimo.
                        <br>d.- Ubicar el filtro de aceite en el automovil
                        <br>e.- Levantar el automovil en el lado correspondiente del filtro, con la ayuda de una gata.
                        <br>f.- Cambiar el filtro, considerando que primero debemos dejar ir el aceite quemado colocando debajo la bandeja correspondiente, antes de colocar el nuevo filtro.
                        <br>g.- Retirar la gata, despues la tapa del aceite del motor y colocar el aceite y el aditivo.
                        <br>h.- No encender el motor de manera directa, debido a que la bomba de aceite debe trabajar en contacto (estado de giro de las llaves al encender el automóvil), durante tres veces para que se distribuya el aceite por todos los conductos del motor.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
            </div>
        </div>
    </div>
    <!-- Modal2 -->
    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cambio Kit Banda de Distribución</h5>
                </div>
                <div class="modal-body">
                    1.- El cambio debe realizarse con un especialista
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal3 -->
    <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Revisión de Niveles</h5>
                </div>
                <div class="modal-body">
                    1.- Nivel del Líquido refrigerante en el radiador y de la reserva
                    <br> 2.- Nivel de aceite
                    <br> 3.- Nivel del acido de la batería
                    <br> 4.- Nivel de Liquido de frenos
                    <br> 5.- Nivel del agua de las plumas del limpiaparabrisas
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal4 -->
    <div class="modal fade" id="exampleModal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Verificación de Fugas</h5>
                </div>
                <div class="modal-body">
                    1.- Revisar estado de las mangueras      <br>
                    2.- Observar si no se encuentra fugas de agua, aceite de cada uno de los parámetros de las entradas y salidas de la revision de niveles.
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
                    <h5 class="modal-title" id="exampleModalLabel">Cambio Filtro de Aire</h5>
                </div>
                <div class="modal-body">
                    1.-Cambiar el filtro de aire con criterio, para lo cual se recomienda:
                    <br>a.- Sí, lo usa al automóvil de manera continua realizar el cambio de manera recomendada.
                    <br>b.- Sí, lo usa de manera adecuada al automóvil, es decir, con un recorrido de 25000 km por año, el cambio de filtro podría esperar unos 3000 km más de lo sugerido.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal 6-->
    <div class="modal fade" id="exampleModal6" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cambio Aceite Motor y Filtro </h5>
                </div>
                <div class="modal-body">
                    1.- Para evitar que el tanque de gasolina baje de 1/4 de su totalidad, para evitar que la bomba de gasolina haga un sobreesfuerzo y envíe basura por el filtro, haciendo que este con el tiempo se dañe.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal 7-->
    <div class="modal fade" id="exampleModal7" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Inspección de Bujías</h5>
                </div>
                <div class="modal-body">
                    1.- Siempre realizar una limpieza y calibración de las bujías. Entre 36 y 40 mm del espacio de los electrodos.
                    <br>2.- limpiar grasa y fijarse sino esta con aceite, pues sí solo está podría tratarse de un daño en el empaque del cabezote hasta la reparación del motor dependiendo de cuantas bujías estén dañadas, equivaldría al número de pistones dañados en el automóvil, lo que requiere de un especialista.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal 8-->
    <div class="modal fade" id="exampleModal8" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cambio de Bujías </h5>
                </div>
                <div class="modal-body">
                    1.-Comprar bujías apropiadas para el vehículo
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal 9-->
    <div class="modal fade" id="exampleModal9" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cambio Líquido de Freno y Embrague</h5>
                </div>
                <div class="modal-body">
                    1.- Realizar con un especialista.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal 10-->
    <div class="modal fade" id="exampleModal10" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cambio Líquido Refrigerante</h5>
                </div>
                <div class="modal-body">
                    1.- Puede realizarlo usted mismo, considerando lo siguiente:
                  <br>  a.- No destapar ninguna fuente si el motor esta caliente, podría ocasionar quemaduras graves, para lo cual el Motor debe estar totalmente frío
                    <br>  b.- Destapar o quitar la manguera de agua de salida, utilizando una herramienta adecuada, dependiendo de la comodidad del mismo, y dejar escapar el agua hasta que se acabe.
                    <br>  c.- Volver a conectar la manguera o tapa, y colocar un nuevo líquido refrigerante.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal 11-->
    <div class="modal fade" id="exampleModal11" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Revisión de Neumáticos</h5>
                </div>
                <div class="modal-body">
                    1.- Presión del aire entre 25 y 30 PSI
                    <br>2.- Verificación de no tener desgastes más internos que externos, debe ser todo por igual, de lo contrario requiere de un balanceo del automóvil.
                    <br>3.-Cambiar el/los neumático/s de ser necesario, para no arriesgarse a sufrir algún accidente,
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal 12-->
    <div class="modal fade" id="exampleModal12" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Batería</h5>
                </div>
                <div class="modal-body">
                    1.- Realizar una inspección cada  4 meses y un cambio cada 4 años
                    <br>2.- Si desea comprobar el estado de la batería por su cuenta, debe considerar lo siguiente:
                    <br>a.-La primera medición que haremos será con el motor completamente parado. Habiéndolo dejado reposar (alrededor de unas 4 horas), se medirá el voltaje de la batería, que debe estar comprendido entre 12,5 y 12,9 voltios.Para hacerlo quita la llave, conecta el multímetro en corriente continua a los bornes de la batería y apunta el valor marcado por el multímetro.
                    <br>b.-Enciende el coche y déjalo en punto muerto. Ahora, vuelve a conectar el multímetro en corriente continua para medir la batería y apunta el valor que marca, debe ser aproximadamente 14,7 voltios.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal 13-->
    <div class="modal fade" id="exampleModal13" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cambio Aceite de Transmisión</h5>
                </div>
                <div class="modal-body">
                    1.- Se sugiere realizar el cambio con un especialista.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal 14-->
    <div class="modal fade" id="exampleModal14" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ABC Motor</h5>
                </div>
                <div class="modal-body">
                    1.- Por su seguridad siempre realizar una verificación del estado de su motor, el cual ya requiere de un especialista, el cual sabrá el procedimiento correcto.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal 15-->
    <div class="modal fade" id="exampleModal15" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ABC Frenos</h5>
                </div>
                <div class="modal-body">
                    1.- Por su seguridad siempre realizar una verificación del estado de sus frenos, el cual ya requiere de un especialista, el cual sabrá el procedimiento correcto y sobre todo la regulación del mismo.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal 16-->
    <div class="modal fade" id="exampleModal16" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Limpieza del Sensor IAT</h5>
                </div>
                <div class="modal-body">
                    Comprobar su buen funcionamiento:
                    <br>1.-Coloca el multímetro en Voltios DC.
                    <br>2.-Despega el sensor del conector eléctrico.
                    <br>3.-El probador rojo del multímetro debes conectarlo con el cable de alimentación de 5V y el de color negro con el cable de tierra.
                    <br>4.-Con la llave en ON pero sin encender el motor, el multímetro debe arrojar una lectura que va entre 4.5 - 5 V.
                    <br><br>Realizar una Limpieza del sensor IAT, siguiendo las siguientes instrucciones:
                    <br>1.-Siga el manual de instrucciones de su vehículo para ubicar la posición del sensor, es común encontrar este sensor en la zona posterior del pleno de admisión en los automóviles que poseen un sensor MAP. Puede ser en el armazón del acelerador, en el interior del múltiple de admisión o en el conjunto posterior del filtro de aire. Por otro lado, en los vehículos que poseen sensores de flujo masa de aire o MAF, el IAT forma parte de este sensor.
                    <br>2.-Retire el sensor con la ayuda de un destornillador plano y delgado.
                    <br>3.-Se debe retirar un seguro de alambre del conector.
                    <br>4.-Utilice un paño limpio y un limpiador electrónico de secado rápido.
                    <br>5.-Asegúrese de no tocar los cables.
                    <br> 6.-Verifique que no existan roturas y que la pieza no esté sulfatada.
                    <br>7.-Proceda a limpiarlo con sumo cuidado.
                    <br>8.-Al finalizar vuelva a colocar el sensor y confirme que está en el lugar correcto.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal 17-->
    <div class="modal fade" id="exampleModal17" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Limpieza Sensor TPS</h5>
                </div>
                <div class="modal-body">
                    Realizar una Limpieza del sensor IAT, siguiendo las siguientes instrucciones:
                    <br>1.-Ubique el sensor TPS ,generalmente se encuentra montado en el exterior del armazón del acelerador y conectado al eje del acelerador
                    <br>2.-Desmonte el sensor TPS.
                    <br>3.-Utilice fluido para carburador y un paño limpio y seco para retirar las impurezas del sistema de aceleración.
                    <br>4.-En caso de mucha suciedad es mejor desmontar el cuerpo del acelerador y limpiar con líquido solvente. Déjelo secar antes de instalarlo de nuevo.
                    <br>5.-Finalmente, coloque de nuevo la pieza del sensor.
                    <br>Cuando se sustituye o se limpia el sensor TPS, hay que calibrarlo correctamente, no sólo montarlo, (los TPS que no presentan corredera -huecos ovalados de sujeción por lo general no requieren calibración). Para calibrar el sensor, proceda como sigue:
                    <br><br> 1.-Se necesita un multímetro.
                    <br>2.-De los tres cables del TPS, sólo es necesario el rojo del centro.
                    <br>3.-Conecte el cable al lado positivo del multímetro.
                    <br>4.-Coloque el lado negativo del multímetro en contacto con la toma de tierra del coche o con el lado negativo de la batería.
                    <br>5.-Ajuste el multímetro a 20 voltios.
                    <br>6.-Aflojar ligeramente el TPS detrás del cuerpo del acelerador. Verá que hay dos tornillos en el interior. Aflójalos, pero no los quites del todo, para poder moverlos de un lado a otro.
                    <br>7.-Ahora gire la llave de contacto a la posición ON. Recuerda: NO encienda el automóvil, sino gire la llave a la posición ON.
                    <br>8.-Con un multímetro, compruebe el número de voltios que aparece en la pantalla. Intenta acercarte lo más posible a 0,5V.
                    <br>9.-A continuación, apriete los tornillos.
                    <br>10.-Desconecta el terminal negativo de la batería durante unos 60 segundos para reiniciar el ordenador.                                                                                                                                                                                       11.- Si tiene cuatro cables, significa que tiene una señal de relantí, para lo cual debe buscar el esquema.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal 18-->
    <div class="modal fade" id="exampleModal18" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Limpieza Sensor ECT</h5>
                </div>
                <div class="modal-body">
                    Comprobar su buen funcionamiento:
                    <br>1.-Las puntas del óhmetro (multímetro, función de ohmios) colócalas en las terminales del sensor
                    <br>2.-Caliente la punta del sensor con el encendedor.
                    <br>3.-Observa si la resistencia va disminuyendo a medida que el sensor se calienta.
                    <br>4.-Si la resistencia se queda en un valor fijo es porque el sensor está dañado
                    <br><br>Realizar una Limpieza del sensor ECT, siguiendo las siguientes instrucciones:
                    <br>1.-Siga el manual de instrucciones de su vehículo para ubicar la posición del sensor, es común encontrar este sensorenroscado en el interior del bloque del motor. Puede ser en el cabezal de cilindro o en el múltiple de la toma interna. De esta forma está en contacto directo con el fluido refrigerante.
                    <br>2.-Lo principal es asegurarte que el motor se encuentre totalmente frío para prevenir quemaduras al momento de manipularlo.
                    <br>3.-Una vez localizado esto, desconecta dicho cable utilizando una llave de cubo y de dado.
                    <br>4.-Utilice un paño limpio y un limpiador electrónico de secado rápido.
                    <br>5.-Asegúrese de no tocar los cables.
                    <br>6.-Verifique que no existan roturas y que la pieza no esté sulfatada.
                    <br>7.-Proceda a limpiarlo con sumo cuidado.
                    <br>8.-Al finalizar vuelva a colocar el sensor y confirme que está en el lugar correcto.                                          9.-Para soltar el sensor de temperatura necesitas un juego de dados apropiado para poder aflojarlo.
                    <br>10.-Una vez suelto, debes chequear que el cable conductor y el sensor propio no estén corroídos.
                    <br>11.-Luego que tenga la temperatura correcta, el ventilador refrigerante empieza a hacer su función
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal 19-->
    <div class="modal fade" id="exampleModal19" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Limpieza del Sensor MAP</h5>
                </div>
                <div class="modal-body">
                    Comprobar su correcto funcionamiento:
                    <br> 1.-Ubica el sensor en el compartimiento del motor del lado del pasajero, puedes valerte del manual de servicio del vehículo, generalmente se ubica en el múltiple de admisión del automóvil, después del cuerpo de aceleración y, en ocasiones, integrado a la propia ECU o computadora.
                    <br> 2.-Verifica que la manguera de vacío esté limpia y cerciórate que los cables no estén sueltos ni rotos.
                    <br> 3.-Consulta el manual de servicio para enterarte de cuál tipo de Sensor MAP tiene tu vehículo. Para un sensor de frecuencia, utiliza un tacómetro, mientras que para uno de voltaje se requiere un voltímetro.
                    <br>  4.-Desconecta el conector del sensor y gira la llave de encendido sin poner a funcionar el motor. Mide el voltaje, si este fluctúa, es indicativo de que está funcionando. Compara la lectura del voltímetro con el manual de servicio para confirmar. Se puede comprobar de diferentes maneras:
                    <br><br>
                    Probar la señal de sensor con multímetro
                    <br> a.-Remueve de su lugar el sensor ubicado en el múltiple de admisión.
                    <br> b.-Conecta una bomba de vacío con sensor MAP por medio de una manguera.
                    <br> c.-Selecciona Voltios DC (Corriente Continua) en el multímetro.
                    <br> d.-El sensor debe encontrarse conectado al conector eléctrico.
                    <br>  e.-Coloca el cable de señal con el cable rojo del multímetro.
                    <br> f.-El cable negro del multímetro conéctalo al terminal negativo del batería.
                    <br> g.-Para alimentar corriente y tierra hacia el sensor, enciende la llave sin arrancar el motor.
                    <br> h.-Con la llave en ON y sin alimentación de vacío debe registrarse una señal de 4,7 V en el multímetro.
                    <br> i.-A medida que se le aplica vacío el valor de los Voltios deberían variar, aumentando y disminuyendo sin presentar apagones.
                    <br><br> Probar el cable de alimentación del sensor con multímetro:
                    <br> a.-Con el multímetro en Voltios DC, prueba el cable de alimentación del sensor con el terminal rojo del multímetro.
                    <br> b.-El terminal negro de multímetro también debe estar en el negativo de la batería.
                    <br> c.-Coloca el encendido en ON sin encender el motor.
                    <br>  d.-El multímetro debe medir aproximadamente 4,5 V a 5 V.
                    <br><br>  Probar el cable de tierra del sensor con multímetro
                    <br> a.-Con el cable negro del multímetro, prueba el cable de tierra del circuito del sensor.
                    <br> b.-Coloca el encendido en ON sin arrancar el motor.
                    <br>  c.-Se debe registrar un valor de 12 V en el multímetro
                    <br><br>
                    Realizar una Limpieza del sensor ECT, siguiendo las siguientes instrucciones:
                    <br>1.-Ubica el sensor en el compartimiento del motor del lado del pasajero, puedes valerte del manual de servicio del vehículo, generalmente se ubica en el múltiple de admisión del automóvil, después del cuerpo de aceleración y, en ocasiones, integrado a la propia ECU o computadora.
                    <br> 2.-Lo principal es asegurarte que el motor se encuentre totalmente frío para prevenir quemaduras al momento de manipularlo
                    <br> 3.-Una vez localizado esto, desconecta dicho cable utilizando una llave de cubo y de dado, se debe retirar un seguro de alambre del conector con cuidado.
                    <br> 4.-Utilice un paño limpio y un limpiador electrónico de secado rápido.
                    <br>  5.-Asegúrese de no tocar los cables.
                    <br>  6.-Verifique que no existan roturas y que la pieza no esté sulfatada.
                    <br>  7.-Proceda a limpiarlo con sumo cuidado.
                    <br>  8.-Al finalizar vuelva a colocar el sensor y confirme que está en el lugar correcto.
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