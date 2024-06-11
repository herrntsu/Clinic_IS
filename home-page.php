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
            <a href="registration-page.php">Sign-up</a>|
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
            <button onclick="redirect()">Register Now</button>

        </div>
    </section>
    <footer class="footer">
        <div class="footer-top">
            <div class="footer-column">
                <a href="#" class="link">About Us</a>
                <a href="tel:+63 912 345 6789" class="link">Contact Us: +63 912 345 6789</a>
            </div>
            <div class="footer-column">
                <a href="\Clinic_IS\terms&conditions.php" class="link">Terms & Conditions</a>
                <a href="\Clinic_IS\privacy-policy.php" class="link">Privacy Policy</a>
            </div>
            <div class="footer-column">
                <a href="">FAQs</a>
                <a href="">About the Programmers</a>

            </div>
        </div>
        <div class="footer-bottom">
            <div class="social-icon">
                <a href="https://www.facebook.com/zorah.19" class="fa fa-facebook facebook link"></a>
                <a href="https://x.com/_IUofficial" class="fa fa-twitter twitter link"></a>
                <a href="https://www.instagram.com/pookie_bear_fanpage_/" class="fa fa-instagram instagram link"></a>
                <a href="https://www.linkedin.com" class="fa fa-linkedin linkedin link"></a>
            </div>
            <hr>
            <div class="copy-right">
                <p>&copy; 2024 AnchorMed. All rights reserved.</p>
            </div>
        </div>
    </footer>
    <script>
        function redirect() {
            window.location.href = 'registration-page.php';
        }
    </script>
</body>

</html>