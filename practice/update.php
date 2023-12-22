<?php

$servername = 'localhost';
$username = 'niel';
$password = 'sadvibes';
$dbname = 'mywebsites';

$conn = new mysqli($servername, $username, $password, $dbname);

$id = $_GET['id'];

$sql = "SELECT * FROM users WHERE id='$id'";
$result = $conn->query($sql);

if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        $fname = $row['firstname'];
        $lname = $row['lastname'];
        $email = $row['email'];
    }
}else {
    echo "0 result";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORM</title>
</head>
<body>
    <form action="updateuser.php" method="post">
        First Name: <input type="text" name="fname" value="<?php echo $fname; ?>"><br>
        Last Name: <input type="text" name="lname" value="<?php echo $lname; ?>"><br>
        Email: <input type="email" name="email" value="<?php echo $email; ?>"><br>
        <input type="submit" value="update">
        <input type="hidden" name='id' value="<?php echo $id; ?>">
    </form>
</body>
</html>