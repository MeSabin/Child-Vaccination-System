<?php
session_start();
include ("Config.php");

$id=$_GET['id'];
if(isset($_GET['id'])){
   $deleteChildQuery="DELETE from ChildList where RegisterId=$id";
   $reflectchildDeleteQuery=$conn->query($deleteChildQuery);
   header("Location:../HtmlFiles/ChildTable.php");
}
?>