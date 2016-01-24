<?php include_once("navbar.php") ?>

<?php
$jobID = $_GET['id'];

$emailList = file_get_contents("http://10.135.221.229:8080/HackAz/JobMatch?jobid=$jobID");

$emailArray = explode(',', $emailList);


if (count($emailArray) == 0 || strlen($jobID) == 0 || $jobID == 0){
    echo "<h1 class='white-text'>No new candidates :(</h1>";
}

else {

    $dynamicCards = "";

    for ($counter = 0; $counter < count($emailArray) - 1; $counter++) {
        $sql = "SELECT `fname`, `lname`, `skills`, `picurl` FROM user WHERE email = '$emailArray[$counter]'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $fname = $row['fname'];
                $lname = $row['lname'];
                $skills = $row['skills'];
                $picurl = $row['picurl'];
            }
        }

        if ($counter % 4 != 0) {
            $dynamicCards .= '
			<div class="col-md-3">
                <!--Image Card-->
                <div class="card hoverable">
                    <div class="card-image">
                        <div class="view overlay hm-white-slight z-depth-1">
                            <div class="headshot"><img src="/profile_pictures/' . $picurl . '" class="person-image" alt=""></div>
                            <a href="person.php?email=' . $emailArray[$counter] . '&&id=' . $jobID .'"><div class="mask waves-effect"></div></a>
                        </div>

                    </div>
                    <div class="card-content">
                    <span class="card-title black-text">' . $fname . " " . $lname . '</span>
                    	<div class="row">
                    		<div class="col-xs-12">
                    			<h4 class="skills">' . $skills . '</h4>
                    		</div>
                    	</div>

                    </div>
                    <div class="card-action">
                    <div class="row">
                            <div class="col-xs-4 text-left">
                                <a class="btn-floating btn-large waves-effect waves-light red hoverable no-person-button" data-email="' . $emailArray[$counter] . '" data-jobid="' . $jobID . '"><i class="material-icons" >clear</i></a>
                            </div>
                            <div class="col-xs-4 text-right">

                            </div>
                            <div class="col-xs-4 text-right">
                                <a class="btn-floating btn-large waves-effect waves-light green hoverable yes-person-button" data-email="' . $emailArray[$counter] . '" data-jobid="' . $jobID . '"><i class="material-icons">done</i></a>
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
                            <div class="headshot"><img src="/profile_pictures/' . $picurl . '" class="person-image" alt=""></div>
                            <a href="person.php?email=' . $emailArray[$counter] . '&&id=' . $jobID .'"><div class="mask waves-effect"></div></a>
                        </div>

                    </div>
                    <div class="card-content">
                    <span class="card-title black-text">' . $fname . " " . $lname . '</span>
                    	<div class="row">
                    		<div class="col-xs-12">
                    			<h4 class="skills">' . $skills . '</h4>
                    		</div>
                    	</div>

                    </div>
                    <div class="card-action">
                    <div class="row">
                            <div class="col-xs-4 text-left">
                                <a class="btn-floating btn-large waves-effect waves-light red hoverable no-person-button" data-email="' . $emailArray[$counter] . '" data-jobid="' . $jobID . '"><i class="material-icons" >clear</i></a>
                            </div>
                            <div class="col-xs-4 text-right">

                            </div>
                            <div class="col-xs-4 text-right">
                                <a class="btn-floating btn-large waves-effect waves-light green hoverable yes-person-button" data-email="' . $emailArray[$counter] . '" data-jobid="' . $jobID . '"><i class="material-icons">done</i></a>
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
        <div class="panel-body black-text"><h4>New job candidates:</h4></div>
    </div>
</div>
<div class="job-container animated fadeInUpBig">
    <div class="row">
        <?php echo $dynamicCards ?>
</div>


</body>
</html>

