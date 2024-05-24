<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400" rel="stylesheet">
    <link rel="icon" type="png" href="logo-removebg-preview.png">
    <title>Login</title>
</head>

<body>
    <!-- start of container class -->
    <div class="container">

        <!-- start of form-group -->
        <form action="" method="post" class="form-group">
            <img src="images\logo-removebg-preview.png">

            <div class="form-group">
                <h2>Login to AnchorMed Clinic.</h2>
                <label>E-mail Address:</label>
                <input type="email" name="email" id="user-email" placeholder="E-mail" required />

                <label>Password:</label>
                <input type="password" name="password" class="user-password" placeholder="Password" required>
                <input type="submit" name="submit" class="submit-btn" value="Sign in">
                <p>Don't have an account? <a href="registration-page.php"> Register here.</a> </p>
                <p>By clicking sign in, you are agreeing to the <a class="hyperlink" href="terms&conditions.php">Terms &
                        Conditions</a>
                </p>
            </div>
        </form>

        <!-- end of form-group -->

    </div>
    <!-- end of container class -->


    <div class="center">
    </div>
    <!-- <div class="img1">
        <img src="hand-drawn-doctor-character-in-flat-style-vector.jpg" alt="">
    </div> -->
    <div class="center1">
    </div>
    <!-- start of footer class -->
    <div class="footer">
        <div class="item1"></div>
    </div>
</body>

</html>

<?php
$servername = "localhost"; // your database server
$username = "root"; // your database username
$password = ""; // your database password
$database = "clinic_website"; // your database name

$con = mysqli_connect($servername, $username, $password, $database);

if (!$con) {
    die("Connection Failed: " . mysqli_connect_error());
} else {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $em = mysqli_real_escape_string($con, $_POST['email']);
        $pw = mysqli_real_escape_string($con, $_POST['password']);
    }

    if (!empty($em) && !empty($pw)) {

        //duplicate email checker
        $checkEmailQuery = "SELECT id FROM users WHERE email = '$em'";
        $result = mysqli_query($con, $checkEmailQuery);

        if (mysqli_num_rows($result) == 0) {
            echo "<script>alert('An account with this email doesn't exist.');</script>";
        }
    }
}

// Close the connection
mysqli_close($con);
?>