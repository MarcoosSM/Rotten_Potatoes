<?php
   define('DB_SERVER', '192.168.3.50:3306');
   define('DB_USERNAME', 'invitado');
   define('DB_PASSWORD', '1234');
   define('DB_DATABASE', 'rottenpotatoes_db');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
?>