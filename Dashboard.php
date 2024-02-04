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
    <link rel="stylesheet" href="Styles/dashUserProfile.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

    <div class="side-navbar">
         <div class="firstnav">
 
           <div class="logo">
            <img src="images/Logo.png" alt="Image not found.." class="logo-img">
            <p>CVRMS</p>
           </div>

         </div>
         <div class="list-container">
         <ul>
          <li><img src="images/dashboard.png" alt="Not found"><p>Dashboard</p></li>
          <li><img src="images/history.png" alt="Not found"><p>Vaccination History</p></li>
          <li><img src="images/child.png" alt="Not found"><p>Child List</p></li>
          <a href="VaccineTable.php"><li><img src="images/vaccine.png" alt="Not found"><p>Vaccines List</p></li></a>
          <li><img src="images/setting.png" alt="Not found"><p>Settings</p></li>
          <a href=""><li><img src="images/logout.png" alt="Not found" ><p>Logout</p></li></a>
         </ul>
         </div>
        </div>
       <div class="topbar">
        <div class="sessionUsername">
          <div class="profile">
            <img src="./images/DoctorProfile.png" alt="Image not found..">
            <p>Hi, <?php echo $_SESSION['back'];?></p>
         </div>
        </div>
      </div>
          
         <!-- Bootstrap code -->
         <!-- <p>
      <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseWidthExample" aria-expanded="false" aria-controls="collapseWidthExample">
        Toggle width collapse
      </button>
    </p>
    <div style="min-height: 120px;">
      <div class="collapse collapse-horizontal" id="collapseWidthExample">
        <div class="card card-body" style="width: 300px;">
          This is some placeholder content for a horizontal collapse. It's hidden by default and shown when triggered.
        </div>
      </div>
    </div> -->
        <div class="modalcontainer">
        <div class="overlay"></div>
        <div class="confirmLogout">
          <p class="logoutmessage">Do you really want to logout?</p>
          <hr class="line">
          <div class="btn-logout">
            <button class="cancelbutton">Cancel</button>
            <a href="Logout.php"><button class="confirmbutton">Logout</button></a>
          </div>
        </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script src="JavaScript/logoutJs.js"></script>
      </body>
</html>

