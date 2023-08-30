<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "employeedb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection Failed" . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $qury = "INSERT INTO employees (name, email, phone) VALUES ('$name', '$email', '$phone')";
    if ($conn->query($qury) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $conn->error;
    }

}
$conn->close();
?>