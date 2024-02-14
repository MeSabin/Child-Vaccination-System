<?php

session_start();
include("Config.php");

if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn']) {
    header("Location: Dashboard.php");
}

if (isset($_POST['submit'])) {
    $emailUsername = mysqli_real_escape_string($conn, $_POST['Email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $query = "SELECT * FROM admin WHERE (email ='$emailUsername' OR username ='$emailUsername')" ;
    $result = $conn->query($query);

    if ($result->num_rows == 1) {
        $userData = $result->fetch_assoc();
        $storedPassword = $userData['Password'];

        // if password is in hashed format in database
        if (password_verify($password, $storedPassword)) {
            $_SESSION['isLoggedIn'] = true;
            $token = bin2hex(random_bytes(15));
            $_SESSION['back'] = $userData['username'];
            $_SESSION['profileEmail'] = $userData['Email'];

            $updateQuery = "UPDATE admin SET token = '$token' WHERE Email = '$emailUsername' OR username = '$emailUsername'";
            $queryfire = $conn->query($updateQuery);

            if ($queryfire) {
                if (isset($_POST['remember_me'])){
                    setcookie('emailcookie', $emailUsername, time()+1200000);
                    setcookie('passwordcookie', $password, time()+1200000);

                    
                }
                $_SESSION['success_message']= "Logging in.. Wait for a while";
                    echo '<script>
                setTimeout(function() {
                    window.location.href = "Dashboard.php";
                }, 1400);
            </script>';
                
                }
               else {
                echo "Not inserted";
            }
            // if data is not in hashed format in database
        } elseif ($password === $storedPassword) {
           
            $_SESSION['isLoggedIn'] = true;
            $token = bin2hex(random_bytes(15));
            $_SESSION['back'] = $userData['username'];
            $_SESSION['profileEmail'] = $userData['Email'];
          

            $newHashedPassword=password_hash($storedPassword, PASSWORD_BCRYPT);
            $updateQuery = "UPDATE admin SET token = '$token', Password = '$newHashedPassword' WHERE Email = '$emailUsername' OR username = '$emailUsername'";
            $queryfire = $conn->query($updateQuery);

            if ($queryfire) {
                if (isset($_POST['remember_me'])){
                    setcookie('emailcookie', $emailUsername, time()+1200000);
                    setcookie('passwordcookie', $password, time()+1200000);

                }
                $_SESSION['success_message']= "Loging in.. Wait for a while";
                echo '<script>
            setTimeout(function() {
                window.location.href = "Dashboard.php";
            }, 1400);
        </script>';
               
                } else {
                echo "Not inserted";
            }
        } else {
            $_SESSION['error_message'] = "Invalid Email/Username or Password";
            header("location: Login.php");
            // when exit() not used, error message will not be displayed 
            exit();
        }
        }  else { 
            $_SESSION['error_message'] = "Invalid Email/Username or Password";
            header("Location: Login.php");
            exit();
        }
    }


// Closing the database connection after the login page connection has performed
$conn->close();
?>
