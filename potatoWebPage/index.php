<?php
    require('views/header.php');

    require('views/body.php');

    require('views/footer.php');

	require('BaseXUtils.php');	
	
	BaseXUtils::StartSesssion();

	echo BaseXUtils::ExecuteQuery('for $name in collection("C:\xampp\htdocs\Rotten_Potatoes\BaseX912\basex\test.xml")/tests/test where $name[matches($name, \'Luis\')]return $name');
?>