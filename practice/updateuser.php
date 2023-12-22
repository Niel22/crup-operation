<?php

$servername = 'localhost';
$username = 'niel';
$password = 'sadvibes';
$dbname = 'mywebsites';

$conn = new mysqli($servername, $username, $password, $dbname);

$fname = val($_POST['fname']);
$lname = val($_POST['lname']);
$email = val($_POST['email']);
$id = val($_POST['id']);

$sql = "UPDATE users SET firstname='$fname', lastname='$lname', email='$email' WHERE id='$id'";
$result = $conn->query($sql);

if($result){
    header("location:delete.php");
}else {
    echo "Error updating Records";
}

function val($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}