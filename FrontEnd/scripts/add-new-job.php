<?php include_once ('../connect-to-sql.php')?>
<?php
/**
 * Created by PhpStorm.
 * User: ChristianBlandford
 * Date: 1/23/16
 * Time: 8:07 PM
 */

$email = $_SESSION['email'];

$sql = "SELECT `name` FROM company WHERE email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $companyname = $row['name'];
    }
} else {
    echo "User not found";
}

$description = $_POST['description'];
$requirement = $_POST['requirement'];
$experience = $_POST['experience'];
$minsal = $_POST['minsal'];
$maxsal = $_POST['maxsal'];

echo "<p> $email | $description | $requirement | $maxsal </p>";

$sql = "INSERT INTO jobs (`company`, `description`, `requirment`, `experience`, `minsal`, `maxsal`)
    VALUES ('$companyname', '$description', '$requirement', '$experience', '$minsal', '$maxsal')";


if ($conn->query($sql) === TRUE) {
    echo "New record created successfully.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

header("Location: /org-profile.php");