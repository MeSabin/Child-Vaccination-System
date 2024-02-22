<?php
            // session_start();
            include ("Config.php");

            $ids =$_GET['id'];
            // fetching data to display i.e to show prefilled data in the form in update.php file
            $showquery ="SELECT * from addvaccine where  Id ='$ids'";
            $showdata= $conn->query($showquery);
            $arrData= $showdata->fetch_assoc();
    
            if(isset($_POST['AddVaccine'])){
                //mysqli_real_escape_string stores special characters in the database
                $vaccineName= mysqli_real_escape_string($conn, $_POST['Vaccine']);
                $dozeNumber= mysqli_real_escape_string($conn, $_POST['Dose']);
                $ageRecommended= mysqli_real_escape_string($conn, $_POST['Recommended']);

                $updateQuery = "update addvaccine set Name='$vaccineName', Dose='$dozeNumber', Age='$ageRecommended' WHERE Id=$ids";

                $res= $conn->query($updateQuery); //it reflects the actual query from $query into the database
                if($res){
                    
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
            ?>