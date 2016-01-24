<?php include_once("../connect-to-sql.php")?>

<?php
$jobID = $_POST['jobID'];

echo $jobID;

$email = $_SESSION['email'];


$sql = "SELECT jobidgood FROM `user` WHERE email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $likedJobs = $row['jobidgood'];
    }
} else {
    echo "User not found";
}

if(strlen($likedJobs) != 0){
$likedJobs .= ", $jobID";
}
else {
    $likedJobs = $jobID;
}


$sql = "UPDATE user SET jobidgood = '$likedJobs' WHERE email = '$email'";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}






$sql = "SELECT userdetails FROM `jobs` WHERE jobid = '$jobID'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $users = $row['userdetails'];
    }
} else {
    echo "User not found";
}

if(strlen($users) != 0){
    $users .= ", $email";
}
else {
    $users = $email;
}


$sql = "UPDATE jobs SET userdetails = '$users' WHERE jobid = '$jobID'";
echo "<script type='text/javascript'>alert('$sql')</script>";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}
?>