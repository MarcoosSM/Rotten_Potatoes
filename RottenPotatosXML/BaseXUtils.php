<?php
require ('BaseXClient.php');
class BaseXUtils{

	static private $session;
	
    
    static function insertUser($usermane, $password){
        self::$session->query('insert node <username>'.$username.'</username> into /bbdd/users');#Inserta en usuario
        self::$session->query('insert node <password>'.password.'</password> into /bbdd/users');#Inserta en contraseña
    }
    
    static function getNew(){
        return self::$session->query('for $new in doc(\'../potatoWebPage/bbdd.xml\')//bbdd//news//new return $new')
    }
    
    
	static function ExecuteQuery($queryStr) {
		echo "test2";
		$query = self::$session->query($queryStr);
		return $query->execute();
		
	}
	
	static function StartSesssion() {
		self::$session = new Session("localhost", 1984, "admin", "admin");
	}
	
	static function CloseSesssion() {		
		self::$session->close();
	}
}
?>