<?php include_once ('../connect-to-sql.php')?>

<?php
/**
 * Created by PhpStorm.
 * User: ChristianBlandford
 * Date: 1/23/16
 * Time: 9:48 PM
 */


$phone = $_POST['phone'];
$skills = $_POST['skills'];
$location = $_POST['location'];
$summary = $_POST['summary'];
$linkedin = $_POST['linkedin'];
$portfolio = $_POST['portfolio'];
$resume = $_POST['resume'];
$experience = $_POST['experience'];
$education = $_POST['education'];


//This is absolutely horrible code, I'm sorry future self.

$sql = "UPDATE user SET phone = '$phone' WHERE email = '$email'";
if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
}
$sql = "UPDATE user SET skills = '$skills' WHERE email = '$email'";
if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
}
$sql = "UPDATE user SET location = '$location' WHERE email = '$email'";
if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
}
$sql = "UPDATE user SET summary = '$sumary' WHERE email = '$email'";
if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
}
$sql = "UPDATE user SET linkedin = '$linkedin' WHERE email = '$email'";
if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
}
$sql = "UPDATE user SET portfolio = '$portfolio' WHERE email = '$email'";
if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
}
$sql = "UPDATE user SET resume = '$resume' WHERE email = '$email'";
if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
}
$sql = "UPDATE user SET experience = '$experience' WHERE email = '$email'";
if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
}
$sql = "UPDATE user SET education = '$education' WHERE email = '$email'";
if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
}


header("Location: /profile.php");
?>