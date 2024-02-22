<?php
// session_start();

include "Config.php";
// include "VaccineUpdateBack.php";
   $getVaccineQuery="Select Name from addVaccine ";
   $query=$conn->query($getVaccineQuery);
   
 function sendToHtml($query){
   if ($query->num_rows > 0) {
      // Output data of each row
      while ($row = $query->fetch_assoc()) {
          echo '<option value="' . $row["Name"] . '">' . $row["Name"] . '</option>';
      }
   } else {
      echo '<option value="">No Vaccine available</option>';
   }
 }


if (isset($_POST['clickRegister'])) {

   $registerId=mysqli_real_escape_string($conn, $_POST['registrationNum']);
   $childName=mysqli_real_escape_string($conn, $_POST['childName']);
   $childDob=mysqli_real_escape_string($conn, $_POST['dob']);
   $childAge=mysqli_real_escape_string($conn, $_POST['childAge']);
   $childGender=mysqli_real_escape_string($conn, $_POST['gender']);
   $fatherName=mysqli_real_escape_string($conn, $_POST['fatherName']);
   $motherName=mysqli_real_escape_string($conn, $_POST['motherName']);
   $phone=mysqli_real_escape_string($conn, $_POST['contact']);
   $address=mysqli_real_escape_string($conn, $_POST['address']);
   $vaccineType=mysqli_real_escape_string($conn, $_POST['vaccineType']);
   $vaccineDose=mysqli_real_escape_string($conn, $_POST['vaccineDose']);
   $vaccineDate=mysqli_real_escape_string($conn, $_POST['vaccineDate']);
   $doctorName=mysqli_real_escape_string($conn, $_POST['doctorName']);

   $checkQuery = "SELECT RegisterId FROM ChildList WHERE RegisterId = '$registerId'";
   $checkResult = $conn->query($checkQuery);
   if ($checkResult->num_rows > 0) {
       $_SESSION['showIdWarning'] = "Register Id is already registered.";
       header("Location:registerChild.php");
       exit();
   }
   else{

   $insertChildQuery= "INSERT INTO ChildList (RegisterId, Name, DOB, Age, Gender, FatherName, MotherName, Phone, Address, VaccineName, VaccineDose, VaccineDate, DoctorName) VALUES ('$registerId', '$childName', '$childDob', '$childAge', '$childGender', '$fatherName', '$motherName', '$phone', '$address', '$vaccineType', '$vaccineDose', '$vaccineDate', '$doctorName')";
   
   $reflectInsChlQur= $conn->query($insertChildQuery); 

   if($reflectInsChlQur){
      $_SESSION['ChildRegsMsg'] = "Child registered successfully !";
      echo '<script>
      setTimeout(function() {
          window.location.href = "childTable.php";
      }, 1200);
  </script>';
   }
   else{
      echo "Child not registered";
   }
   
}
}
$conn->close();
?>