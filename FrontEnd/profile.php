<?php include_once("navbar.php") ?>

<?php

if (strcmp($_GET['view'],"company") == 0) {
    $email = $_GET['email'];

} else {

    $email = $_SESSION['email'];
}
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
            <div class="col-sm-12 text-center">
                <img src="/profile_pictures/<?php echo $picurl ?>" id="profile-picture"/>
                <h4 class="">Hello, <?php echo $fname . " " . $lname ?>!</h4>
            </div>
        </div>
    </div>
</div>
<div class="container" style="margin-top: 20px;">
    <div class="row">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><h5>About me:</h5></div>

                    <div class="panel-body">
                        <I><b>"</b>
                            <?php echo $summary ?>
                            <b>"</b></I>
                    </div>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading"><h5>My skills:</h5></div>

                    <div class="panel-body"><?php
                        foreach ($skills as $skill) { ?>
                            <p><?php echo $skill ?></p>
                        <?php } ?>
                    </div>

                </div>
            </div>
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading"><h5>My experience:</h5></div>

                    <div class="panel-body">
                        <p><?php echo $experience ?></p>
                    </div>

                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><h5>My education:</h5></div>

                    <div class="panel-body">
                        <p><?php echo $education ?></p>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><h5>My contact information:</h5></div>

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
                <div class="panel panel-default">
                    <div class="panel-heading"><h5>Disliked Jobs:</h5></div>

                    <div class="panel-body">
                        <p>ID: <?php echo $jobidbad ?></p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
