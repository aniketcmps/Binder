<?php
ob_start();
$servername = "10.135.221.229:3306";
$db_username = "root";
$db_password = "Security@18";
$db = "hackaz";
// Create connection
$conn = new mysqli($servername, $db_username, $db_password, $db);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connected Successfully \"<br>\"";
}

echo $_SESSION["loggedin"];
if (isset($_POST["email"])) {
    $username = $_POST["email"];
} else {
    $username = null;
    echo "no username supplied";
}

if (isset($_POST["password"])) {
    $password = $_POST["password"];
} else {
    $password = null;
    echo "no username supplied";
}
echo "start";
// Create database


if ($_POST["user_type"] === "user") {
    $sql = "select password from user where email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    /* bind result variables */
    $stmt->bind_result($result);
    $stmt->fetch();

    if ($result) {
        if (strcmp($result, $password) == 0) {
            echo "Login Success";
            session_start();
            $_SESSION["email"] = $username;
            $_SESSION["loggedin"] = true;
            $_SESSION["user_type"] = "user";
            $url = "../profile.php";
        } else {
            $url = "../login.php?msg=Invalid user or password.";
        }
    }
    $stmt->close();
} else {
    echo $username;
    $sql = "select password from company where email = '".$username."'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            if (strcmp($row["password"], $password) == 0)  {
                session_start();
                $_SESSION["email"] = $username;
                $_SESSION["loggedin"] = true;
                $url = "../org-profile.php";
                $_SESSION["user_type"] = "company";

            } else {
                $url = "../login.php?msg=Invalid user or password.";
            }
        }
    } else {
        $url = "../login.php?msg=Invalid user or password.";
    }
}
header("Location: $url");
mysqli_close($conn);

?>