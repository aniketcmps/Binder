<?php include_once("navbar.php") ?>
<?php
/**
 * Created by PhpStorm.
 * User: ChristianBlandford
 * Date: 1/24/16
 * Time: 1:09 AM
 */

$jobid = $_GET['id'];

$sql = "SELECT gooduser FROM `jobs` WHERE jobid = '$jobid'";
$result = $conn->query($sql);

$goodUserArray = array();

if ($result->num_rows > 0) {


    while ($row = $result->fetch_assoc()) {

        $likedPeople = $row['gooduser'];

        $goodUserArray = explode(",", $likedPeople);
    }
} else {
    echo "User not found 1";
}


$userDetailsArray = array();

$sql = "SELECT userdetails FROM `jobs` WHERE jobid = '$jobid'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $users = $row['userdetails'];
        $userDetailsArray = explode(",", $users);
    }
} else {
    echo "User not found 2";
}

$resultArray = array_intersect($goodUserArray, $userDetailsArray);

if (!empty($resultArray)) {
    foreach ($resultArray as $result) {
        $sql = "SELECT * FROM `user` WHERE email = '" . $result ."'";
        $result = $conn->query($sql);
        ?>
        <div class="container white-text">
            <div class="row">
                <div class="col-lg-5">
                    <div class="collection">
                        <?php
                        if ($result->num_rows > 0) {
                            // output data of each row
                            while ($row = $result->fetch_assoc()) {
                                $fname = $row['fname'];
                                $lname = $row['lname'];
                                $email = $row['email'];
                                ?>
                                <a href="/match_result_profile.php?email=<?php echo $email ?>"
                                   class="collection-item"><?php echo $fname . " " . $lname ?></a>
                                <?php
                            }
                        } else {
                            echo "User not found";
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>
        </body>
        </html>
        <?php
    }


}
?>