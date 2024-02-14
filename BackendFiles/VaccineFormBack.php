<?php
// session_start();
include ("Config.php");

if(isset($_POST['AddVaccine'])){
    //mysqli_real_escape_string stores special characters in the database
    $vaccineName= mysqli_real_escape_string($conn, $_POST['Vaccine']);
    $dozeNumber= mysqli_real_escape_string($conn, $_POST['Dose']);
    $ageRecommended= mysqli_real_escape_string($conn, $_POST['Recommended']);

    $query = "INSERT INTO addvaccine (Name, Dose, Age) VALUES ('$vaccineName', '$dozeNumber', '$ageRecommended')";

    $result= $conn->query($query); //it reflects the actual query from $query into the database
    if($result){
        $_SESSION['successMessage'] = "Vaccine added succssfully !";
        echo '<script>
        setTimeout(function() {
            window.location.href = "VaccineTable.php";
        }, 1000);
    </script>';
    }
    else{
        echo "Data not inserted";
    }
}
?>