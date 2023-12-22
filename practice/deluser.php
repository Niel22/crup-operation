<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mywebsites";

$conn = new mysqli($servername, $username, $password, $dbname);

$id = $_GET['id'];

$sql = "DELETE FROM users WHERE id='$id'";
$result = $conn->query($sql);

if($result){
    header('location:delete.php?message=delete');
}else {
    echo "Error deleting record: " . $conn->error;
}
?>