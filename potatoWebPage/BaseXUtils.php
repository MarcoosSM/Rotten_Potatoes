<?php
require ('BaseXClient.php');
class BaseXUtils{

	static private $session;
	
	static function ExecuteQuery($queryStr) {
		echo "test2";
		$query = self::$session->query($queryStr);
		return $query->execute();
		
	}
	
	static function StartSesssion() {
		self::$session = new Session("192.168.3.125", 1984, "admin", "admin");
	}
	
	static function CloseSesssion() {		
		self::$session->close();
	}
}
?>