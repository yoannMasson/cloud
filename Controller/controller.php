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

function addDoc(){
  $group = Database::getGroup($_COOKIE['username']);
  require('Views/addDoc.php');
}

function uploadDoc(){
  $target_dir = "files/";
  $imageFileType = $_FILES['file']['type'];
  $target_file = $target_dir.$_COOKIE['username']."_".basename($_FILES["file"]["name"]);
  $uploadOk = 1;
  $fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  // Check if image file is a actual image or fake image

  // Check if file already exists
  if (file_exists($target_file)) {
      $error = " Sorry file already exists";
      $uploadOk = 0;
  }
  // Check file size
  if ($_FILES["file"]["size"] > 500000) {
      $error = "Sorry, your file is too large, must be less than 500Ko";
      $uploadOk = 0;
  }
  // Allow certain file formats, the !== false is intentionnal because strpos returns an offset and 0 is a valid offset
  if(!(strpos($imageFileType, 'pdf') !== false || strpos($imageFileType, 'tex') !== false || strpos($imageFileType, 'docx') !== false )){
      $error = "Sorry, only pdf, tex & docx files are allowed.";
      $uploadOk = 0;
  }
  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
  // if everything is ok, try to upload file
  } else {

      if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        if(isset($_POST['share']) && $_POST['share'] == "on"){
          Database::addFile(basename($_FILES["file"]["name"]),$_COOKIE['username'],$_POST['group']);
        }else{
          Database::addFile(basename($_FILES["file"]["name"]),$_COOKIE['username'],0);
        }
        $success = " Files uploaded :D";
      } else {
        $error =  "Sorry, there was an error uploading your file.";
      }
    }
    listDoc();
}

function deletetDoc($fileName){
  unlink("files/".$_COOKIE['username']."_".$fileName);
  Database::deleteFile($_COOKIE['username'],$fileName);
  listDoc();
}
