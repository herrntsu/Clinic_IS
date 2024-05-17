<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
</head>
<link rel="stylesheet" href="style.css">
<link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400" rel="stylesheet">
<link rel="icon" type="png" href="logo-removebg-preview.png">

<body>
    <div class="container">
        <form action="" method="post" class="form-group">


            <div class="form-group">
                <img src="logo.jpg">
                <h2>Create an Account.</h2>
                <label>Full Name:</label>
                <input type="text" name="fullname" id="full-name" placeholder="Full Name" required />
                <label>Email Address:</label>
                <input type="email" name="email" class="form-control" placeholder="E-mail" required />
                <label>Password:</label>
                <input type="password" name="user-password-reg" class="user-password-reg" placeholder="Password"
                    required>
                <label>Confirm Password:</label>
                <input type="password" name="user-cpassword-reg" class="user-cpassword-reg"
                    placeholder="Confirm password" required>
                <input type="submit" name="submit" class="submit-btn" value="Sign in">
                <p>Already have an account? <a class="hyperlink" href="login-page.php">Login here</a>.</p>
                <p>By creating an account, you are agreeing to the <a class="hyperlink"
                        href="terms&conditions.php">Terms & Conditions</a>
                </p>
            </div>
        </form>
    </div>


    <div class="center-reg1">
    </div>
    <!-- <div class="img1">
        <img src="hand-drawn-doctor-character-in-flat-style-vector.jpg" alt="">
    </div> -->
    <div class="center-reg2">
    </div>
    <!-- start of footer class -->
    <div class="footer">
        <div class="item1"></div>
    </div>
</body>
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
        $funame = mysqli_real_escape_string($con, $_POST['fullname']);
        $em = mysqli_real_escape_string($con, $_POST['email']);
        $pw = mysqli_real_escape_string($con, $_POST['user-password-reg']);
        $cpw = mysqli_real_escape_string($con, $_POST['user-cpassword-reg']);

        if (!empty($funame) && !empty($em) && !empty($pw) && !empty($cpw)) {
            if ($pw === $cpw) {
                //duplicate email checker
                $checkEmailQuery = "SELECT id FROM users WHERE email = '$em'";
                $result = mysqli_query($con, $checkEmailQuery);

                if (mysqli_num_rows($result) > 0) {
                    echo "<script>alert('An account with this email already exists.');</script>";
                } else {
                    // Insert query without using prepared statements
                    $sql = "INSERT INTO users (fullname, email, passw) VALUES ('$funame', '$em', '$pw')";

                    if (mysqli_query($con, $sql)) {
                        echo "<script>alert('Registration successful.');</script>";
                    } else {
                        echo "Error: " . mysqli_error($con);
                    }
                }
            } else {
                echo "<script> alert('Passwords does not match.') </script>";
            }
        } else {
        }
    }
}

// Close the connection
mysqli_close($con);
?>