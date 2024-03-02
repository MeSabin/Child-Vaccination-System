<?php
// session_start();
include("Config.php");

$ids = $_GET['id'];
// fetching data to display i.e to show prefilled data in the form in VaccineToChild.php file
$showquery = "SELECT * from ChildList where  RegisterId ='$ids'";
$showdata = $conn->query($showquery);
$arrDatas = $showdata->fetch_assoc();

//future code for vaccine details
// function fetchChildDetails($id) {
//     if($showdata->num_rows>0){

//     }
// }

// Fetch all vaccine names for the select field
// $getVaccineQuery = "SELECT Distinct VaccineName FROM ChildList ";
// $query = $conn->query($getVaccineQuery);

// Function to generate HTML options for the vaccine name select field
// function sendToHtml($query, $selectedVaccineName) {
//     if ($query->num_rows > 0) {
//         while ($row = $query->fetch_assoc()) {
//             $selected = ($row["VaccineName"] == $selectedVaccineName) ? 'selected' : '';
//             echo '<option value="' . $row["VaccineName"] . '" ' . $selected . '>' . $row["VaccineName"] . '</option>';
//         }
//     } else {
//         echo '<option value="">No Vaccine available</option>';
//     }
// }

if (isset($_POST['updateChildBtn'])) {
    $registerId = mysqli_real_escape_string($conn, $_POST['registrationNum']);
    $childName = mysqli_real_escape_string($conn, $_POST['childName']);
    $childDob = mysqli_real_escape_string($conn, $_POST['dob']);
    // $childAge = mysqli_real_escape_string($conn, $_POST['childAge']);
    $childGender = mysqli_real_escape_string($conn, $_POST['gender']);
    $fatherName = mysqli_real_escape_string($conn, $_POST['fatherName']);
    $motherName = mysqli_real_escape_string($conn, $_POST['motherName']);
    $phone = mysqli_real_escape_string($conn, $_POST['contact']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    // $vaccineType = mysqli_real_escape_string($conn, $_POST['vaccineType']);
    // $vaccineDose = mysqli_real_escape_string($conn, $_POST['vaccineDose']);
    // $vaccineDate = mysqli_real_escape_string($conn, $_POST['vaccineDate']);
    // $doctorName = mysqli_real_escape_string($conn, $_POST['doctorName']);
    

    $updateQuery = "UPDATE ChildList set Name='$childName', DOB='$childDob', Gender='$childGender', FatherName='$fatherName', MotherName='$motherName', Phone='$phone', Address='$address' WHERE RegisterId=$ids";

    $res = $conn->query($updateQuery); //it reflects the actual query from $query into the database
    if ($res) {
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
