<?php
$servername = "10.135.221.229:3306";
$db_username = "root";
$db_password = "Security@18";
$db = "hackaz";
// Create connection
$conn = new mysqli($servername, $db_username, $db_password, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    // echo "Connected Successfully \"<br>\"";
}
$username = "pbsureja@gmail.com";
$password = "bhovanbhai";

$sql = "INSERT INTO `user`(`email`, `password`) VALUES (?,?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $username, $password);
$result = $stmt->execute();
print_r($result);
if ($result) {
    echo "Insert Success";
    exit;
}
echo $conn->error;
echo "Error";
mysqli_close($conn);
?>