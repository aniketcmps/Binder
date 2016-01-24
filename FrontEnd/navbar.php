<?php include_once("connect-to-sql.php")?>

<?php
session_start();
ob.ob_start();


    //Redirect the user if they are not logged in.
    if(!isset($_SESSION['loggedin']) && basename($_SERVER['PHP_SELF']) != "login.php" && basename($_SERVER['PHP_SELF']) != "index.php" && basename($_SERVER['PHP_SELF']) != "register.php" && basename($_SERVER['PHP_SELF']) != "user-register.php" && basename($_SERVER['PHP_SELF']) != "org-register.php" && basename($_SERVER['PHP_SELF']) != "navbar.php"){
        header("Location: /login.php?msg=You must log in first.");
    }

?>

<?php
    $email = $_SESSION['email'];



    if($_SESSION['user_type'] == 'company'){
        $user_type = "company";
        $sql = "SELECT name FROM company WHERE email = '$email'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $name = $row['name'];
            }
        } else {
            echo "User not found";
        }
    } else {
        $user_type = "user";
        $sql = "SELECT email, fname, lname FROM user WHERE email = '$email'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $fname = $row['fname'];
                $lname = $row['lname'];
            }
        } else {
            echo "User not found";
        }
        $name = $fname . " " . $lname;
    }

    //If the user is logged in then we will build a list of links for the hamburger menu.
    if(isset($_SESSION['loggedin']) && $user_type == "user"){
        $user = "$fname $lname";
        $linklist = '<a href="/pages.php" class="hamb-link"><li class="ham-list-item waves-effect waves-light">New Jobs</li></a>
<a href="/matches.php" class="hamb-link"><li class="ham-list-item waves-effect waves-light">Your Matches</li></a>
<a href="/profile.php" class="hamb-link"><li class="ham-list-item waves-effect waves-light">Your profile</li></a>
<a href="/scripts/logout.php" class="hamb-link"><li class="ham-list-item waves-effect waves-light">Log out</li></a>';

    } else if(isset($_SESSION['loggedin'])){
    $user = "$name";
$linklist = '<a href="/job-postings.php" class="hamb-link"><li class="ham-list-item waves-effect waves-light">New Candidates</li></a>
<a href="/joblist.php" class="hamb-link"><li class="ham-list-item waves-effect waves-light">Your Matches</li></a>
<a href="/org-profile.php" class="hamb-link"><li class="ham-list-item waves-effect waves-light">Your profile</li></a>
<a href="/scripts/logout.php" class="hamb-link"><li class="ham-list-item waves-effect waves-light">Log out</li></a>';

} else {
        $user = "Binder";
        $linklist = '<a href="/login.php" class="hamb-link"><li class="ham-list-item waves-effect waves-light">Log in</li></a>
<a href="user-register.php" class="hamb-link"><li class="ham-list-item waves-effect waves-light">Register a new user</li></a>
<a href="org-register.php" class="hamb-link"><li class="ham-list-item waves-effect waves-light">Register a new organization</li></a>';
    }

?>


<!DOCTYPE html>
<html lang="en">

<!-- JQuery -->
<script type="text/javascript" src="js/jquery.min.js"></script>

<!-- SCRIPTS -->
<script type="text/javascript" src="js/binder.js"></script>

<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="js/bootstrap.min.js"></script>

<!-- Material Design Bootstrap -->
<script type="text/javascript" src="js/mdb.js"></script>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Material Design Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Material Design Bootstrap -->
    <link href="css/mdb.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">

</head>

<body>
<!-- NAV BAR -->
<div class="custom-nav warning-color lighten-1 z-depth-3">
    <div class="row">
        <div class="col-xs-5">
            <!-- Ham menu -->
            <div id="open-ham" class="nav-button waves-effect waves-light thin-100">
                &#9776;
            </div>

            <!-- Company logo -->
            <a class="nav-link waves-effect waves-light thin-100" href="index.php">Binder</a>
        </div>
        <div class="col-xs-7 text-right">
            <a class="nav-link waves-effect waves-light thin-100" href="profile.php" id="nav-name"><?php echo $name?></a>
        </div>

    </div>
</div>
<!-- END OF NAV BAR -->

<!-- HAM MENU -->
<div id="ham-menu" class="animated slideInLeft z-depth-4">
    <div class="ham-logo warning-color z-depth-1">
        <?php echo $user;?>
    </div>

    <div id="close-ham" class="fa fa-bars z-depth-1 waves-effect waves-light"></div>

    <ul id="ham-list">
        <?php echo $linklist;?>
    </ul>
</div>
<!-- END OF HAM MENU -->
</body>

</html>
