<?php
require ('BaseXClient.php');
class BaseXUtils{

	static private $session;
	
    
    static function insertUser($usermane, $password){
        self::$session->query('insert node <username>'.$username.'</username> into /bbdd/users');#Inserta en usuario
        self::$session->query('insert node <password>'.password.'</password> into /bbdd/users');#Inserta en contraseña
    }
    
    static function getNew(){
        return self::$session->query('for $new in doc(\'../RottenPotatosXML/bbdd.xml\')//bbdd//news//new return $new')
    }
    
	static function getNewPaginacion($ini, $fin ){
        $statement = self::$session->prepare("SELECT id,titulo,noticia FROM noticias LIMIT $ini,$fin");
        $statement->execute();
        $resultado = $statement->fetchAll();
        
		return $resultado;
            
    }
    
    static function getNewByKeyWords($keyWords){
        
      return self::$session->query('for $new in doc(\'../RottenPotatosXML/bbdd.xml\')//bbdd//news//new where $new[text() contains text { '.$keyWords.' } any] return $new');
            
    }
	
	static function StartSesssion() {
		self::$session = new Session("localhost", 1984, "admin", "admin");
	}
	
	static function CloseSesssion() {		
		self::$session->close();
	}
}
?>