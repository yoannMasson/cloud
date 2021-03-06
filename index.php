<?php
require('Controller/controller.php');

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'listDoc' && isset($_COOKIE['username'])) {
      listDoc();
    }
    if($_GET['action'] == 'listDocFromLog'){
      if (!empty($_POST['username']) && !empty($_POST['password'])) {
        login(htmlspecialchars($_POST['username']),htmlspecialchars($_POST['password']));
      }else{
        homePage();
      }
    }
    if($_GET['action'] == 'listDocFromAdd'  && isset($_COOKIE['username']) ){
      uploadDoc();
    }
    if($_GET['action'] == 'login'){
        homePage();
    }
    if($_GET['action'] == 'addDoc' && isset($_COOKIE['username'])){
        addDoc();
    }
    if($_GET['action'] == 'delete' && isset($_GET['file'])  && isset($_COOKIE['username'])){
      if(Database::isOwnerOf($_COOKIE['username'],$_GET['file'])){
        deletetDoc($_GET['file']);
      }else{
        disconnect();
        homePage();
      }
    }
}else{
    disconnect();
    homePage();
}
