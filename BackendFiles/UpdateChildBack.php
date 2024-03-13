<?php
// session_start();
include("Config.php");
include "FetchRegisterId.php";
$updateChildId = $_GET['id'];
// fetching data to display i.e to show prefilled data in the form in VaccineToChild.php file
$childDataPrefilled = "SELECT * from ChildList where  RegisterId ='$updateChildId'";
$reflectChildDataPre = $conn->query($childDataPrefilled);
$getchildData = $reflectChildDataPre->fetch_assoc();

if (!$getchildData || $updateChildId > $fetchChildLastId) {
    include "../HtmlFiles/404NotFound.php"; 
    exit();
}

if (isset($_POST['updateChildBtn'])) {
    $registerId = mysqli_real_escape_string($conn, $_POST['registrationNum']);
    $childName = mysqli_real_escape_string($conn, $_POST['childName']);
    $childDob = mysqli_real_escape_string($conn, $_POST['dob']);
    $childGender = mysqli_real_escape_string($conn, $_POST['gender']);
    $fatherName = mysqli_real_escape_string($conn, $_POST['fatherName']);
    $motherName = mysqli_real_escape_string($conn, $_POST['motherName']);
    $phone = mysqli_real_escape_string($conn, $_POST['contact']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $updateChildData = "UPDATE ChildList set Name='$childName', DOB='$childDob', Gender='$childGender', FatherName='$fatherName', MotherName='$motherName', Phone='$phone', Address='$address' WHERE RegisterId=$updateChildId";

    $reflectUpdateChildData = $conn->query($updateChildData); //it reflects the actual query from $query into the database
    if ($reflectUpdateChildData) {
        $_SESSION['ChildUpdMsg'] = "Child Data updated successfully !";
        echo '<script>
                    setTimeout(function() {
                        window.location.href = "ChildTable.php";
                    }, 1200);
                </script>';
    } else {
        echo "Data not inserted";
    }
}

$conn->close();
?>
