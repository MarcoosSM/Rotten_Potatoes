<?php
require ('BaseXClient.php');
class BaseXUtils{

	static private $session;
	
    
    static function insertUser($usermane, $password){
        self::$session->query('insert node <user><username>'.$username.'</username><password>'.password.'</password></user> into /bbdd/users');#Inserta en usuario
    }
    
    static function deleteUser($username){
        
        $xmlUser = self::$session->query('for $new in doc(\'../RottenPotatosXML/bbdd.xml\')//bbdd//users//user where $new[text() contains text {'.$username.'} any] return $new';
        $json = json_encode($xmlUsers);
        $user = json_decode($json,TRUE);
        if(checkUserExistance($user)){
            return false;
        }else{
            $users = self::getUsers();
            for($i = 0; $i < sizeof($users); $i++){
                if($user == $users['user'][$i][$username]){
                    unset($users['new'][$i]['username']);
                    unset($users['new'][$i]['password']);
                }
            }
        }
                                        
    }
                                         
    static function checkUserExistance($username){
        $users = self::getUsers();
        for($i = 0; $i < sizeof($users); $i++){
            if($username == $users['user'][$i][$username]){
                return true;
            }
        }
        return false;
    }
    
    static function getUsers(){
        $xmlUsers = self::$session->query('for $new in doc(\'../RottenPotatosXML/bbdd.xml\')//bbdd//users return $new';
        $json = json_encode($xmlUsers);
        $users = json_decode($json,TRUE);
        return $user;
    }
    
    static function insertNew($id,$title,$content){
        self::$session->query('insert node <new><id>'.$id.'</id><title>'.$title.'</title><content>'.$content.'</content></new> into /bbdd/news into /bbdd/news/');#Inserta en usuario
    }
    
    static function getNews(){
        $xmlNew = self::$session->query('for $new in collection(\'../RottenPotatosXML/bbdd.xml\')/News return $new');
        $json = json_encode($xmlNew);
        $arrayNews = json_decode($json,TRUE);
        return $arrayNews;
    }
    
	static function getNewPaginacion($ini, $fin ){
        $arrayAllNews = self::getNews();
        $arraySelectedNews;
        for($i = $ini; $i <= $fin; $i++){
            $arraySelectedNews = $arrayAllNews['New'][$i]['id'];
            $arraySelectedNews = $arrayAllNews['New'][$i]['title'];
            $arraySelectedNews = $arrayAllNews['New'][$i]['content'];
        }
		return $arraySelectedNews;
            
    }
    
    static function getNewByKeyWords($keyWords){
        $xmlNew = self::$session->query('for $new in doc(\'../RottenPotatosXML/bbdd.xml\')//bbdd//news where $new//new[text() contains text { '.$keyWords.' } any] return $new');
        $json = json_encode($xmlNew);
        $arrayNews = json_decode($json,TRUE);
        
        return $arrayNews;
            
    }
	
    static function deleteNew($id){
        $arrayNews = self::getNew();
        for($i = 0; $i <= sizeof($arrayAllNews); $i++){
            if($arrayAllNews['New'][$i]['id'] == $id){
                unset($arrayNews['new'][$i]['id']);
                unset($arrayNews['new'][$i]['title']);
                unset($arrayNews['new'][$i]['content']);
            }
        }
        
        self::$session->query('delete node //news//new');
        for($i = 0; $i <= sizeof($arrayAllNews); $i++){
            self::insertNew($arrayNews['new'][$i]['id'],$arrayNews['new'][$i]['title'],$arrayNews['new'][$i]['content'])
        }

    }
    
	static function StartSesssion() {
		self::$session = new Session("localhost", 1984, "admin", "admin");
	}
	
	static function CloseSesssion() {		
		self::$session->close();
	}
}
?>