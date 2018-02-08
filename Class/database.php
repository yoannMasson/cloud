<?php
  class Database {
    private static $instance = NULL;

    private function __construct() {}

    private function __clone() {}



    public static function getInstance() {

      $host = "34.238.85.32";
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
}
