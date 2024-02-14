<?php
session_start();
session_destroy();
header('Location: ../HtmlFiles/Login.php');
?> 
