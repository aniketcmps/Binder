<?php
header("Access-Control-Allow-Origin: *");
$mysql_host = "10.135.221.229:3306";
$mysql_database = "hackaz";
$mysql_user = "root";
$mysql_password = "Security@18";
// Create connection
$conn = new mysqli($mysql_host, $mysql_user, $mysql_password,$mysql_database);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "SELECT email,password FROM user";
$result = $conn->query($sql);
$outp = "";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "") {$outp .= ",";}
    $outp .= '{"Username":"'  . $rs["email"] . '",';
    $outp .= '"Password":"'   . $rs["password"] . '"}'; 
       
}
$outp ='{ "records":[ '.$outp.' ]}';
$conn->close();
echo($outp);
?>
