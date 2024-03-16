<?php
include "Dashboard.php";
include "../BackendFiles/Config.php";

// Get today's date
$today = date("Y-m-d");

// Calculate the date 7 days ago
$sevenDaysAgo = date("Y-m-d", strtotime("-7 days"));

$join2TablesQur = "SELECT childlist.RegisterId, childlist.Name AS childName, childlist.Gender, childlist.FatherName, childlist.MotherName, childlist.Phone, childlist.Address,
        childvaccine.Age, childvaccine.Name, childvaccine.Dose, childvaccine.Date, childvaccine.Doctor
        FROM childlist 
        JOIN childvaccine ON childlist.RegisterId = childvaccine.ID
        WHERE childvaccine.Date BETWEEN '$sevenDaysAgo' AND '$today'";

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
         <h2 class="title">Vaccination history of past 7 days</h2>
      </div>
   <hr>
   </div>

   <div class="childDetailsCont">
      <?php
   if ($refJoin2Tables->num_rows > 0) {
      while($row = $refJoin2Tables->fetch_assoc()) {
          // Print registration details
          echo "<div class='childNameTime'>";
          echo "<p class='childName'>Name: " . $row["childName"]. "</p>";
          echo "<div class='time'>";
          echo "<img class='timeIcon' src='../images/timeIcon.png' alt='Image not found'>";
          echo "<p class='day'>";

          if ($row["Date"] == $today) {
              echo "Today";
          } elseif ($row["Date"] == date("Y-m-d", strtotime("-1 day"))) {
              echo "Yesterday";
          }  
          elseif ($row["Date"] == date("Y-m-d", strtotime("-2 day"))) {
              echo "2 days ago";
          } 
          elseif ($row["Date"] == date("Y-m-d", strtotime("-3 day"))) {
              echo "3 days ago";
          }
           elseif ($row["Date"] == date("Y-m-d", strtotime("-4 day"))) {
              echo "4 days ago";
          } 
           elseif ($row["Date"] == date("Y-m-d", strtotime("-5 day"))) {
              echo "5 days ago";
          }
          elseif ($row["Date"] == date("Y-m-d", strtotime("-6 day"))) {
              echo "6 days ago";
          } 
          else {
              echo "7 days ago";
          }
          
          echo "</p>";
          echo "</div>";
          echo "</div>";
          echo "<div class='childDetails'>";
          echo "<p>Registration ID: " . $row["RegisterId"]. "</p>";
          echo "<p>Mother's Name: " . $row["MotherName"]. "</p>";
          echo "<p>Phone: " . $row["Phone"]. "</p>";
          echo "<p>Address: " . $row["Address"]. "</p>";
          echo "</div>";

          // Print vaccine details
          echo "<div class='vaccineDetails'>";
          echo "<p class='vaccineName'>Vaccine: " . $row["Name"]. "</p>";
          echo "<p class='vaccDose'>Dose: " . $row["Dose"]. "</p>";
          echo "<p>Doctor's Name: " . $row["Doctor"]. "</p>";
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
