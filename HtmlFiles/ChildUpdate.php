<?php
  include "Dashboard.php";
  include "../BackendFiles/UpdateChildBack.php";
  
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
            if(isset($_SESSION['ChildUpdMsg'])){
                echo '<div class="adjust1">' . $_SESSION['ChildUpdMsg'] . '</div>';
                unset($_SESSION['ChildUpdMsg']);
            }
            ?> </div>
  <h3 class="childInfo">Child Information</h3>

<div class="childForm">
    <div class="childName">
      <label class="labelText">Child Name:</label>
      <input type="text" class="childName" name="childName" placeholder="Enter name of a child" value="<?php echo $getchildData['Name']; ?> " required>
    </div>
  <div class="alignChildIdNDOB">
    <div class="registerId">
      <label class="labelText">Registration Id:</label>
      <input type="text" class="registrationNum" name="registrationNum" placeholder="Enter registration Id" value="<?php echo $getchildData['RegisterId']; ?> " readonly>
    </div>

    <div class="alignDob">
      <label class="labelTextDob">Date of Birth:</label>
      <input type="date" class="dob" name="dob" placeholder="Enter child DOB" value="<?php echo isset($getchildData['DOB']) ? $getchildData['DOB'] : ''; ?>" required>
    </div>
   </div>
  </div>

  <div class="selectGender">
   <label class="labelText">Gender:</label>
   <div class="alignRadios">
      <input type="radio" id="maleGender" name="gender" value="Male" <?php echo isset($getchildData['Gender']) && $getchildData['Gender'] === 'Male' ? 'checked' : ''; ?>>
      <label class="radioGen">Male</label>
      <input type="radio" id="femaleGender" name="gender" value="Female" <?php echo isset($getchildData['Gender']) && $getchildData['Gender'] === 'Female' ? 'checked' : ''; ?>>
      <label class="radioGen">Female</label>
      <input type="radio" id="otherGender" name="gender" value="Others" <?php echo isset($getchildData['Gender']) && $getchildData['Gender'] === 'Others' ? 'checked' : ''; ?>>
      <label class="radioGen">Others</label>
   </div>
  </div>
  <h3 class="parentsInfo">Parent/Guardian Information</h3>
  
<div class="parentForm">
      <div class="fatherName">
        <label class="labelText">Father's Name:</label>
        <input type="text" class="parentName" name="fatherName" placeholder="Enter name of father"value="<?php echo $getchildData['FatherName']; ?> " required>
      </div>
      <div class="motherName">
        <label class="labelText">Mother's Name:</label>
        <input type="text" class="parentName" name="motherName" placeholder="Enter name of mother"value="<?php echo $getchildData['MotherName']; ?> " required>
      </div>
      <div class="parentsPhoneNAdd">
      <div class="parentContact">
        <label class="labelText">Contact Number:</label>
        <input
              type="text"
              class="contact"
              name="contact"
              pattern="[0-9]{10}"
              placeholder="Enter phone number"
              value="<?php echo $getchildData['Phone']; ?> "
              required
            />
      </div>
      <div class="parentAddress">
        <label class="labelText">Address:</label>
        <input type="text" class="address" name="address" placeholder="Enter parents address" value="<?php echo $getchildData['Address']; ?> " required>
      </div>
</div>
</div>
  <button class="registerButton" name="updateChildBtn">Apply Change</button>

</form>
</div>
</body>
</html>
