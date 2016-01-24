<?php include_once "../connect-to-sql.php";?>

<?php
/**
 * Created by PhpStorm.
 * User: ChristianBlandford
 * Date: 1/23/16
 * Time: 9:58 AM
 */
ob_start();
unset($connection);

$email = $_POST['email'];
$name = $_POST['name'];
$password = $_POST['password'];

echo "<p> $email | $password | $name </p>";

$sql = "INSERT INTO company (email, name, password)
    VALUES ('$email', '$name', '$password')";


if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$_SESSION["email"] = $email;
$_SESSION["loggedin"] = true;

header("Location: /org-profile.php");
?>