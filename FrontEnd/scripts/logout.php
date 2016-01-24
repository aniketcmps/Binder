<?php
/**
 * Created by PhpStorm.
 * User: ChristianBlandford
 * Date: 1/23/16
 * Time: 11:45 AM
 */
    session_start();

    unset($_SESSION['loggedin']);
    unset($_SESSION['email']);
    header("Location: /login.php?msg=Logged out successfully");

?>