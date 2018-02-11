<?php
  class Database {
    private static $instance = NULL;

    private function __construct() {}

    private function __clone() {}



    public static function getInstance() {

      $host = "34.230.47.134";
      $dbname = "cloud";
      $user = "remote";
      $pwd = "root";

      if (!isset(self::$instance)) {
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        self::$instance = new PDO('mysql:host='.$host.';dbname='.$dbname, $user, $pwd, $pdo_options);
      }
      return self::$instance;
    }

    public static function getDoc($username){
      $db = Database::getInstance();
      $doc = [];
      $i=0;
      $query = $db->query('SELECT * FROM Doc WHERE username = "'.$username.'";');
      while($log = $query->fetch()){
        $i++;
        $doc[$i] = $log;
      }
      return $doc;
    }

    public static function getDocFromTeacher(){
      $db = Database::getInstance();
      $query = $db->query('SELECT * FROM Doc d, Person p WHERE d.username = p.username AND p.status = "teacher";');
      $i = 0;
      $teacher = [];
      while($log = $query->fetch()){
        $i++;
        $teacher[$i] = $log;
      }
      return $teacher;
    }

    public static function getDocFromGroup($username){
      $db = Database::getInstance();
      $query = $db->query('SELECT *
        FROM Doc d, WorkGroup w
        WHERE d.idGroup = w.idGroup
        AND (w.username1 = "'.$username.'"
        OR w.username2 = "'.$username.'"
        OR w.username3 = "'.$username.'");');
      $i = 0;
      $group = [];
      while($log = $query->fetch()){
        $i++;
        $group[$i] = $log;
      }
      return $group;
    }

    public static function addFile($fileName,$username,$idG){
      $db = Database::getInstance();
      if($idG <= 0){
        $query = $db->query("INSERT INTO `Doc` (`name`, `dateDeposit`, `lastModification`, `username`, `idGroup`) VALUES ('".$fileName."', now(), NULL, '".$username."', NULL)");
      }else{
        $query = $db->query("INSERT INTO `Doc` (`name`, `dateDeposit`, `lastModification`, `username`, `idGroup`) VALUES ('".$fileName."', now(), NULL, '".$username."', ".$idG.")");
      }
    }

    public static function getGroup($username){
      $db = Database::getInstance();
      $query = $db->query('SELECT *
        FROM WorkGroup w
        WHERE (w.username1 = "'.$username.'"
        OR w.username2 = "'.$username.'"
        OR w.username3 = "'.$username.'");');
      $i = 0;
      $group = [];
      while($log = $query->fetch()){
        $i++;
        $group[$i] = $log;
      }
      return $group;
    }

    public static function isOwnerOf($username,$file){
      $db = Database::getInstance();
      $query = $db->query('SELECT * FROM Doc d WHERE d.name = "'.$file.'" AND d.username = "'.$username.'"');
      $return = $query->fetch();
      return $return;
    }

    public static function deleteFile($username,$fileName){
      $db = Database::getInstance();
      $query = $db->query('DELETE FROM Doc WHERE name = "'.$fileName.'" AND username = "'.$username.'"');
    }
}
