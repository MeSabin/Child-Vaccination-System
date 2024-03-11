<?php
  include "Dashboard.php";
  include "../BackendFiles/RegisterChild.php";
  include "../BackendFiles/FetchRegisterId.php";
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Child Vaccination Registration</title>
<link rel="stylesheet" href="../Styles/updateChild.css">
</head>
<body>

<div class="registerCont">
<form action="" method="post">
   <h3 class="formTitle">Child Registration Form</h3>
   <div class="msg-show1">
         <?php 
            if(isset($_SESSION['ChildRegsMsg'])){
                echo '<div class="adjust1">' . $_SESSION['ChildRegsMsg'] . '</div>';
                unset($_SESSION['ChildRegsMsg']);
            }
            ?> </div>

  <h3 class="childInfo">Child Information</h3>

<div class="childForm">
    <div class="childName">
      <label class="labelText">Child Name:</label>
      <input type="text" class="childName" name="childName" placeholder="Enter name of a child" required>
    </div>
    
    <div class="alignChildIdNDOB">
      <div class="registerId">
        <label class="labelText">Registration Id:</label>
        <input type="text" class="registrationNum ForJs" name="registrationNum" placeholder="Enter registration Id" value ="<?php echo empty($fetchChildLastId['RegisterId']) ? 11111 : $fetchChildLastId['RegisterId']; ?>" readonly>
      </div>
      <div class="alignDob">
        <label class="labelTextDob">Date of Birth:</label>
        <input type="date" class="dob" name="dob" placeholder="Enter child DOB" required>
      </div>
    </div>
   </div>

  <div class="selectGender">
   <label class="labelText">Gender:</label>
   <div class="alignRadios">
      <input type="radio" id="maleGender" name="gender" value="Male" required>
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

      <label class="labelText">Citizenship No.</label>
        <input type="text" class="citizenNo" name="citizenNo" placeholder="Enter mothers citizenship number" required>

      <div class="parentsPhoneNAdd">
          <div class="parentContact">
            <label class="labelText">Phone:</label>
            <input
              type="text"
              class="contact"
              name="contact"
              pattern="[0-9]{10}( *)"
              placeholder="Enter phone number"
              required
            />
          </div>
          <div class="parentAddress">
            <label class="labelText">Address:</label>
            <input type="text" class="address" name="address" placeholder="Enter parents address" required>
          </div>
      </div>
      </div>
        <div class="parentsAccInfo">
          <div class="parentsUserName">
            <label for="username">Username:</label>
            <input type="text" class="username" name="username" placeholder="Give a username" />
          </div>
          <div class="parentsPassword">
          <label for="password">Password:</label>
        <input type="password" class="password" name="password" placeholder="Create a password" />
          </div>
        </div>

  <button class="registerButton" name="clickRegister" onclick="generateNumericId()">Register</button>

</form>
</div>
<script>
  var idCounter = <?php echo empty($fetchChildLastId['RegisterId']) ? 11111 : $fetchChildLastId['RegisterId']; ?>;
 function generateNumericId() {
    idCounter++; 
    var inputField = document.querySelector('.ForJs');
    inputField.value = idCounter;
    inputField.style.color = 'blue'; 
}
</script>

</body>
</html>
