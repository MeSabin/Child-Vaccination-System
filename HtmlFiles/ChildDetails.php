<?php
include "Dashboard.php";
include "../BackendFiles/Config.php"; 

$idForChildDetail=$_GET['id'];
$sql = "SELECT childlist.RegisterId, childlist.Name AS childName, childlist.Gender, childlist.FatherName, childlist.MotherName, childlist.Phone, childlist.Address,
        childvaccine.Age, childvaccine.Name, childvaccine.Dose, childvaccine.Date, childvaccine.Doctor
        FROM childlist 
        JOIN childvaccine ON childlist.RegisterId = childvaccine.ID
        WHERE childlist.RegisterId = $idForChildDetail";
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
      $printedRegistrationDetails = false; // Flag to track whether registration details have been printed
      $vaccineDetails = array(); // Array to store vaccine details grouped by vaccine name
  
      while($row = $result->fetch_assoc()) {
          // Print registration details only once
          if (!$printedRegistrationDetails) {
              echo "<div class='childDetails'>";
              echo "<p>Registration ID: " . $row["RegisterId"]. "</p>";
              echo "<p>Name: " . $row["childName"]. "</p>";
              echo "<p>Father's Name: " . $row["FatherName"]. "</p>";
              echo "<p>Mother's Name: " . $row["MotherName"]. "</p>";
              echo "<p>Phone: " . $row["Phone"]. "</p>";
              echo "<p>Address: " . $row["Address"]. "</p>";
              echo "</div>";
              
              $printedRegistrationDetails = true; // Set the flag to true after printing registration details
          }
  
          // Group vaccine details by vaccine name
          $vaccineName = $row["Name"];
          if (!isset($vaccineDetails[$vaccineName])) {
              $vaccineDetails[$vaccineName] = array();
          }
          $vaccineDetails[$vaccineName][] = array(
              "Dose" => $row["Dose"],
              "Date" => $row["Date"],
              "Doctor" => $row["Doctor"]
          );
      }
      
      // Print vaccine details for each unique vaccine name
      foreach ($vaccineDetails as $vaccineName => $details) {
          echo "<div class='vaccineDetails'>";
          echo "<p>Vaccine Name: " . $vaccineName. "</p>";
          foreach ($details as $detail) {
              echo "<p>Vaccine Dose: " . $detail["Dose"]. "</p>";
              echo "<p>Vaccine Date: " . $detail["Date"]. "</p>";
              echo "<p>Doctor's Name: " . $detail["Doctor"]. "</p>";
          }
          echo "</div>";
      }
  } else {
      echo "No details available !";
  }
  $conn->close();  ?>
   </div>
</body>
</html>