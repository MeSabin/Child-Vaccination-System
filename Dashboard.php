<?php

session_start();
if(!isset($_SESSION['back'])){
  header("location: Login.php");
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Styles/dash.css">
    
</head>
<body>
    <div class="side-navbar">
         <div class="firstnav">
 
           <div class="logo">
            <img src="images/Logo.png" alt="Image not found.." class="logo-img">
            <p>VACCINATION SYSTEM</p>
           </div>

         </div>
         <div class="list-container">
         <ul>
          <li><img src="images/dashboard.png" alt="Not found"><p>Dashboard</p></li>
          <li><img src="images/history.png" alt="Not found"><p>Vaccination History</p></li>
          <li><img src="images/child.png" alt="Not found"><p>Child List</p></li>
          <a href="VaccineTable.php"><li><img src="images/vaccine.png" alt="Not found"><p>Vaccines List</p></li></a>
          <li><img src="images/setting.png" alt="Not found"><p>Settings</p></li>
          <a href="Logout.php"><li><img src="images/logout.png" alt="Not found"><p>Logout</p></li></a>
         </ul>
         </div>
        </div>
        <div class="sessionUsername">
          <div class="profile">
            <img src="./images/DoctorProfile.png" alt="Image not found..">
          </div>
         <p>Hi, <?php echo $_SESSION['back'];?></p>
        </div>
      </body>
</html>

