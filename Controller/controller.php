<?php

require('Class/database.php');


function listDoc(){

  $db = Database::getInstance();
  $i = 0;
  $doc = [];
  $teacher = [];
  $group = [];

  //SELECT THE USER DOCS
  $doc = Database::getDoc($_COOKIE['username']);
  //SELECT THE TEACHER DOCS
  $teacher = Database::getDocFromTeacher();
  //SELECT THE GROUP DOCS
  $group = Database::getDocFromGroup($_COOKIE['username']);

  require('Views/listDoc.php');
}

function homePage(){
  require('Views/homePage.php');
}

function login($username,$password){

    $db = Database::getInstance();
    $query = $db->query('SELECT * FROM Person WHERE username = "'.$username.'" AND password = "'.$password.'";');
    $bool = false;
    while($log = $query->fetch()){
      $bool = true;
    }
    if($bool){
      setcookie("username", $username, time() + (86400 * 30), "/");
      header("Location: index.php?action=listDoc");
    }else{
      homePage();
    }
}

function disconnect(){
  setcookie("username", "", time() - (86400 * 30), "/");
}
