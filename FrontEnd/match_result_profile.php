<?php include_once("navbar.php") ?>

<?php

    $email = $_GET['email'];
    $jobid = $_GET['id'];

$sql = "SELECT `email`, `password`, `fname`, `lname`, `phone`, `skills`, `location`, `summary`, `linkedin`, `portfolio`, `resume`, `salary`, `jobidgood`, `jobidbad`, `picurl`, `education`, `experience` FROM user WHERE email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $fname = $row['fname'];
        $lname = $row['lname'];
        $phone = $row['phone'];
        $skills = $row['skills'];
        $skills = explode(",", $skills);
        $summary = $row['summary'];
        $linkedin = $row['linkedin'];
        $portfolio = $row['portfolio'];
        $resume = $row['resume'];
        $salary = $row['salary'];
        $jobidgood = $row['jobidgood'];
        $jobidbad = $row['jobidbad'];
        $picurl = $row['picurl'];
        $education = $row['education'];
        $experience = $row['experience'];
    }
} else {
    echo "User not found";
}

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>

</head>

<body class="blue-grey darken-1">

<div class="container white-text" style="min-width: 100%; padding-left: 0px; padding-top: 0px;">

    <div class="row">
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">

                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="col-sm-12 text-center">
                            <img src="/profile_pictures/<?php echo $picurl ?>" class="hoverable animated fadeIn"/>
                            <h4 class="black-text"><?php echo $fname . " " . $lname ?></h4>

                        </div>
                    </div>

                </div>

            </div>
            <div class="col-sm-3"></div>

        </div>
    </div>
</div>
<div class="container" style="margin-top: 20px;">
    <div class="row">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><h5>About:</h5></div>

                    <div class="panel-body">
                            <?php echo $summary ?>
                    </div>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading"><h5>Skills:</h5></div>

                    <div class="panel-body"><?php
                        foreach ($skills as $skill) { ?>
                            <p><?php echo $skill ?></p>
                        <?php } ?>
                    </div>

                </div>
            </div>
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading"><h5>Experience:</h5></div>

                    <div class="panel-body">
                        <p><?php echo $experience ?></p>
                    </div>

                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><h5>Education:</h5></div>

                    <div class="panel-body">
                        <p><?php echo $education ?></p>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><h5>Contact information:</h5></div>

                    <div class="panel-body">
                        <p>Phone number: <?php echo $phone ?></p>
                        <p>Email: <a href="mailto:<?php echo $email ?>"><?php echo $email ?></a></p>
                        <p>My portfolio: <?php echo $portfolio ?></p>
                        <p>LinkedIn: <a href="<?php echo $linkedin ?>"><?php echo $linkedin ?></a></p>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
            </div>
        </div>
    </div>
</div>
</body>
</html>
