<?php
        session_start();
           include("Config.php");
           
           if(isset($_POST['UpdPass'])){
               if(isset($_GET['token'])){
           
                   $token= $_GET['token'];
                   $NewPassword= mysqli_real_escape_string($conn, $_POST['Password']);
                   $Cpassword= mysqli_real_escape_string($conn, $_POST['C_Password']);

                   if($NewPassword ===$Cpassword) {
                       $hashed_password = password_hash($NewPassword, PASSWORD_BCRYPT);
                       $passwordChangeQuery= "UPDATE admin set password='$hashed_password' where token='$token'";
                       $reflectPasswordChangeQuery= $conn->query($passwordChangeQuery);
           
                       if($reflectPasswordChangeQuery){
                           $_SESSION['passmsg']= "Your password has been updated";
                               echo '<script>
                           setTimeout(function() {
                               window.location.href = "Login.php";
                           }, 200000);
                       </script>';
                              
                        }
                   }
                   else{
                          $_SESSION['passmsg1'] = "Password is not matching";
                          header("location: Pw_Change.php?token=$token");
                          exit();
                   }
               }     
           }
           $conn->close();
?>