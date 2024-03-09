<?php
include "Dashboard.php";
include "../BackendFiles/Config.php"; 

$sql = "SELECT childlist.RegisterId, childlist.Name AS childName, childlist.Gender, childlist.FatherName, childlist.MotherName, childlist.Phone, childlist.Address,
        childvaccine.Age, childvaccine.Name, childvaccine.Dose, childvaccine.Date, childvaccine.Doctor
        FROM childlist 
        JOIN childvaccine ON childlist.RegisterId = childvaccine.ID"; // Assuming registration_id corresponds to childvaccine.id
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
      while($row = $result->fetch_assoc()) {
          echo "<div class='childDetails'>";
          echo "<p>Registration ID: " . $row["RegisterId"]. "</p>";
          echo "<p>Name: " . $row["childName"]. "</p>";
          echo "<p>Father's Name: " . $row["FatherName"]. "</p>";
          echo "<p>Mother's Name: " . $row["MotherName"]. "</p>";
          echo "<p>Phone: " . $row["Phone"]. "</p>";
          echo "<p>Address: " . $row["Address"]. "</p>";
          echo "<p>Vaccine Name: " . $row["Name"]. "</p>";
          echo "<p>Vaccine Dose: " . $row["Dose"]. "</p>";
          echo "<p>Vaccine Date: " . $row["Date"]. "</p>";
          echo "<p>Doctor's Name: " . $row["Doctor"]. "</p>";
          echo "<hr/>";
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