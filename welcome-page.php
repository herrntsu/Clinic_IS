<?php
session_start();
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
            <a class="active" href="welcome-page.php">HOME</a>
            <a href="contact.html">CONTACT</a>
            <a href="about.html">Profile</a>

        </div>
    </div>

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
                <p>(Here are the lists of doctors) //placeholder</p>
                <button>View Doctors</button>
            </div>
        </div>
    </section>
    <section class="about">
    </section>
</body>

</html>