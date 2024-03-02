<?php
// session_start();
include ("Config.php");
$addVaccineToChildId = $_GET['id'];
if(isset($_POST['saveChildVaccInfo'])){
    //mysqli_real_escape_string stores special characters in the database
    $registerId= mysqli_real_escape_string($conn, $_POST['registerId']);
    $age= mysqli_real_escape_string($conn, $_POST['age']);
    $vaccineName= mysqli_real_escape_string($conn, $_POST['vaccineType']);
    $vaccineDose= mysqli_real_escape_string($conn, $_POST['vaccineDose']);
    $vaccineDate= mysqli_real_escape_string($conn, $_POST['vaccineDate']);
    $adminsteredBy= mysqli_real_escape_string($conn, $_POST['doctorName']);

    $query = "INSERT INTO childvaccine (ID, Age, Name, Dose, Date, Doctor) VALUES ('$registerId', '$age', '$vaccineName', '$vaccineDose', '$vaccineDate','$adminsteredBy')";

    $result= $conn->query($query); //it reflects the actual query from $query into the database
    if($result){
        $_SESSION['successMessage'] = "Vaccine added succssfully !";
        echo '<script>
        setTimeout(function() {
            window.location.href = "ChildTable.php";
        }, 1000);
    </script>';
    }
    else{
        echo "Data not inserted";
    }
}
$conn->close();
?>