<?php
include "Dashboard.php";
include "Config.php"; 

$sql = "SELECT child_details.child_id, child_details.name AS child_name, child_details.parent_id, child_details.vaccine_date, child_details.administered_by, parents.name AS parent_name, parents.phone, parents.address, child_details.vaccine_dose 
        FROM child_details 
        JOIN parents ON child_details.parent_id = parents.id";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="../Styles/childDetails.css">
   <title>Document</title>
</head>
<body>
   <div class="mainTitleCont">
   <div class="titleCont">
      <img src="../images/VaccineDet_Icon.png" alt="Image not found..">
      <h2 class="title">Child Vaccination Details</h2>
   </div>
   <hr>
   </div>

   <div class="childDetailsCont">
      <?php
      if ($result->num_rows > 0) {
         // Output data of each row
         while($row = $result->fetch_assoc()) {
            echo "<div class='childDetails'>";
            echo "<p>Child ID: " . $row["child_id"]. "</p>";
            echo "<p>Name: " . $row["name"]. "</p>";
            echo "<p>Parent's Name: " . $row["parent_name"]. "</p>";
            echo "<p>Vaccine Date: " . $row["vaccine_date"]. "</p>";
            echo "<p>Administered By: " . $row["administered_by"]. "</p>";
            echo "<p>Phone: " . $row["phone"]. "</p>";
            echo "<p>Address: " . $row["address"]. "</p>";
            echo "<p>Vaccine Dose: " . $row["vaccine_dose"]. "</p>";
            echo "</div>";
         }
      } else {
         echo "0 results";
      }
      $conn->close();
      ?>
   </div>
</body>
</html>