<?php
// session_start();
include "Config.php";

if (isset($_POST['clickRegister'])) {
   $citizenshipNo=mysqli_real_escape_string($conn, $_POST['citizenNo']);
   $registerId=mysqli_real_escape_string($conn, $_POST['registrationNum']);
   $childName=mysqli_real_escape_string($conn, $_POST['childName']);
   $childDob=mysqli_real_escape_string($conn, $_POST['dob']);
   $childGender=mysqli_real_escape_string($conn, $_POST['gender']);
   $fatherName=mysqli_real_escape_string($conn, $_POST['fatherName']);
   $motherName=mysqli_real_escape_string($conn, $_POST['motherName']);
   $phone=mysqli_real_escape_string($conn, $_POST['contact']);
   $address=mysqli_real_escape_string($conn, $_POST['address']);


   $insertChildQuery= "INSERT INTO ChildList (CitizenshipNo, RegisterId, Name, DOB, Gender, FatherName, MotherName, Phone, Address) VALUES ('$citizenshipNo','$registerId', '$childName', '$childDob', '$childGender', '$fatherName', '$motherName', '$phone', '$address')";
   $userName=mysqli_real_escape_string($conn, $_POST['username']);
   $password=mysqli_real_escape_string($conn, $_POST['password']);
   $insertParentsAccQur="INSERT INTO parents (Name, UserName, Phone, Password) VALUES ('$motherName','$userName', '$phone', '$password')";
   $refParentsAccQur=$conn->query($insertParentsAccQur);
   $reflectInsChlQur= $conn->query($insertChildQuery); 

   if($reflectInsChlQur && $refParentsAccQur){
      $_SESSION['ChildRegsMsg'] = "Child and Parent data entry successful !";
      echo '<script>
      setTimeout(function() {
          window.location.href = "childTable.php";
      }, 2000);
  </script>';
   }
   else{
      echo "Data entry not successful";
   }
   
}
$conn->close();
?>