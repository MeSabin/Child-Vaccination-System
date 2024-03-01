<?php
include "../BackendFiles/LoginbackFunct.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>  <!-- login page icons -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="../Styles/login.css">

</head>
<body>
     
<div class="login-container">
    <h2>Doctor Login</h2>
    <div class="error-show">
        <?php
            if (isset($_SESSION['error_message'])) {
                echo "<i class='bx bxs-error'></i>";
                echo "<p>" . $_SESSION['error_message'] . "</p>";
                unset($_SESSION['error_message']); // Clear the error message after displaying it and also removes when page is reloaded
            }
        ?>
    </div>
    <div class="successMessageCont">

        <div class="success-message">
            <?php 
        if (isset($_SESSION['success_message'])) {
            echo "<p>" . $_SESSION['success_message'] . "</p>";
            unset($_SESSION['success_message']); // Clear the error message after displaying it.
        }
        ?>
    </div>
</div>
    <div class="form-container">
        <form name="form" class="form-container1" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" onsubmit="showSpinner()">

            <div class="input-box">
                <p class="name1">Username/Email:</p> 
                <input name="Email" class="textbox" value="<?php if (isset($_COOKIE['emailcookie'])) {echo $_COOKIE['emailcookie'];}?>" placeholder="Enter username or email" required>
                <i class='bx bxs-user'></i>
            </div> 

            <div class="input-box box">
                <p class="name2">Password:</p>
                <input type="password" name="password" value="<?php if (isset($_COOKIE['passwordcookie'])) {echo $_COOKIE['passwordcookie'];}?>" class="textbox1" placeholder="Enter your password" required>
                <img class="eye" src="../images/closeEye.png" alt="Not found">
            </div>  
        <div class="containRemFor">
            <div class="remember">
              <input type="checkbox" class="rememberMe" name="remember_me">
              <p class="rememberText">Remember Me</p>
            </div>
            <p class="forgot"><a href="Send_Email.php" class="forgot-password">Forgot Password?</a></p>
        </div>
            <button class="btn" name="submit" type="submit">Login</button>
        </form>
    </div>
</div>

<script src="../JavaScript/loginEye.js"></script>
</body>
</html>

