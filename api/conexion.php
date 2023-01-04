<?php
function getDB()
{

    $host='localhost';
    $dbname='sigfox';
    $user='root';
    $pass='';

  /*$host='localhost';
    $dbname='epikkixv_sigfox';
    $user='epikkixv_sigfox';
    $pass='Farmacid2022';
  */

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;", $user, $pass);
        $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        return $pdo;
    }
    catch(PDOException $e) {
        echo "Se ha producido un error al intentar conectar al servidor Postgres: ".$e->getMessage();

    }
}
?>
