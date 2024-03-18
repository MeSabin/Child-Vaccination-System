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
    <link rel="stylesheet" href="../Styles/dash.css">
    <link rel="stylesheet" href="../Styles/dashUserProfile.css">
    <link rel="stylesheet" href="../Styles/ProfileModal.css">
</head>
<body>
<div class="topbar">
        <div class="sessionUsername">
          <div class="profile">
            <img class="profileImg"src="../images/Profile.png" alt="Image not found..">
            <p>Hi, <?php echo $_SESSION['back'];?></p>
          </div>
          <img  class="dropdown" src="../images/Dropdown.png" alt="Image not found..">
        </div>
      </div>
    <div class="side-navbar">
         <div class="firstnav">
 
           <div class="logo">
            <img src="../images/Logo.png" alt="Image not found.." class="logo-img">
            <p>𝓒𝓥𝓡𝓜𝓢</p>
           </div>

         </div>
         <div class="list-container">
         <ul>
          <a href="graphs.php"><li><img src="../images/dashboard.png" alt="Not found"><p>Dashboard</p></li></a>
          <a href="VaccinationHistory.php"><li><img src="../images/vaccinationHistory.png" alt="Not found"><p>Vaccination History</p></li></a>
          <a href="ChildTable.php"><li><img class="childList" src="../images/childList.png" alt="Not found"><p>Child List</p></li></a>
          <a href="VaccineTable.php"><li><img src="../images/vaccine.png" alt="Not found"><p>Vaccines List</p></li></a>
          <li><img src="../images/setting.png" alt="Not found"><p>Settings</p></li>
         </ul>
         </div>
        </div>
      
          <!-- logout Modal -->
        <div class="modalcontainer">
        <div class="overlay"></div>
        <div class="confirmLogout">
          <p class="logoutmessage">Do you really want to logout?</p>
          <hr class="line">
          <div class="btn-logout">
            <button class="cancelbutton">Cancel</button>
            <a href="../BackendFiles/Logout.php"><button class="confirmbutton">Logout</button></a>
          </div>
        </div>
        </div>
          <!-- profile Modal -->
          <div class="overlay1" id="overlay" onclick="closePopup()"></div>
           <div class="popup" id="popup">
              <span class="close" onclick="closePopup()">&times;</span>
              <p class="Email">Email: <?php echo $_SESSION['profileEmail'];?></p> 
              <p class="Email">Username: <?php echo $_SESSION['back'];?></p> 
            <div class="logoutdiv">
             <img src="../images/logout.png" alt="Image not found"><p class="logout">Logout</p> 
            </div>
           </div>
        <script src="../JavaScript/logoutJs.js"></script>
        <script src="../JavaScript/profileModal.js"></script>
      </body>
</html>

