<?php include_once("../connect-to-sql.php")?>

<?php
$jobID = $_POST['jobID'];

echo $jobID;

$email = $_POST['email'];


$sql = "SELECT baduser FROM `jobs` WHERE jobid = '$jobID'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $dislikedPeople = $row['baduser'];
    }
} else {
    echo "User not found";
}

if(strlen($dislikedPeople) != 0){
    $dislikedPeople .= ", $email";
}
else {
    $dislikedPeople = $email;
}


$sql = "UPDATE jobs SET baduser = '$dislikedPeople' WHERE jobid = '$jobID'";
echo "<script type='text/javascript'>alert('$sql')</script>";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

?>