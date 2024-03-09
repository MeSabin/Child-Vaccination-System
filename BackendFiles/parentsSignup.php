<?php
include "Config.php";

if (isset($_POST['ParentsSignupBtn'])){
   $fullName=mysqli_real_escape_string($conn, $_POST['fullname']);
   $userName=mysqli_real_escape_string($conn, $_POST['username']);
   $phone=mysqli_real_escape_string($conn, $_POST['phone']);
   $password=mysqli_real_escape_string($conn, $_POST['password']);

   $registerParentsQur="INSERT INTO parents (Name, Username, Phone, Password) VALUES ('$fullName','$userName','$phone', '$password')";
   $refRegParentsQur=$conn->query($registerParentsQur);
   if (!$refRegParentsQur) {
      echo "Error: " . $conn->error;
  }
   if($refRegParentsQur){
      $_SESSION['parentsRegisterMsg'] = "Account created successfully !";
      echo '<script>
      setTimeout(function() {
          window.location.href = "parentsSignup.php";
      }, 2000);
      </script>';
   }
   else{
      echo "Account not created";
   }
}
$conn->close();
?>
