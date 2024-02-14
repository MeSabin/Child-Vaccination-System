<?php

session_start();
include("Config.php");

if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn']) {
    header("Location: Dashboard.php");
}

function loginUser($conn, $emailUsername, $password, $rememberMe = false) {
    $query = "SELECT * FROM admin WHERE (email ='$emailUsername' OR username ='$emailUsername')";
    $result = $conn->query($query);

    if ($result->num_rows == 1) {
        $userData = $result->fetch_assoc();
        $storedPassword = $userData['Password'];

        if (password_verify($password, $storedPassword) || $password === $storedPassword) {
            $_SESSION['isLoggedIn'] = true;
            $token = bin2hex(random_bytes(15));
            $_SESSION['back'] = $userData['username'];
            $_SESSION['profileEmail'] = $userData['Email'];

            if ($password === $storedPassword) {
                $newHashedPassword=password_hash($storedPassword, PASSWORD_BCRYPT);
                $updateQuery = "UPDATE admin SET Password = '$newHashedPassword' WHERE Email = '$emailUsername' OR username = '$emailUsername'";
                $queryfire = $conn->query($updateQuery);
                if (!$queryfire) {
                    echo "Not inserted";
                }
            }

            $updateQuery = "UPDATE admin SET token = '$token' WHERE Email = '$emailUsername' OR username = '$emailUsername'";
            $queryfire = $conn->query($updateQuery);

            if ($queryfire) {
                if ($rememberMe) {
                    setcookie('emailcookie', $emailUsername, time()+1200000);
                    setcookie('passwordcookie', $password, time()+1200000);
                }
                $_SESSION['success_message']= "Logging in.. Please wait";
                redirectAfterDelay("Dashboard.php", 1400);
            } else {
                echo "Not inserted";
            }
        } else {
            $_SESSION['error_message'] = "Invalid Email/Username or Password";
            header("location: Login.php");
            exit();
        }
    } else { 
        $_SESSION['error_message'] = "Invalid Email/Username or Password";
        header("Location: Login.php");
        exit();
    }
}

function redirectAfterDelay($url, $delay) {
    echo "<script>setTimeout(function() { window.location.href = '$url'; }, $delay);</script>";
}

if (isset($_POST['submit'])) {
    $emailUsername = mysqli_real_escape_string($conn, $_POST['Email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $rememberMe = isset($_POST['remember_me']);

    loginUser($conn, $emailUsername, $password, $rememberMe);
}

// Closing the database connection after the login page connection has performed
$conn->close();
?>
