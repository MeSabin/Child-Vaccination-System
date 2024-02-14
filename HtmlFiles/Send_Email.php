<?php
include "../BackendFiles/SendMailBackend.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Styles/Style_Email.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
    <body>
    <div class="mail-container">
    <div class="heading">
        <h2>Recover your password</h2>
    </div>
    <div class="msg-show">
        <?php
    if (isset($_SESSION['msg1'])) {
        echo '<div class= "adjust">' . $_SESSION['msg1'] . "</div>";
        unset($_SESSION['msg1']); // Clear the error message after displaying it.
    }
    ?> </div>
    <div class="msg-show1">
      <?php 
       if(isset($_SESSION['msg'])){
        echo '<div class ="adjust1">' . $_SESSION['msg'] . '</div>';
        unset($_SESSION['msg']);
       }
      ?>
    </div>
         <div class="form-cont">
        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
     
            <p class="name1">Email:</p> <input type="email" id="email" name="email" placeholder="Enter your email" required>
                <button class="btn" name="submit">Submit</button>
        </div>
    </div>
        </form>
    </body>
</body>
</html>

