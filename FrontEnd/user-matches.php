<?php include_once("navbar.php") ?>
<?php

$job_id = $_GET["id"];
echo $job_id;

$sql = "SELECT * FROM `user` WHERE jobidgood LIKE '%$job_id%'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>

</head>

<body class="blue-grey darken-1">

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
                        <a href="/profile.php?view=company&email=<?php echo $email ?>"
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
