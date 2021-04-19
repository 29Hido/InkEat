<?php
    $servername = "127.0.0.1";
    $username = "skyfire";
    $password = "{EiT3[q8g4M*";

  try {
      $bdd = new PDO("mysql:host=$servername;dbname=inkeat;charset=utf8", $username, $password);
      // set the PDO error mode to exception
      $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      // echo "Connected successfully";
      }
  catch(PDOException $e)
      {
      echo "Connection failed: " . $e->getMessage();
      }
?>