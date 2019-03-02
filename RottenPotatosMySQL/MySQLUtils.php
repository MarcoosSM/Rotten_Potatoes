<?php


class MySQLUtils{
    
    static private $session;

    
    static function getNewPaginacion($ini, $fin ){
        $statement = self::$session->prepare("SELECT id,titulo,noticia FROM noticias LIMIT $ini,$fin");
        $statement->execute();
        $resultado = $statement->fetchAll();
        
		return $resultado;
            
    }
        static function getNew(){
        $statement = self::$session->prepare("SELECT id,titulo,noticia FROM noticias");
        $statement->execute();
        $resultado = $statement->fetchAll();
        
		return $resultado;
            
    }
    
    static function getNewByKeyWords($keyWords){
        
        $keyWords = '%'.$keyWords.'%';
        
        $statement = self::$session->prepare('SELECT id,titulo,noticia FROM noticias WHERE titulo LIKE :input1 OR noticia LIKE :input2');
        $statement->execute(array(':input1' => $keyWords, ':input2' => $keyWords));
        $resultado = $statement->fetchAll();
        
		return $resultado;
            
    }
    
        static function numeroDeNoticias(){
        
        $statement= self::$session->prepare("SELECT count(*) FROM noticias");
        $statement->execute();
        $resultado = $statement->fetch(PDO::FETCH_NUM);
        $numeroDeNoticias = $resultado[0];
        
        return $numeroDeNoticias;
            
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