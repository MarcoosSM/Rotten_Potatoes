<?php

#require ('../RottenPotatosXML/BaseXClient.php');
require ('../RottenPotatosXML/BaseXUtils.php');


  // create session
  $session = BaseXUtils::StartSession();
 
  #$session = new Session("localhost", 1984, "admin", "admin");
      
    
    
    /*$input = 'for $new in doc(\'../../../RottenPotatosXML/bbdd.xml\')//bbdd//news//new where $new//content[text() contains text { \'Ismael\' } any] return $new';
    
    // create query instance
    $query = $session->query($input);
    // bind variable
    
    // print results
    
    #$arrayPersonas = explode(" ", $frase);
    #echo $arrayPersonas;
    $xml = simplexml_load_string($query->execute());
    $json = json_encode($xml);
    $arrayNews = json_decode($json,TRUE);*/
    #BaseXUtils::deleteNew(2);
    $arrayNews = BaseXUtils::getUsers();
    echo $arrayNews;
    // close query instance
  
  // close session
    BaseXUtils::CloseSession(); 





?>