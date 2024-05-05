<?php

session_start();
require '../app/core/init.php';

$_SESSION['once'] = true;

if($_SESSION['once']==true){
    $_SESSION['message']="";
    $_SESSION['image_schedule']="";
    $_SESSION['alert']="";
    $_SESSION['once'] = false;
}

$app = new App();



