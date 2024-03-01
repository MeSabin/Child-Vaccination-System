<?php
   include "Dashboard.php";
   include "../BackendFiles/RegisterChild.php";
   include "../BackendFiles/UpdateChildBack.php";
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
    <form id="vaccineForm">
        <div class="form-group">
            <label for="age">Registration ID:</label>
            <input type="number" id="age" name="registerId" value="<?php  echo $arrDatas['RegisterId']; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="age">Age:</label>
            <input type="number" id="age" name="age" required>
        </div>
        <div class="form-group">
            <label for="vaccineName">Vaccine Name:</label>
        <select class="vaccineType" name="vaccineType">
         <?php
         sendToHtml($query);
        ?>
        </select>
        </div>
         <div class="form-group">
      <label for="vaccineDose">Vaccine Dose:</label>
      <select id="vaccineDose" name="vaccineDose" required>
         <option value="">First Dose</option>
         <option value="1">Second Dose</option>
         <option value="2">Third Dose</option>
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
