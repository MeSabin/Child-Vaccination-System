<?php
session_start();
include ("Config.php");

$id=$_GET['id'];
if(isset($_GET['id'])){
   $deleteVaccQuery="DELETE from addvaccine where Id=$id";
   $reflectDelVaccQuery=$conn->query($deleteVaccQuery);
   header("Location:../HtmlFiles/VaccineTable.php");
}
?>