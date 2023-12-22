<?php

$servername = 'localhost';
$username = 'niel';
$password = 'sadvibes';
$dbname = 'mywebsites';

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error){
    die("Connection fail: " . $conn->connect_error);
}

// echo "Connected succesfully";
    if(empty($_POST['fname'])){
        echo "First Name required";
    }elseif(empty($_POST['lname'])){
        echo "Last Name required";
    }elseif(empty($_POST['email'])){
        echo "Email required";
    }else {
        $fname = val($_POST['fname']);
        $lname = val($_POST['lname']);
        $email = val($_POST['email']);

        $sql = "INSERT INTO users (firstname, lastname, email) VALUES ('$fname', '$lname', '$email')";
$result = $conn->query($sql);

if($result){
    $last_id = $conn->insert_id;
    header('location:newslet.php');
}else {
    echo "Error";
}
    }


// $sql = "INSERT INTO users (firstname, lastname, email) VALUES ('$fname', '$lname', '$email')";
// $result = $conn->query($sql);

// if($result){
//     echo "Record uploaded succesfully";
// }else {
//     echo "Error";
// }

function val($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
$conn->close();
?>

