<?php include_once("../connect-to-sql.php")?>

<?php
$jobID = $_POST['jobID'];

echo $jobID;

$email = $_POST['email'];


$sql = "SELECT gooduser FROM `jobs` WHERE jobid = '$jobID'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $likedPeople = $row['gooduser'];
    }
} else {
    echo "User not found";
}

if(strlen($likedPeople) != 0){
    $likedPeople .= ", $email";
}
else {
    $likedPeople = $email;
}


$sql = "UPDATE jobs SET gooduser = '$likedPeople' WHERE jobid = '$jobID'";
echo "<script type='text/javascript'>alert('$sql')</script>";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

?>