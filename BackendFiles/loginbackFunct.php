<?php
session_start();
include("Config.php");

if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn']) {
    header("Location: Dashboard.php");
}

function loginUser($conn, $emailUsername, $password) {
    $loginSelectQuery = "SELECT * FROM admin WHERE (email ='$emailUsername' OR username ='$emailUsername')";
    $relfectLoginSelectQuery = $conn->query($loginSelectQuery);

    if ($relfectLoginSelectQuery->num_rows == 1) {
        $userData = $relfectLoginSelectQuery->fetch_assoc();
        $storedPassword = $userData['Password'];

        if (password_verify($password, $storedPassword) || $password === $storedPassword) {
            $_SESSION['isLoggedIn'] = true;
            $token = bin2hex(random_bytes(15));
            $_SESSION['back'] = $userData['username'];
            $_SESSION['profileEmail'] = $userData['Email'];

            if ($password === $storedPassword) {
                $newHashedPassword=password_hash($storedPassword, PASSWORD_BCRYPT);
                $updateQuery = "UPDATE admin SET token ='$token', Password = '$newHashedPassword' WHERE Email = '$emailUsername' OR username = '$emailUsername'";
                $queryfire = $conn->query($updateQuery);
                if (!$queryfire) {
                    echo "Not inserted";
                }
            }
            if(password_verify($password, $storedPassword) ){
                $updateTokenQuery = "UPDATE admin SET token = '$token' WHERE Email = '$emailUsername' OR username = '$emailUsername'";
                $reflectUpdateTokenQuery = $conn->query($updateTokenQuery);
            }
           
            if ($reflectUpdateTokenQuery) {
                rememberMe($emailUsername, $password);
                $_SESSION['success_message']= "Logging in.. Please wait";
                redirectAfterDelay();
            } else {
                echo "Not inserted";
            }
        } else {
            showErrorMsg();
        }
    } else { 
       showErrorMsg();
    }
}


function redirectAfterDelay() {
    echo '<script>
    setTimeout(function() {
        window.location.href = "Dashboard.php";
    }, 1400);
</script>';
}
function showErrorMsg(){
    $_SESSION['error_message'] = "Invalid Email/Username or Password";
        header("Location: Login.php");
        exit();
}
function rememberMe($emailUsername, $password){
    if (isset($_POST['remember_me'])) {
        setcookie('emailcookie', $emailUsername, time()+1200000);
        setcookie('passwordcookie', $password, time()+1200000);
    }
}

if (isset($_POST['submit'])) {
    $emailUsername = mysqli_real_escape_string($conn, $_POST['Email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    loginUser($conn, $emailUsername, $password);
}
// Closing the database connection after the login page connection has performed
$conn->close();
?>
