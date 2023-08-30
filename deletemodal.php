<?php
$username = "root";
$password = "";
$servername = "localhost";
$dbname = "employeedb";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection Failed " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == 'GET') {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $sql = "SELECT * FROM employees WHERE id = '$id'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();

        ?>




        <div id="myModal2" class="modal1">
            <div class=" modal-contents">
                <p>Are You sure you want to delete
                    <?php echo $row["name"] ?>
                </p>
                <button class="btn btn-primary" onclick="closemodal2()">Cancel</button>
                <a href="delete.php?id=<?php echo $row["id"]; ?>"><button class="btn btn-danger">Ok</button>
                </a>
            </div>
        </div>

        <?php
    }
}
?>