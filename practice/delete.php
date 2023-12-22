<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mywebsites";

$conn = new mysqli($servername, $username, $password, $dbname);
$message = $_GET['message'];

if(isset($message)){
    if(($message) == 'delete'){
        echo "Deleted Succesfuly! <br> <br>";
    }
}

$sql = "SELECT id, firstname, lastname, email FROM users";
$result = $conn->query($sql);


?>
<table width="300" border="1" cellspacing="1" cellpadding="1">
    <?php
    if($result->num_rows > 0){
        while ($row = $result->fetch_assoc()){
    ?>
    <tr>
        <td>ID</td>
        <td><?php echo $row['id']; ?></td>
        <td><a href="deluser.php?id=<?php echo $row['id']; ?>">Delete</a>
        <a href="update.php?id=<?php echo $row['id']; ?>">Update</a></td>
    </tr>
    <tr>
        <td>FIRST NAME</td>
        <td><?php echo $row['firstname']; ?></td>
        <td></td>
    </tr>
    <tr>
        <td>LAST NAME</td>
        <td><?php echo $row['lastname']; ?></td>
        <td></td>
    </tr>
    <tr>
        <td>EMAIL</td>
        <td><?php echo $row['email']; ?></td>
        <td></td>
    </tr>
    <?php
        }
    ?>

    <?php
    } else {
        echo "Empty Record";
    }
    ?>
</table>