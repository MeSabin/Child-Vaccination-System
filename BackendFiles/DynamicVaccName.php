<?php
include"Config.php";

$getVaccineQuery="Select Name from addVaccine ";
$reflectVaccineQuery=$conn->query($getVaccineQuery);

function sendToHtml($reflectVaccineQuery){
if ($reflectVaccineQuery->num_rows > 0) {
   // Output data of each row
   while ($row = $reflectVaccineQuery->fetch_assoc()) {
       echo '<option value="' . $row["Name"] . '">' . $row["Name"] . '</option>';
   }
} else {
   echo '<option value="">No Vaccine available</option>';
}
}

?>