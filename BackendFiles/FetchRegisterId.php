<?php
include("Config.php");

// fetching data to display i.e to show prefilled data in the form in update.php file
$showquery = "SELECT RegisterId from ChildList ORDER BY RegisterId DESC LIMIT 1"; 
$showdata = $conn->query($showquery);
$arrDatas = $showdata->fetch_assoc();


?>