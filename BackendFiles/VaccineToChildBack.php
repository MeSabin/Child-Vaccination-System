<?php
// session_start();
include ("Config.php");
if(isset($_POST['saveChildVaccInfo'])){
    //mysqli_real_escape_string stores special characters in the database
    $registerId= mysqli_real_escape_string($conn, $_POST['registerId']);
    $age= mysqli_real_escape_string($conn, $_POST['age']);
    $vaccineName= mysqli_real_escape_string($conn, $_POST['vaccineType']);
    $vaccineDose= mysqli_real_escape_string($conn, $_POST['vaccineDose']);
    $vaccineDate= mysqli_real_escape_string($conn, $_POST['vaccineDate']);
    $adminsteredBy= mysqli_real_escape_string($conn, $_POST['doctorName']);

    $insertChildVaccQur = "INSERT INTO childvaccine (ID, Age, Name, Dose, Date, Doctor) VALUES ('$registerId', '$age', '$vaccineName', '$vaccineDose', '$vaccineDate','$adminsteredBy')";

    $refInsChildVaccQur= $conn->query($insertChildVaccQur); //it reflects the actual query from $query into the database
    if($refInsChildVaccQur){
        $_SESSION['vaccineDetails'] = "Data has been added Successfully !";
        echo '<script>
        setTimeout(function() {
            window.location.href = "ChildTable.php";
        }, 1200);
    </script>';
    }
    else{
        echo "Data not inserted";
    }
}
$conn->close();
?>