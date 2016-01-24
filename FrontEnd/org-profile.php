<?php include_once("navbar.php") ?>

<?php

$email = $_SESSION['email'];

$sql = "SELECT `name`, `info`, `location`, logo FROM company WHERE email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $name = $row['name'];
        $info = $row['info'];
        $location = $row['location'];
        $logo = $row['logo'];
    }
} else {
    echo "User not found";
}

$sql = "SELECT `jobid` FROM jobs WHERE company = '$name'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $jobid = $row['jobid'];
        $elements .= '<a href="matched_job.php?id='. $jobid .'" class="collection-item">Job posting ID:'. $jobid .'</a>';
    }
}

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>

</head>

<body class="blue-grey darken-1">

<!-- Modal -->
<div class="modal fade" id="addJob" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add a new job</h4>
            </div>
            <div class="modal-body">
                <form class="col-md-12" id="register-form" action="scripts/add-new-job.php" method="POST">
                    <div class="row">
                        <div class="input-field col-md-12">
                            <input id="description" type="text" class="validate text-black" name="description">
                            <label for="description">Job description</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col-md-12">
                            <input id="requirement" type="text" class="validate text-black" name="requirement">
                            <label for="requirement">Requirement</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col-md-12">
                            <input id="experience" type="text" class="validate text-black" name="experience">
                            <label for="experience">Experience</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col-md-6">
                            <input id="minsal" type="text" class="validate text-black" name="minsal">
                            <label for="minsal">Min salary</label>
                        </div><div class="input-field col-md-6">
                            <input id="maxsal" type="text" class="validate text-black" name="maxsal">
                            <label for="maxsal">Max salary</label>
                        </div>
                    </div>

            </div>
            <div class="card-action text-right">
                <button type="submit" name="submit" class="btn btn-success waves-effect waves-light">Submit</button>
            </div>
            </form>


            </div>
        </div>

    </div>
</div>





<div class="container white-text" style="min-width: 100%; padding-left: 0px; padding-top: 0px;">

    <div class="row">
        <div class="row">
            <div class="col-sm-12 text-center ">
                <img src="/company_images/<?php echo $logo?>"  class="fadeInDownBig"/>
                <h4 class="fadeInDownBig"><?php echo $name ?></h4>
            </div>
        </div>
    </div>


<div class="container" style="min-width: 100%; padding-left: 0px; padding-top: 0px;">
<div class="row">
    <div class="col-lg-6">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default animated fadeInUpBig">
                    <div class="panel-heading"><h5>My information:</h5></div>

                    <div class="panel-body black-text">
                        <p>Email: <a href="mailto:<?php echo $email ?>"><?php echo $email ?></a></p>
                        <p>Location: <?php echo $location ?></p>
                        <p>LinkedIn: <a href="<?php echo $linkedin ?>"><?php echo $linkedin ?></a></p>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <h4 class="animated fadeInUpBig">Current job postings:</h4>
        <div class="collection hoverable animated fadeInUpBig">

            <?php echo $elements ?>
        </div>
        <button type="button" data-toggle="modal" data-target="#addJob" class="btn btn-default waves-effect waves-light animated fadeInUpBig">Add new job listing</button>
    </div>
</div>


</div>
</body>
</html>
