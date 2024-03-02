<?php
   include "Dashboard.php";
   include "../BackendFiles/DynamicVaccName.php";
   include "../BackendFiles/ChildIDForVacc.php";
   include "../BackendFiles/VaccineToChildBack.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Vaccine Information Form</title>
<link rel="stylesheet" href="../Styles/VaccineToChild.css">
</head>
<body>

<div class="container">
    <h2>Vaccine Information Form</h2>
    <div class="msg-show1">
         <?php 
            if(isset($_SESSION['vaccineDetails'])){
                echo '<div class="adjust1">' . $_SESSION['vaccineDetails'] . '</div>';
                unset($_SESSION['vaccineDetails']);
            }
            ?> </div>
    <form action="VaccineToChild.php?id=<?php  echo $childIDForVacc; ?>" method="POST">
        <div class="form-group">
            <label for="age">Registration ID:</label>
            <input type="text" id="age" name="registerId" value="<?php echo isset($fetChildRegId['RegisterId']) ? $fetChildRegId['RegisterId'] : ''; ?>" >

        </div>
        <div class="form-group">
            <label for="age">Age:</label>
            <input type="text" id="age" name="age" required>
        </div>
        <div class="form-group">
            <label for="vaccineName">Vaccine Name:</label>
        <select class="vaccineType" name="vaccineType">
         <?php
         sendToHtml($reflectVaccineQuery);
        ?>
        </select>
        </div>
         <div class="form-group">
      <label for="vaccineDose">Vaccine Dose:</label>
      <select id="vaccineDose" name="vaccineDose" >
         <option value="First Dose">First Dose</option>
         <option value="Second Dose">Second Dose</option>
         <option value="Third Dose">Third Dose</option>
      </select>
   </div>

        <div class="form-group">
            <label for="vaccineDate">Vaccine Date Given:</label>
            <input type="date" id="vaccineDate" name="vaccineDate" required>
        </div>
        <div class="form-group">
            <label for="doctorName">Administered By:</label>
            <input type="text" id="doctorName" name="doctorName" required>
        </div>
        <button type="submit" name="saveChildVaccInfo">Save</button>
    </form>
</div>

</body>
</html>
