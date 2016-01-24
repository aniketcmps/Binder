<?php include_once "../connect-to-sql.php"; ?>

<?php
/**
 * Created by PhpStorm.
 * User: ChristianBlandford
 * Date: 1/23/16
 * Time: 9:58 AM
 */


unset($connection);
$email = $_POST['email'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$profile_image = $_FILES['profile'];
$password = $_POST['password'];
$file_name = md5($email);


move_uploaded_file( $_FILES['profile']['tmp_name'],  '../profile_pictures/' . $file_name);
echo "<p> $email | $password | $fname | $lname </p>";


$sql = "INSERT INTO user (email, password, fname, lname, picurl)
    VALUES ('$email', '$password', '$fname', '$lname', '$file_name')";


if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$_SESSION["email"] = $email;
$_SESSION["loggedin"] = true;



mysqli_close($conn);

header("Location: /profile.php");
?>