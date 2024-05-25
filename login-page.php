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

$servername = "localhost"; //database server
$username = "root"; //database username
$password = ""; //database password
$database = "clinic_website"; //database name

$con = mysqli_connect($servername, $username, $password, $database);

if (!$con) {
    die("Connection Failed: " . mysqli_connect_error());
} else {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //checks if fields are filled
        if (isset($_POST['email']) && isset($_POST['password'])) {
            //initialize variables for queries and post method
            $em = mysqli_real_escape_string($con, $_POST['email']); //cleans email text
            $pw = mysqli_real_escape_string($con, $_POST['password']); //cleans password text
            $userQuery = "SELECT * FROM users WHERE email = '$em'";
            $result = mysqli_query($con, $userQuery);

            //check if the email exists in the database
            if (mysqli_num_rows($result) > 0) { //check if query has a result
                $passwordResult = mysqli_query($con, $userQuery);
                $row = mysqli_fetch_assoc($passwordResult);
                if (password_verify($pw, $row['passw'])) {
                    //passw is correct
                    header("Location: welcome-page.php");
                } else {
                    //passw is incorrect
                    echo "<script>alert('Incorrect password');</script>";
                }
            } else {
                //email not present in db
                echo "<script>alert('An account with this email doesn\'t exist');</script>";
            }
        }
    }
}
?>