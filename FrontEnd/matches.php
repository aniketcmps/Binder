<?php include_once("navbar.php") ?>
<?php
/**
 * Created by PhpStorm.
 * User: ChristianBlandford
 * Date: 1/24/16
 * Time: 1:09 AM
 */

$jobid = $_GET['id'];
$email = $_SESSION['email'];
$sql = "SELECT jobidgood FROM `user` WHERE email = '" . $email . "'";
$result = $conn->query($sql);
$jobArray = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {

        $jobs = $row['jobidgood'];
        $jobArray = explode(",", $jobs);

    }
} else {
    echo "User not found 1";
}
$final_companies = array();
foreach ($jobArray as $jobid) {
    //echo $jobid;
    $sql = "SELECT * FROM `jobs` WHERE jobid = " . $jobid;

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {

            if (strpos($row['gooduser'], $email) !== false) {
                array_push($final_companies, $jobid);
            }
        }
    }
}
?>
<div class="container white-text">
    <div class="row">
        <div class="col-lg-5">
            <div class="collection">
                <?php
                foreach ($final_companies as $company) {
                    ?><a href="/matched_job.php?id=<?php echo $company ?>" class="collection-item"><?php echo $company ?></a>
                    <?php
                }
                ?>


            </div>
        </div>
    </div>
</div>
</body>
</html>
