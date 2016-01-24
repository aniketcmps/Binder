<?php include_once("../connect-to-sql.php")?>

<?php

unset($connection);

$email = $_POST['email'];
$password_attempt = $_POST['password'];
$database = $_POST['user_type'];

echo "<h1>$email</h1>";

$sql = "SELECT email, password, fname, lname FROM `user`";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $fname = $row['fname'];
        $lname = $row['lname'];
        $email = $row['email'];
        $password = $row['password'];
        echo "<p>$fname $lname | $email | $password</p>";
    }
} else {
    echo "User not found";
}

$conn->close();

?>