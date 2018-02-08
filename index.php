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

    if($_GET['action'] == 'login'){
        homePage();
    }
}else{
    disconnect();
    homePage();
}
