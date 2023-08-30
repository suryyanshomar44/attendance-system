<?php
$username = "root";
$password = "";
$servername = "localhost";
$dbname = "employeedb";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection Failed " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $id = $_POST["id"];

    $sql = "UPDATE employees SET name='$name', email='$email', phone='$phone' WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
        header("Location: attendance.php");
    } else {
        echo "Error: " . $conn->error;
    }

}

?>