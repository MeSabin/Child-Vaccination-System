<?php
include "Dashboard.php";
include "../BackendFiles/Config.php";

// Get today's date
$today = date("Y-m-d");

$join2TablesQur = "SELECT childlist.RegisterId, childlist.Name AS childName, childlist.Gender, childlist.FatherName, childlist.MotherName, childlist.Phone, childlist.Address,
        childvaccine.Age, childvaccine.Name, childvaccine.Dose, childvaccine.Date, childvaccine.Doctor
        FROM childlist 
        JOIN childvaccine ON childlist.RegisterId = childvaccine.ID
        WHERE childvaccine.Date = '$today'";

$refJoin2Tables = $conn->query($join2TablesQur);
?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="../Styles/VaccHistory.css">
   <title>Document</title>
</head>
<body>

<div class="mainVaccDetCont">
   <div class="mainTitleCont">
      <div class="titleCont">
         <img src="../images/VaccineDet_Icon.png" alt="Image not found..">
         <h2 class="title">Today Vaccinated child</h2>
      </div>
   <hr>
   </div>

   <div class="childDetailsCont">
      <?php
   if ($refJoin2Tables->num_rows > 0) {
    //   $printedRegistrationDetails = false; 
      $vaccineDetails = array(); // Array to store vaccine details grouped by vaccine name
  
      while($row = $refJoin2Tables->fetch_assoc()) {
          // Print registration details only once
        
            echo "<div class='childNameTime'>";
                     echo "<p class='childName'>Name: " . $row["childName"]. "</p>";
                     echo "<div class='time'>";
                     echo "<img class='timeIcon' src='../images/timeIcon.png' alt='Image not found'>";
                     echo "<p class='day'>Today</p>";
                     echo "</div>";
                 echo "</div>";
              echo "<div class='childDetails'>";
                
            //   echo "<div class='childInfo'>";
              echo "<p>Registration ID: " . $row["RegisterId"]. "</p>";
              echo "<p>Mother's Name: " . $row["MotherName"]. "</p>";
              echo "<p>Phone: " . $row["Phone"]. "</p>";
              echo "<p>Address: " . $row["Address"]. "</p>";
                //  echo "</div>";
              echo "</div>";
              
              $printedRegistrationDetails = true; 
          
  
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
          echo "<p class=vaccineName>Vaccine: " . $vaccineName. "</p>";
          foreach ($details as $detail) {
              echo "<p class='vaccDose'>Dose: " . $detail["Dose"]. "</p>";
              echo "<p>Doctor's Name: " . $detail["Doctor"]. "</p>";
          }
          echo "</div>";
      }
  } else {
      echo "<p class='elseMsg'>No details available !</p>";
  }
  $conn->close();  ?>
   </div>
</div>
</body> 
</html>
