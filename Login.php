<?php
include "./BackendFiles/LoginBackend.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>  <!-- login page icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="Styles/login.css">

</head>
<body>
     
<div class="login-container">
    <h2>Admin Login</h2>
    <div class="error-show">
        <?php
            if (isset($_SESSION['error_message'])) {
                echo "<i class='bx bxs-error'></i>";
                echo "<p>" . $_SESSION['error_message'] . "</p>";
                unset($_SESSION['error_message']); // Clear the error message after displaying it.
            }
        ?>
    </div>
    <div class="form-container">
        <form name="form" class="form-container1" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" onsubmit="showSpinner()">

            <div class="input-box">
                <p class="name1">Email:</p> 
                <input name="Email" class="textbox" placeholder="Enter your email" required>
                <i class='bx bxs-user'></i>
            </div> 

            <div class="input-box box">
                <p class="name2">Password:</p>
                <input type="password" name="password" class="textbox" placeholder="Enter your password" required>
                <i class='bx bxs-lock-alt' ></i>
            </div>  
            <p><a href="Send_Email.php" class="forgot-password">Forgot Password?</a></p>
            <button class="btn" name="submit" type="submit">Login</button>
        </form>
        <!-- bootstrap spinner code -->
        <!-- <div class="d-flex justify-content-center Spinner" style="display:none;">
            <div class="spinner-border" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div> -->
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var form = document.forms['form'];

        form.addEventListener('submit', function () {
            showSpinner();
        });
    });

    function showSpinner() {
        document.querySelector('.Spinner').style.display = 'block';
    }
</script>
</body>
</html>
