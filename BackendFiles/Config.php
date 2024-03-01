<?php
$servername="localhost:3307";
$username="root";
$password="";
$db_name="project_db";

//database connection using instance of mysqli class
$conn= new mysqli($servername, $username, $password, $db_name);

//connection checking using connect_error which contains the error code/message
if ($conn->connect_error){
    // terminates/stops the script
    die("Connection failed".$conn->connect_error);
}
?>