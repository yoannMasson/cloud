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
  }
?>
