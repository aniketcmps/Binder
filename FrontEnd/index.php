<?php
    session_start();

    if($_SESSION['loggedin'] == true && $_SESSION['user_type'] == "user"){
       $url = "/pages.php";
    }

    else if($_SESSION['loggedin'] == true && $_SESSION['user_type'] == "company") {
        $url = "/job-postings.php";
    }

    else {
       $url = "/login.php";
    }

    header("Location: $url");

