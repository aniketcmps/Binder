<?php include_once("../connect-to-sql.php")?>

<?php
$jobID = $_POST['jobID'];

echo $jobID;

$email = $_SESSION['email'];


$sql = "SELECT jobidbad FROM `user` WHERE email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $dislikedjobs = $row['jobidbad'];
    }
} else {
    echo "User not found";
}

if(strlen($dislikedjobs) != 0){
    $dislikedjobs .= ", $jobID";
}
else {
    $dislikedjobs = $jobID;
}


$sql = "UPDATE user SET jobidbad = '$dislikedjobs' WHERE email = '$email'";
echo "<script type='text/javascript'>alert('$sql')</script>";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

?>