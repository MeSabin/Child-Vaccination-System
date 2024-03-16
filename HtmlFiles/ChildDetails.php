<?php
include "Dashboard.php";
include "../BackendFiles/Config.php"; 

$idForChildDetail=$_GET['id'];
$join2TablesQur = "SELECT childlist.RegisterId, childlist.Name AS childName, childlist.Gender, childlist.FatherName, childlist.MotherName, childlist.Phone, childlist.Address,
        childvaccine.Age, childvaccine.Name, childvaccine.Dose, childvaccine.Date, childvaccine.Doctor
        FROM childlist 
        -- joins all the table rows
        JOIN childvaccine ON childlist.RegisterId = childvaccine.ID
        -- condition to fetch only the data from id get from url
        WHERE childlist.RegisterId = $idForChildDetail";
$refJoin2Tables = $conn->query($join2TablesQur);
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

<div class="mainVaccDetCont">
   <div class="mainTitleCont">
      <div class="titleCont">
         <img src="../images/VaccineDet_Icon.png" alt="Image not found..">
         <h2 class="title">Child Vaccination Details</h2>
      </div>
   <hr>
   </div>

   <div class="childDetailsCont">
      <?php
    //here num_rows >0 applies for both table ie. id fetched from above should have data/row in both table
   if ($refJoin2Tables->num_rows > 0) {
      $printedRegistrationDetails = true; 
      // if vaccineDetails is initialized inside while loop, each iteration re-initialize the empty array
      $vaccineDetails = array(); // Array to store vaccine details grouped by vaccine name

      while($row = $refJoin2Tables->fetch_assoc()) {
          // Print registration details only once. if if(!$printedRegistrationDetails) not use, contents inside childDetails div will be printed the no. of times the id is present in the table
          if ($printedRegistrationDetails) {
              echo "<div class='childDetails'>";
              echo "<p class='childName'>Name: " . $row["childName"]. "</p>";
              echo "<p>Registration ID: " . $row["RegisterId"]. "</p>";
              echo "<p>Gender: " . $row["Gender"]. "</p>";
              echo "<p>Father's Name: " . $row["FatherName"]. "</p>";
              echo "<p>Mother's Name: " . $row["MotherName"]. "</p>";
              echo "<p>Phone: " . $row["Phone"]. "</p>";
              echo "<p>Address: " . $row["Address"]. "</p>";
              echo "</div>";
              echo "<hr>";
              
              $printedRegistrationDetails = false; 
          }

          // Group vaccine details by vaccine name
          $vaccineName = $row["Name"];

        //vaccineDetails is associative array variable and vaccineName is variable to hold key
        //when $vaccineName contains duplicates vaccine name, the vaccine details is stored in one vaccine name 
        // responsible to handle and store duplicate vaccine name in one key i.e. $vaccineName
          $vaccineDetails[$vaccineName][] = array(
            // this will be repeated for the same vaccine name
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
              echo "<p>Date given: " . $detail["Date"]. "</p>";
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