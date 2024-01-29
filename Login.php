<?php
session_start();
include("Config.php");
if( isset( $_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn']){
    header("location: Dashboard.php");
 }
 
if (isset($_POST['submit'])) {
// Getting email and password and storing them in variables
    $email = mysqli_real_escape_string($conn, $_POST['Email']);
    $password = mysqli_real_escape_string($conn, $_POST['Password']);

    // Performing SQL query to check if the username and password matches in the database.
    $query = "SELECT * from admin where email='$email' and password='$password'";
    // executes SQL query stored in $query using query() method on connection object $conn
    $result = $conn->query($query);

    // checks if one row with the email and password has been found
    if ($result->num_rows == 1) {
       
        $_SESSION['isLoggedIn'] = true;
        $token= bin2hex(random_bytes(15));

        $getEmail = $result->fetch_assoc();
        $_SESSION['back'] = $getEmail['Email']; 

        $updateQuery = "UPDATE admin SET token = '$token', status = 'inactive' WHERE email = '$email' AND password = '$password'";
        $queryfire = $conn->query($updateQuery);


            if($queryfire){
                header("location: Dashboard.php");
                exit();
            }
            else{ 
                echo "Not inserted";
            } 
    // else statement to print message using session variable if username or password doesnot match        
    } else {
        $_SESSION['error_message'] = "Incorrect Email or Password";
        header("location: Login.php"); 
        exit();
    }
}
// close the database connection after login page connection has performed
$conn->close(); 

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>  <!-- login page icons -->
    <link rel="stylesheet" href="login.css">
    <meta http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate, max-age=0">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="-1">

</head>
<body>
     
<div class="login-container">
        <h2>Admin Login</h2>
    <div class="error-show">
        <?php
    if (isset($_SESSION['error_message'])) {
        // echo '<div class="set-size">';
        echo "<i class='bx bxs-error'></i>";
        echo "<p>" . $_SESSION['error_message'] . "</p>";
        // echo '</div>';
        unset($_SESSION['error_message']); // Clear the error message after displaying it.
    }

    ?>
    </div>
        <div class="form-container">
        <form name="form" class="form-container1" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">

        
            <div class="input-box">
               <p class="name1">Email:</p> <input type="email" name="Email" class="textbox" placeholder="Enter your email" required>
              
                <i class='bx bxs-user'></i>
            </div> 

            <div class="input-box box">
            <p class="name2">Password:</p><input type="password" name="Password" class="textbox" placeholder="Enter your password" required>
                <i class='bx bxs-lock-alt' ></i>
            </div>  
            <p><a href="Send_Email.php" class="forgot-password">Forgot Password?</a></p>
            <button class="btn" name="submit">Login</button>
        
        </form>
    
</div>
</div>

</body>
</html>





