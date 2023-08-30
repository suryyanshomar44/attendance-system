<!DOCTYPE html>
<html>

<head>
    <title>Employee Attendance</title>
    <link rel="stylesheet" href="index.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "employeedb";
    $status = "present";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $sql = "SELECT * FROM employees WHERE id = '$id'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        ?>

    <?php }
    ?>

    <?php

    $qury = "SELECT * FROM employees";
    $result = $conn->query($qury);

    if ($result->num_rows > 0) {
        echo "<div style='width:80%; margin-left: 10%; text-align: center;  '><h2>Employee Attendance</h2>";
        echo " <table id='example' class='table table-striped table-bordered' style='margin-top: 50px'>";
        echo "<thead><tr><th scope='col'>Status</th><th scope='col'>Name</th><th scope='col'>Email</th><th scope='col'>Phone</th><th scope='col'>Action</th></tr></thead>";
        while ($row = $result->fetch_assoc()) {
            echo "<tbody><tr>";
            echo "<td>$status</td>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>" . $row["phone"] . "</td>";
            echo "<td> <button  class='btn btn-primary btn-sm'  onclick=\"editEmployee(event," . $row["id"] . ")\">Edit</button>";
            echo " <button  class='btn btn-primary btn-sm' onclick=\"deleteEmployee(event," . $row["id"] . ")\">delete</button> </td>";
            echo "</tr></tbody>";
        }

        echo "</table> ";
        echo "<div style='margin-top: 50px; text-align: center;'><a href='index.php'><button class='btn btn-secondary'>Home</button></a></div> </div>";
    } else {
        echo "No attendance records found.";
    }
    echo "<div id='editContainer'> </div>";
    echo "<div id='deleteContainer'> </div>";

    $conn->close();
    ?>
    <script>
        function closemodal() {
            let modal = document.getElementById("myModal");
            modal.style.display = "none";
        }
        function editEmployee(event, fid) {
            let xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);
                    document.getElementById("editContainer").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", `edit.php?id=${fid}`, true);
            xmlhttp.send();
        }
        function deleteEmployee(event, fid) {
            let xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);
                    document.getElementById("deleteContainer").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", `deletemodal.php?id=${fid}`, true);
            xmlhttp.send();
        }
        function closemodal2(event) {
            let modal2 = document.getElementById("myModal2");
            modal2.style.display = "none";
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
</body>

</html>