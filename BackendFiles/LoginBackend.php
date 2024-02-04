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

        if (password_verify($password, $storedPassword)) {
            // User authentication successful
            $_SESSION['isLoggedIn'] = true;
            $token = bin2hex(random_bytes(15));
            $_SESSION['back'] = $userData['username'];

            $updateQuery = "UPDATE admin SET token = '$token' WHERE email = '$emailUsername' OR username = '$emailUsername'";
            $queryfire = $conn->query($updateQuery);

            if ($queryfire) {
                header("location: Dashboard.php");
                exit();
            } else {
                echo "Not inserted";
            }
        } elseif ($password === $storedPassword) {
           
            $_SESSION['isLoggedIn'] = true;
            $token = bin2hex(random_bytes(15));
            $_SESSION['back'] = $userData['username'];

            $newHashedPassword=password_hash($storedPassword, PASSWORD_BCRYPT);
            $updateQuery = "UPDATE admin SET token = '$token', Password = '$newHashedPassword' WHERE email = '$emailUsername' OR username = '$emailUsername'";
            $queryfire = $conn->query($updateQuery);

            if ($queryfire) {
                header("location: Dashboard.php");
                exit();
            } else {
                echo "Not inserted";
            }
        } else {
            // Invalid password
            $_SESSION['error_message'] = "Invalid Email/Username or Password";
            header("location: Login.php");
            exit();
        }
        } else {
            // Invalid password
            $_SESSION['error_message'] = "Invalid Email/Username or Password";
            header("location: Login.php");
            exit();
        }
    }


// Closing the database connection after the login page connection has performed
$conn->close();
?>
