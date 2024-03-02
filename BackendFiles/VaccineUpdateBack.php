<?php
            // session_start();
            include ("Config.php");

            $vaccineUpdateId =$_GET['id'];
            // fetching data to display i.e to show prefilled data in the form in update.php file
            $selectVaccUpdId ="SELECT * from addvaccine where  Id ='$vaccineUpdateId'";
            $reflectSelVaccUpdId= $conn->query($selectVaccUpdId);
            $fetchVaccUpdIdData= $reflectSelVaccUpdId->fetch_assoc();
    
            if(isset($_POST['AddVaccine'])){
                //mysqli_real_escape_string stores special characters in the database
                $vaccineName= mysqli_real_escape_string($conn, $_POST['Vaccine']);
                $dozeNumber= mysqli_real_escape_string($conn, $_POST['Dose']);
                $ageRecommended= mysqli_real_escape_string($conn, $_POST['Recommended']);

                $updateVaccineQuery = "update addvaccine set Name='$vaccineName', Dose='$dozeNumber', Age='$ageRecommended' WHERE Id=$vaccineUpdateId";

                $reflectUpdtVaccQur= $conn->query($updateVaccineQuery); //it reflects the actual query from $query into the database
                if($reflectUpdtVaccQur){
                    
                    $_SESSION['Message'] = "Data updated successfully !";
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
            $conn->close();
            ?>