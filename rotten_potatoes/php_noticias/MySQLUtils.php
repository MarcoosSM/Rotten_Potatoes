<?php


class MySQLUtils{
    
    static private $session;

    
    static function getNew(){
        $statement = self::$session->prepare('SELECT titulo,noticia FROM noticias');
        $statement->execute();
        $resultado = $statement->fetchAll();
        
		return $resultado;
            
    }
    
    static function StartSession() {
		self::$session = new PDO('mysql:host=192.168.3.50;dbname=rottenpotatoes_db', 'invitado', '1234');

	}
	
	static function CloseSesssion() {		
		self::$session=null;
	}
    
}


?>