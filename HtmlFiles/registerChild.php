<?php
  include "Dashboard.php";
  include "../BackendFiles/RegisterChild.php";
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Child Vaccination Registration</title>
<link rel="stylesheet" href="../Styles/childRegister.css">
</head>
<body>

<div class="registerCont">
<form action="" method="post">
   <h3 class="formTitle">Child Registration Form</h3>
  <h3 class="childInfo">Child Information</h3>

<div class="childForm">
    <div class="registerId">
      <label class="labelText">Registration Id:</label>
      <input type="text" class="registrationNum" name="registrationNum" placeholder="Enter registration Id" required>
    </div>
    <div class="childName">
      <label class="labelText">Child Name:</label>
      <input type="text" class="childName" name="childName" placeholder="Enter name of a child" >
    </div>
  
    <div class="alignDob">
      <label class="labelTextDob">Date of Birth:</label>
      <input type="date" class="dob" name="dob" placeholder="Enter child DOB" required>
    </div>
      <div class="alignAge">
        <label class="labelText">Child Age [In months]:</label>
        <input type="number" class="childAge" name="childAge" placeholder="Child age in months" required>
      </div>
   </div>

  <div class="selectGender">
   <label class="labelText">Gender:</label>
   <div class="alignRadios">
      <input type="radio" id="maleGender" name="gender" value="Male">
      <label class="radioGen">Male</label>
      <input type="radio" id="femaleGender" name="gender" value="Female">
      <label class="radioGen">Female</label>
      <input type="radio" id="otherGender" name="gender" value="Others">
      <label class="radioGen">Others</label>
   </div>
  </div>
  <h3 class="parentsInfo">Parent/Guardian Information</h3>
  
<div class="parentForm">
      <div class="fatherName">
        <label class="labelText">Father's Name:</label>
        <input type="text" class="parentName" name="fatherName" placeholder="Enter name of father" required>
      </div>
      <div class="motherName">
        <label class="labelText">Mother's Name:</label>
        <input type="text" class="parentName" name="motherName" placeholder="Enter name of mother" required>
      </div>
      <div class="parentContact">
        <label class="labelText">Contact Number:</label>
        <input type="text" class="contact" name="contact" placeholder="Enter parents contact no." required>
      </div>
      <div class="parentAddress">
        <label class="labelText">Address:</label>
        <input type="text" class="address" name="address" placeholder="Enter parents address" required>
      </div>
</div>
  <h3 class="vaccineInfo">Vaccination Details</h3>
<div class="vaccineForm">
      <div class="vaccineName">
        <label class="labelText">Vaccine Name:</label>
        <select class="vaccineType" name="vaccineType">
         <?php
         sendToHtml($query);
        ?>
        </select>
      </div>
    <div class="vaccineTypeInfo">
      <label class="labelText">Vaccine Dose:</label>
      <select class="vaccineType" name="vaccineDose">
        <option value="First Dose">First Dose</option>
        <option value="Second Dose">Second Dose</option>
        <option value="Third Dose">Third Dose</option>
      </select>
    </div>
      <div class="vaccineDateGiven">
        <label class="labelText">Date of Vaccine Given:</label><br>
        <input type="date" class="vaccineDate" name="vaccineDate" required><br>
      </div>
      <div class="vaccineGivenBy">
        <label class="labelText">Given By(Doctor's Name):</label><br>
        <input type="text" class="doctorName" name="doctorName" placeholder="Vaccine given by"><br>
      </div>
</div>
  <button class="registerButton" name="clickRegister">Register</button>

</form>
</div>
</body>
</html>
