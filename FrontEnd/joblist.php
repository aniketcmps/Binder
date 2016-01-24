<?php include_once("navbar.php")?>

<?php

$sql = "SELECT `jobid` FROM jobs WHERE company = '$name'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $jobid = $row['jobid'];
        $elements .= '<a href="org-matches.php?id='. $jobid .'" class="collection-item">Job posting ID:'. $jobid .'</a>';
    }
}

?>
<div class="container">
<div class="row">
    <div class="col-lg-3"></div>
    <div class="col-lg-6">
        <h4 class="animated fadeInUpBig">Select a job posting:</h4>
        <div class="collection animated fadeInUpBig">
            <?php echo $elements ?>
        </div>

    </div>
    <div class="col-lg-3"></div>
</div>
    </div>