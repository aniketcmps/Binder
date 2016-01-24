<?php
/**
 * Created by PhpStorm.
 * User: ChristianBlandford
 * Date: 1/23/16
 * Time: 12:34 AM
 */

ob_start();
session_start();

$servername = "10.135.221.229:3306";
$username = "root";
$password = "Security@18";
$dbname = "hackaz";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>