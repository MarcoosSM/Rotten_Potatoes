<?php


class MySQLUtils{
    
    static private $session;

    
    static function getNew(){
        $statement = self::$session->prepare('SELECT titulo,noticia FROM noticias');
        $statement->execute();
        $resultado = $statement->fetchAll();
        
		return $resultado;
            
    }
    static function deleteNew($id){
        $statement = self::$session->prepare('DELETE FROM noticias where id = :id LIMIT 1');
        $statement->execute(array(':id' => $id));
            
    }
    static function modifyNew($id, $titulo, $contenido){
        $statement = self::$session->prepare('UPDATE FROM noticias SET titulo = :titulo, noticia = :contenido where id = :id LIMIT 1');
        $statement->bindParam(':titulo', $titulo);
        $statement->bindParam(':contenido', $contenido); 
            
    }
    
    static function StartSession() {
		self::$session = new PDO('mysql:host=localhost;dbname=rottenpotatoes_db', 'root', '');

	}
	
	static function CloseSesssion() {		
		self::$session=null;
	}
    
}


?>