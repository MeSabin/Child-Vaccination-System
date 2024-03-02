<?php
include "Dashboard.php";
include "../BackendFiles/VaccineUpdateBack.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vaccine Crud</title>
    <link rel="stylesheet" href="../Styles/VaccineForm.css">
</head>
<body>
        
    <div class="main-container">
    <div class="Vaccinetitle">
           <p>Add Vaccine From Here...</p>
           <img src="../images/vaccineIcon.svg" alt="Image not found..">
        </div>
        
        <div class="horizontalcont">
        <div class="backgroundimage">
            <img src="../images/VaccineBackg.svg" alt="Image is not found..">
        </div>
        
        <div class="vaccineCont">
        <div class="msg-show1">
         <?php 
            if(isset($_SESSION['Message'])){
                echo '<div class="adjust1">' . $_SESSION['Message'] . '</div>';
                unset($_SESSION['Message']);
            }
            ?> </div>
        <form action="" method="POST">

            <div class="input-box1">
          
                <p class="name1">Vaccine Name:</p> <input type="" name="Vaccine" class="textbox" placeholder="Enter the name of vaccine" value="<?php echo $fetchVaccUpdIdData['Name']; ?> "  required>
            </div> 
            <div class="dozeOfVaccine">
    <p class="name3">No. of Dose:</p>
    <select name="Dose" class="combobox" required>
        //when dose value is 1 in database, 1 is stored to value ie. value="1" and similarly for other 2 option tag
        //echo either outputs selected or '' selected is html attribute here to select corresponding option 
        <option value="1" <?php echo ($fetchVaccUpdIdData['Dose'] == '1') ? 'selected' : ''; ?>>One</option>
        <option value="2" <?php echo ($fetchVaccUpdIdData['Dose'] == '2') ? 'selected' : ''; ?>>Two</option>
        <option value="3" <?php echo ($fetchVaccUpdIdData['Dose'] == '3') ? 'selected' : ''; ?>>Three</option>
    </select>
</div>

            <div class="input-box2 box">
                <p class="name2">Recommended Age:</p><input type="text" name="Recommended" class="textbox" placeholder="Enter the age in week or month" value="<?php echo $fetchVaccUpdIdData['Age']; ?> "  required>
            </div>  
            <button class="btn anotherbtn" name="AddVaccine" >Apply Change</button>
        
        
        </form>
        </div>
        </div>
    </div>
</body>
</html>