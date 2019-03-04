<?php
require ('BaseXClient.php');
    class BaseXUtils{

        static private $session;


        static function insertUser($username, $password){
            self::$session->create('bbdd','insert node <user><username>'.$username.'</username><password>'.$password.'</password><privileges>1</privileges></user> into //bbdd//users');
            
            echo "hola";
            
        }

        static function deleteUser($username){
            $users = self::getUsers(); 
            for($i = 0; $i < sizeof($users); $i++){
                    if($username == $users['user'][$i]['username']){
                        unset($users['user'][$i]);
                    }
            }
            $query = self::$session->query('delete node //bbdd//users//user');
            /*$query->execute();*/
            /*for($i = 0; $i < sizeof($users); $i++){
                if( != null){
                    self::insertUser($users['user'][$i]['username'],$users['user'][$i]['password']);

                }
            }*/

        }

        static function checkPrivileges($username){
            $xmlUser = self::$session->query('for $new in doc(\'../../../RottenPotatosXML/bbdd.xml\')//bbdd//users//user where $new//username[text() contains text {'.$username.'} any]return $new');
            $json = json_encode($xmlUsers);
            $user = json_decode($json,TRUE);
            return $user['privileges'];
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
            $query = self::$session->query('for $new in doc(\'../../../RottenPotatosXML/bbdd.xml\')//bbdd//users return $new');
            $xmlUsers = simplexml_load_string($query->execute());
            $json = json_encode($xmlUsers);
            $users = json_decode($json,TRUE);
            return $users;
        }

        static function insertNew($id,$titleContent,$newContent){
            self::$session->query('insert node <new><id>'.$id.'</id><titleContent>'.$titleContent.'</titleContent><newContent>'.$content.'</newContent></new> into /bbdd/news into /bbdd/news/');#Inserta en usuario
        }

        static function getNews(){
            $query = self::$session->query('for $new in doc(\'../../../RottenPotatosXML/bbdd.xml\')//bbdd//news return $new');
            $xmlNew = simplexml_load_string($query->execute());
            $json = json_encode($xmlNew);
            $arrayNews = json_decode($json,TRUE);
            return $arrayNews;
        }

        static function getNewPaginacion($ini, $fin ){
            $arrayAllNews = self::getNews();
            $arraySelectedNews;
            for($i = $ini; $i <= $fin; $i++){
                $arraySelectedNews = $arrayAllNews['New'][$i]['id'];
                $arraySelectedNews = $arrayAllNews['New'][$i]['titleContent'];
                $arraySelectedNews = $arrayAllNews['New'][$i]['newContent'];
            }
            return $arraySelectedNews;

        }

        static function getNewByKeyWords($keyWords){
            $xmlNew = self::$session->query('for $new in doc(\'../../../RottenPotatosXML/bbdd.xml\')//bbdd//news//new where $new//newContent[text() contains text { '.$keyWords.' } any] return $new');
            $json = json_encode($xmlNew);
            $arrayNews = json_decode($json,TRUE);

            return $arrayNews;

        }

        static function deleteNew($id){
            $arrayNews = self::getNews();
            for($i = 0; $i <= sizeof($arrayNews); $i++){
                if($arrayAllNews['new'][$i]['id'] == $id){
                    unset($arrayNews['new'][$i]['id']);
                    unset($arrayNews['new'][$i]['titleContent']);
                    unset($arrayNews['new'][$i]['newContent']);
                }
            }

            self::$session->query('delete node //news//new');
            for($i = 0; $i <= sizeof($arrayAllNews); $i++){
                self::insertNew($arrayNews['new'][$i]['id'],$arrayNews['new'][$i]['titleContent'],$arrayNews['new'][$i]['newContent']);
            }

        }

        static function StartSession() {
            self::$session = new Session("localhost", 1984, "admin", "admin");
            
        }

        static function CloseSession() {		
            self::$session->close();
        }
    }
?>