 <?php
 
 include("conexion.php");
$db = getDB();
 
  //  https://algoritmia-seap.com/smat/api/getSigfox.php?id={device}&time={time}&seqNumber={seqNumber}&data={data}&rpm={customData#rpm}&vel={customData#vel}&iat={customData#iat}&tps={customData#tps}&ect={customData#ect}&map={customData#map}
  
$DateAndTime = date('Y-m-d h:i:s a', time());  
  
     $device = $_REQUEST["id"];
     $time = $_REQUEST["time"];
     $seqNumber = $_REQUEST["seqNumber"];
     $data = $_REQUEST["data"];
     $rpm = $_REQUEST["rpm"];
     $vel = $_REQUEST["vel"];
     $iat = $_REQUEST["iat"];
     $tps = $_REQUEST["tps"];
     $ect = $_REQUEST["ect"];
     $map= $_REQUEST["map"];
     

     
   if ( $fl = fopen('sigfoxData.json','a')) {
       fwrite($fl,"\"data\": { \"id\" : \"". $device . "\", "
                             ."\"time\" :\"" . $time . "\", "
                             ."\"seqNumber\" :\"" . $seqNumber . "\", "
                             ."\"data\" :\"" . $data . "\", "
                             ."\"rpm\" :\"" . $rpm . "\", "
                             ."\"vel\" :\"" . $vel . "\", "
                             ."\"iat\" :\"" . $iat . "\", "
                             ."\"tps\" :\"" . $tps . "\", "
                             ."\"ect\" :\"" . $ect . "\", "
                             ."\"map\" :\"" . $map . "\" }\n" );
       fclose($fl);
     }
     

$res=$db->query("INSERT INTO DATOSSIGFOX VALUES ('','$device','ESPE - EL.','$DateAndTime','$seqNumber','$data','$rpm','$vel','$iat','$tps','$ect','$map')");



 ?>
