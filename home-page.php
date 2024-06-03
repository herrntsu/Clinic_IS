<?php
session_start();
if (isset($_SESSION['username'])) {//redirect
    header("Location: customer-page/welcome-page.php");
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel=stylesheet href="/CLINIC_IS/Styles/home.css">
    <link rel="icon" type="png" href="media/logo-removebg-preview.png">
    <title>Home</title>
</head>

<body>
    <div class="navigation-bar">
        <div class="logo-text">
            <img class="website-logo" src="/CLINIC_IS/media/logo-removebg-preview.png" alt="">
            <h3>AnchorMed</h3>
        </div>

        <div class="user-section">
            <a href="registration-page.php">Sign-up now</a>|
            <a href="login-page.php">Sign-in</a>
        </div>
    </div>

    <section class="hero-section">
        <div class="video-section">
            <div class="vid-with-gradient">
                <video autoplay loop muted plays-inline class="bg-video">
                    <source src="/CLINIC_IS/media/bg-video-loop.mp4">
                </video>
            </div>
            <div class="gradient"></div>
        </div>
        <div class="header">
            <h2>Higher standards of care every day.</h2>
        </div>
    </section>

    <footer>
        <p>Author: Hege Refsnes</p>
        <p><a href="mailto:hege@example.com">hege@example.com</a></p>
    </footer>
</body>

</html>