<?php

require ('./BaseXClient.php');

try {
  // create session
  $session = new Session("localhost", 1984, "admin", "admin");
  
  try {
    // create query instance
    $query = $session->query($input);
    // bind variable
    $query->bind("name", "number");
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