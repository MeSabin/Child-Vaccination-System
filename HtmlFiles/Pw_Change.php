
<?php
include "../BackendFiles/PwChangeBackend.php"
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Styles/Style_Pw.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <body>
    <div class="mail-container">
    <div class="heading">
        <h2>Update your password</h2>
    </div>
    <div class="msg-show2">
         <?php 
            if(isset($_SESSION['passmsg'])){
                echo '<div class="adjust3">' . $_SESSION['passmsg'] . '</div>';
                unset($_SESSION['passmsg']);
            }
            ?> </div>
    <div class="msg-show3">
         <?php 
            if(isset($_SESSION['passmsg1'])){
                echo '<div class="adjust4">' . $_SESSION['passmsg1'] . '</div>';
                unset($_SESSION['passmsg1']);
            }
            ?> </div>
            
    <div class="form-cont1">
        <form action="" method="post">
            <!-- <i class='bx bx-envelope'></i> -->
            <p class="name1">Password:</p> <input type="password" id="email" name="Password" placeholder="Enter new password" required>
            <p class="name2">Confirm Password:</p> <input type="password" id="Pw" name="C_Password" placeholder="Re-enter new password" required>
                <button class="btn" name="UpdPass">Update</button>
        </div>
    </div>  
        </form>
      
</body>
</html>