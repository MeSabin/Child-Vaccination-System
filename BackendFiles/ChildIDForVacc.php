<?php
include("Config.php");

$childIDForVacc = $_GET['id'];
// fetching data to display i.e to show prefilled data in the form in VaccineToChild.php file
$childRegIDPre = "SELECT * from ChildList where  RegisterId ='$childIDForVacc'";
$refChRegIdPre = $conn->query($childRegIDPre);
$fetChildRegId = $refChRegIdPre->fetch_assoc();

?>
