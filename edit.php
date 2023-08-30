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
        <div id="myModal" class="modal1">
            <div class=" modal-contents">
                <span id="close" onclick="closemodal()">&times;</span>
                <h2>Update Employee Registration</h2>
                <form id="myForm" action="update.php" method="post">
                    <input class="inp" type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <label for="name">Name:</label>
                    <input class="inp" type="text" name="name" value="<?php echo $row["name"] ?>" required />
                    <label for="email">Email:</label>
                    <input class="inp" type="email" name="email" value="<?php echo $row["email"] ?>" required />
                    <label for="phone">Phone:</label>
                    <input class="inp" type="text" name="phone" value="<?php echo $row["phone"] ?>" required />
                    <button class="inp" type="submit">Submit</button>
                </form>
            </div>
        </div>
        <?php
    }
}
?>