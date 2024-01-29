<?php
session_start();
session_destroy();
header('Location: Login.php');



// $_SESSION['back'] ="You are out now";
// if( isset( $_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn']){
//     header("location: Login.php");
//     exit();
// }
// if (isset($_POST['logout'])) {
//     $_SESSION['isLoggedIn'] = false;
//     header("location: Login.php");
//     exit();
// }
?> 
