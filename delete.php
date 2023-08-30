<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "employeedb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection Failed" . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET["id"];

    $sql = "DELETE FROM employees WHERE id = '$id'";
    if ($conn->query($sql) === TRUE) {
        header("Location: attendance.php");
    } else {
        echo "Error: " . $conn->error;
    }
}
$conn->close();
?>