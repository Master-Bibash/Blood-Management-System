<?php
$servername = "localhost";
$uname = "root";
$pass = "";
$db = "bin";

$conn = mysqli_connect($servername, $uname, $pass, $db);

if (!$conn) {
    die("Connection Failed");
}

$sql = "SELECT * FROM donor WHERE available = 'Yes'";
$query = $conn->query($sql);

echo "<h1>" . $query->num_rows . "</h1>";
?>
