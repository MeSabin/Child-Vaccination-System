<?php
session_start();
include ("Config.php");

if(isset($_POST['AddVaccine'])){
    //mysqli_real_escape_string stores special characters in the database
    $vaccineName= mysqli_real_escape_string($conn, $_POST['Vaccine']);
    $dozeNumber= mysqli_real_escape_string($conn, $_POST['Dose']);
    $ageRecommended= mysqli_real_escape_string($conn, $_POST['Recommended']);

    $query = "INSERT INTO addvaccine (Vaccine_Name, Dose, Recommended_for_child_under) VALUES ('$vaccineName', '$dozeNumber', '$ageRecommended')";

    $result= $conn->query($query); //it reflects the actual query from $query into the database
    if($result){
        $_SESSION['successMessage'] = "Vaccine added succssfully !";
        header("location:VaccineForm.php");
        exit();
    }
    else{
        echo "Data not inserted";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vaccine Crud</title>
    <link rel="stylesheet" href="VaccineForm.css">
</head>
<body>
        
    <div class="main-container">
    <div class="Vaccinetitle">
           <p>Add Vaccine From Here...</p>
           <img src="images/vaccineIcon.svg" alt="Image not found..">
        </div>
        <div class="msg-show1">
         <?php 
            if(isset($_SESSION['successMessage'])){
                echo '<div class="adjust1">' . $_SESSION['successMessage'] . '</div>';
                unset($_SESSION['successMessage']);
            }
            ?> </div>
        <div class="horizontalcont">
        <div class="backgroundimage">
            <img src="images/VaccineBackg.svg" alt="Image is not found..">
        </div>
        
        <div class="vaccineCont">
        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
            <div class="input-box1">
                <p class="name1">Vaccine Name:</p> <input type="" name="Vaccine" class="textbox" placeholder="Enter the name of vaccine" required>
            </div> 
            <div class="dozeOfVaccine">
                <p class="name3">No. of Dose:</p>
                <select name="Dose" class="combobox" required>
                    <option value="1">First Dose</option>
                    <option value="2">Second Dose</option>
                    <option value="3">Third Dose</option>
                </select>
            </div>
            <div class="input-box2 box">
                <p class="name2">Recommended Age:</p><input type="text" name="Recommended" class="textbox" placeholder="Enter the age in week or month" required>
            </div>  
            <button class="btn" name="AddVaccine">Add Vaccine</button>
        
        </form>
        </div>
        </div>
    </div>
</body>
</html>