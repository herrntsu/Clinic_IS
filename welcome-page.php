<?php
session_start();

if (!isset($_SESSION['username'])) {//redirect
    header("Location: home-page.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap');
    </style>
    <link rel=stylesheet href="welcome.css">
    <link rel="icon" type="png" href="media\logo-removebg-preview.png">
    <title>Home</title>
</head>

<body>
    <div class="navigation-bar">
        <div class="logo-text">
            <img class="website-logo" src="media\logo-removebg-preview.png" alt="">
            <h3>AnchorMed</h3>
        </div>
        <div class="topnav">
            <a class="nav-element" href="login-page.php">Login</a>
            <a class="nav-element" href="student-page.php">Student</a>
            <a class="nav-element" href="faculty-page.php">Faculty</a>
            <div class="dropdown">
                <button class="dropbtn">Admin</button>
                <div class="dropdown-content">
                    <a href="add-student.php">Add a new student</a>
                    <a href="add-faculty.php">Add a new faculty</a>
                    <a href="add-role.php">Add a new role</a>
                    <a href="add-college.php">Add a new college</a>
                    <a href="add-course.php">Add a new course</a>
                </div>
            </div>
        </div>
    </div>
</body>

<section class="hero-section">
    <div class="video-section">
        <div class="vid-with-gradient">
            <video autoplay loop muted plays-inline class="bg-video">
                <source src="media\bg-video-loop.mp4">
            </video>
        </div>
        <div class="gradient">
        </div>
    </div>
    <div class="header">
        <h2>Welcome, <?php echo ($_SESSION['username']); ?></h2>
        <div class="inner-section">
            <p> Start your journey in living good health</p>
            <button>View Doctors</button>
        </div>
    </div>
</section>
<footer>
    <p>Author: Hege Refsnes</p>
    <p><a href="mailto:hege@example.com">hege@example.com</a></p>
</footer>
</body>

</html>