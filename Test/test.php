<?php

require ('../RottenPotatosXML/BaseXClient.php');

try {
  // create session
  $session = new Session("localhost", 1984, "admin", "admin");
 
  try {
    
    
    $input = 'for $user in doc(\'../test.xml\')//bbdd//users return $user';
    // create query instance
    $query = $session->query($input);
    // bind variable
    
    // print results
    
    #$arrayPersonas = explode(" ", $frase);
    #echo $arrayPersonas;
    $xml  = simplexml_load_string($query->execute());
    $json = json_encode($xml);
    $arrayNews = json_decode($json,TRUE);
    print_r($arrayNews);
    // close query instance
    $query->close();
  } catch (Exception $e) {
    // print exception
    print $e->getMessage();
  }
  // close session
  $session->close();
} catch (Exception $e) {
  // print exception
  print $e->getMessage();
}





?>