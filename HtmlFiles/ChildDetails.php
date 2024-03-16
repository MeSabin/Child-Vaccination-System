<?php
include "Dashboard.php";
include "../BackendFiles/Config.php"; 
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
        include "../BackendFiles/childDetailsBack.php";
     ?>
   </div>
</div>
</body>
</html>