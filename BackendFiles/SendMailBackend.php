<?php
 session_start();
 include("Config.php");

 if(isset($_POST['submit'])){
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    $emailQuery= "select *from admin where email= '$email' ";
    $reflectEmailQuery= $conn->query($emailQuery);

    // number of rows returned by the sql query
    $emailcount= mysqli_num_rows($reflectEmailQuery);
    
      if ($emailcount) {
        $userdata= $reflectEmailQuery->fetch_assoc();
        $token= $userdata['token'];

          $subject ="Password Reset";
          $body = "Click here to reset your password http://localhost/Child-Vaccination-System/HtmlFiles/Pw_Change.php?token=$token ";
          $sender_email = "From: kaphlesabin789@gmail.com";
          
          if(mail($email, $subject, $body, $sender_email)){
           
            $_SESSION['msg']= "Check your mail to reset password";
            header("Location:Send_Email.php");
            exit();
          }
          else{
            echo "Failed to send Email";
            header("Location:Send_Email.php");
            exit();
          } 
        }
      else{
       $_SESSION['msg1']= "Please enter the correct email";
       header("Location:Send_Email.php");
       exit();
    }
}
$conn->close();

?>