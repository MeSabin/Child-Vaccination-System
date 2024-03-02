<?php
include("Config.php");

// fetching data to display i.e to show prefilled data in the form in update.php file
$lastRegisterId = "SELECT RegisterId from ChildList ORDER BY RegisterId DESC LIMIT 1"; 
$reflectLastRegId = $conn->query($lastRegisterId);
$fetchChildLastId = $reflectLastRegId->fetch_assoc();
?>