<?php
 session_start();
 include("Config.php");

 if(isset($_POST['submit'])){

    $email = mysqli_real_escape_string($conn, $_POST['email']);

    $emailquery= "select *from admin where email= '$email' ";
    $query= mysqli_query($conn, $emailquery);
    
    $emailcount= mysqli_num_rows($query);

      if ($emailcount) {
         
        $userdata= mysqli_fetch_array($query);
        $token= $userdata['token'];

          $subject ="Password Reset";
          $body = "Click here to reset your password http://localhost/Project/Admin/Pw_Change.php?token=$token ";
          $sender_email = "From: kaphlesabin789@gmail.com";
          
          if(mail($email, $subject, $body, $sender_email)){
           
            $_SESSION['msg']= "Check your mail to reset password";
            header("location:Send_Email.php");
            exit();
          }

          else{
            echo "Failed to send Email";
            header("location:Send_Email.php");
            exit();
          } 
        }
      else{
       $_SESSION['msg1']= "Please enter the correct email";
       header("location:Send_Email.php");
       exit();
    }
}
$conn->close();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Style_Email.css">
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
        
            <!-- <i class='bx bx-envelope'></i> -->
            <p class="name1">Email:</p> <input type="email" id="email" name="email" placeholder="Enter your email" required>
            <!-- <div class="btn-cnt"> -->
                <button class="btn" name="submit">Submit</button>
        </div>
    </div>
    <!-- </div> -->
        </form>
    </body>
</body>
</html>

