<?php

require ('../potatoWebPage/BaseXClient.php');

try {
  // create session
  $session = new Session("localhost", 1984, "admin", "admin");
 
  try {
    
    
    $input = 'for $name in collection("C:\xampp\htdocs\Rotten_Potatoes\BaseX912\basex\test.xml")/tests/test where $name[matches($name, \'Luis\')]return $name';
    // create query instance
    $query = $session->query($input);
    // bind variable
    
    // print results
    print $query->execute()."\n";
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