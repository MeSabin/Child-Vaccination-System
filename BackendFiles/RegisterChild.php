<?php
// session_start();
include "Config.php";

if (isset($_POST['clickRegister'])) {

   $registerId=mysqli_real_escape_string($conn, $_POST['registrationNum']);
   $childName=mysqli_real_escape_string($conn, $_POST['childName']);
   $childDob=mysqli_real_escape_string($conn, $_POST['dob']);
   $childGender=mysqli_real_escape_string($conn, $_POST['gender']);
   $fatherName=mysqli_real_escape_string($conn, $_POST['fatherName']);
   $motherName=mysqli_real_escape_string($conn, $_POST['motherName']);
   $phone=mysqli_real_escape_string($conn, $_POST['contact']);
   $address=mysqli_real_escape_string($conn, $_POST['address']);

   $checkIdQuery = "SELECT RegisterId FROM ChildList WHERE RegisterId = '$registerId'";
   $reflectCheckIdQuery = $conn->query($checkIdQuery);
   if ($reflectCheckIdQuery->num_rows > 0) {
       $_SESSION['showIdWarning'] = "Register Id is already registered.";
       header("Location:registerChild.php");
       exit();
   }
   else{

   $insertChildQuery= "INSERT INTO ChildList (RegisterId, Name, DOB, Gender, FatherName, MotherName, Phone, Address) VALUES ('$registerId', '$childName', '$childDob', '$childGender', '$fatherName', '$motherName', '$phone', '$address')";
   
   $reflectInsChlQur= $conn->query($insertChildQuery); 

   if($reflectInsChlQur){
      $_SESSION['ChildRegsMsg'] = "Child registered successfully !";
      echo '<script>
      setTimeout(function() {
          window.location.href = "childTable.php";
      }, 2000);
  </script>';
   }
   else{
      echo "Child not registered";
   }
   
}
}
$conn->close();
?>