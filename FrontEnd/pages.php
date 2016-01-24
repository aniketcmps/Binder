<?php include_once("navbar.php"); ?>

<?php

    $jobID = file_get_contents("http://10.135.221.229:8080/HackAz/JobMatch?email=$email");

    $jobarray = explode( ',', $jobID );

    $dynamicCards = "";

if(count($jobarray) == 0 || strlen($jobID) == 0 || $jobID == 0){
    echo "<h1 class='white-text'>No new jobs :(</h1>";
}

else {

    for ($counter = 0; $counter < count($jobarray) - 1; $counter++) {
        $sql = "SELECT `company`, `description`, `requirment`, `experience`, `location`, `minsal`, `maxsal`, `userdetails` FROM jobs WHERE jobid = '$jobarray[$counter]'";
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
        }

        $sql = "SELECT `logo` FROM company WHERE name = '$company'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $imglink = $row['logo'];
            }
        }


        if ($counter % 4 != 0) {
            $dynamicCards .= '
			<div class="col-md-3">
                <!--Image Card-->
                <div class="card hoverable">
                    <div class="card-image">
                        <div class="view overlay hm-white-slight z-depth-1">
                            <img src="/company_images/'. $imglink .'" class="img-responsive product-image" alt="">
                            <a href="job.php?id=' . $jobarray[$counter] . '"><div class="mask waves-effect"></div></a>
                        </div>
                        <span class="card-title success-color">' . $company . '</span>
                    </div>
                    <div class="card-content">
                    	<div class="row">
                    		<div class="col-xs-12">
                    			<h4 class="price">$' . $minsal . '-$' . $maxsal . '</h4>
                    		</div>
                    	</div>
                        <p>' . $description . '</p>
                    </div>
                    <div class="card-action">
                    <div class="row">
                            <div class="col-xs-4 text-left">
                                <a class="btn-floating btn-large waves-effect waves-light red hoverable no-job-button" data-id="'. $jobarray[$counter] .'"><i class="material-icons" >clear</i></a>
                            </div>
                            <div class="col-xs-4 text-right">

                            </div>
                            <div class="col-xs-4 text-right">
                                <a class="btn-floating btn-large waves-effect waves-light green hoverable yes-job-button" data-id="'. $jobarray[$counter] .'"><i class="material-icons">done</i></a>
                            </div>
                        </div>
                       </div>

                </div>
                <!--Image Card-->
            </div>
          ';

        } else {
            $dynamicCards .= '
            </div>
            <div class="row">
			<div class="col-md-3">
                <!--Image Card-->
                <div class="card hoverable">
                    <div class="card-image">
                        <div class="view overlay hm-white-slight z-depth-1">
                            <img src="/company_images/'. $imglink .'" class="img-responsive product-image" alt="">
                            <a href="job.php?id=' . $jobarray[$counter] . '"><div class="mask waves-effect"></div></a>
                        </div>
                        <span class="card-title success-color">' . $company . '</span>
                    </div>
                    <div class="card-content">
                    	<div class="row">
                    		<div class="col-xs-12">
                    			<h4 class="price">$' . $minsal . '-$' . $maxsal . '</h4>
                    		</div>
                    	</div>
                        <p>' . $description . '</p>
                    </div>
                    <div class="card-action">
                    <div class="row">
                            <div class="col-xs-4 text-left">
                                <a class="btn-floating btn-large waves-effect waves-light red hoverable no-job-button" data-id="'. $jobarray[$counter] .'"><i class="material-icons">clear</i></a>
                            </div>
                            <div class="col-xs-4 text-right">

                            </div>
                            <div class="col-xs-4 text-right">
                                <a class="btn-floating btn-large waves-effect waves-light green hoverable yes-job-button" data-id="'. $jobarray[$counter] .'"><i class="material-icons">done</i></a>
                            </div>
                        </div>
                       </div>

                </div>
                <!--Image Card-->
            </div>
          ';

        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">


<body class="blue-grey darken-1">
<div class=" white-text">
    <div class="panel panel-default">
        <div class="panel-body black-text"><h4>Available Jobs:</h4></div>
    </div>
</div>
<div class="job-container animated fadeInUpBig">
    <div class="row">
    <?php echo $dynamicCards ?>
</div>


</body>
</html>
