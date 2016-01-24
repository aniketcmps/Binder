<?php include_once "navbar.php" ?>

<?php
$id = $_GET['id'];
$sql = "SELECT `company`, `description`, `requirment`, `experience`, `location`, `minsal`, `maxsal`, `userdetails` FROM jobs WHERE jobid = '$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $company = $row['company'];
        $description = $row['description'];
        $requirement = $row['requirment'];
        $experience = $row['experience'];
        $location = $row['location'];
        $minsal = $row['minsal'];
        $maxsal = $row['maxsal'];
    }
} else {
    echo "User not found";
}

$sql = "SELECT `logo` FROM company WHERE name = '$company'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $imgsrc = $row['logo'];
    }
}

?>

<html>
<body>
<div class="container">
    <div class="row">
        <!-- <div class="product-container blackbox">-->
        <div class="col-lg-1"></div>
        <div class="col-md-4 text-center">
            <!-- <div class="z-depth-1 hoverable waves-effect waves-dark animated fadeInLeft z-depth-1">-->
            <img src="/company_images/<?php echo $imgsrc ?>" class="img-responsive">
            <!--    </div>-->
        </div>

        <div class="col-md-6 text-center" style="margin-top: 50px">
            <!-- <div class="card blue-grey darken-1 hoverable z-depth-1 animated fadeInRight text-left">-->
            <h1><?php echo $company ?></h1>
            <div class="card-action">
                <div class="row">

                </div>

            </div>

            <!-- </div>-->
        </div>
        <div class="col-sm-1"></div>
        <!-- </div>-->
    </div>
    <div class="row">
        <!--  <div class="container container-under animated fadeInUp">-->
        <div class="col-lg-1"></div>
        <div class="col-lg-4">
            <div class="row">
                <div class="panel panel-default hoverable">
                    <div class="panel-heading"><h5>Desired Skills</h5></div>

                    <div class="panel-body">
                        <p><?php echo $experience ?> of <?php echo $requirement ?></p>
                    </div>

                </div>
                <div class="panel panel-default hoverable">
                    <div class="panel-heading"><h5>Salary Range</h5></div>

                    <div class="panel-body">
                        <p>$<?php echo $minsal ?>-$<?php echo $maxsal ?></p>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">

                </div>
            </div>

        </div>

        <div class="col-lg-6">
            <div class="panel panel-default hoverable">
                <div class="panel-heading"><h5>Full Job Description:</h5></div>

                <div class="panel-body">
                    <p><?php echo $description ?><?php echo $description ?><?php echo $description ?><?php echo $description ?><?php echo $description ?><?php echo $description ?><?php echo $description ?><?php echo $description ?></p>
                </div>

            </div>
        </div>
        <div class="col-lg-1"></div>
        <!-- </div>-->
    </div>
</div>
</body>
</html>
