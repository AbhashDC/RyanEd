<?php

//$sesid=$_SESSION['id'];
//$sesname=$_SESSION['first_name'];
//echo $sesname;

//if($_SESSION['id']=="")
//{
//    header('location: login.php');
//    echo"invalid login";
//}
 if (session_status() == PHP_SESSION_NONE) {
    session_start();
    if(!isset($_SESSION['aid'])){
        header('location: ../index.php');
    }
     if(!isset($_SESSION['type'])){
         header('location: index.php');
     }
}
?>