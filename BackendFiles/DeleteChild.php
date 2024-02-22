<?php
session_start();
include ("Config.php");

$id=$_GET['id'];
if(isset($_GET['id'])){
   $deleteQuery="DELETE from ChildList where RegisterId=$id";
   $reflectQuery=$conn->query($deleteQuery);
   header("Location:../HtmlFiles/ChildTable.php");
}
?>