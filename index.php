<!DOCTYPE html>
<html>

<head>
    <title>Employee Attendance</title>
    <link rel="stylesheet" href="index.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    <h2>Employee Registration</h2>

    <div class="form-container">
        <form action="submitAttendance.php" method="post">
            <div class="form-column">
                <label for="name">Name:</label>
                <input type="text" name="name" placeholder="name" required />
                <label for="email">Email:</label>
                <input type="email" name="email" placeholder="email" required />
                <label for="Phone">Phone:</label>
                <input type="text" name="phone" placeholder="phone" required />
                <input type="submit" value="submit" />
            </div>
        </form>
    </div>
    <div style="text-align: center; margin-top: 70px">
        <a href="attendance.php" style="text-decoration: none;"><button class="btn btn-danger">Show
                Attendance</button></a>

    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>

</body>

</html>