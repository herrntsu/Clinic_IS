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
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel=stylesheet href="/CLINIC_IS/Styles/welcome.css">
    <link rel="icon" type="png" href="/CLINIC_IS/media/logo-removebg-preview.png">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap');
    </style>
    <link rel="stylesheet" href="/CLINIC_IS/Styles/utility.min.css">
    <title>Welcome to AnchorMed</title>
</head>

<body>
    <div class="navigation-bar">
        <div class="logo-text">
            <img class="website-logo" src="/CLINIC_IS/media/logo-removebg-preview.png" alt="">
            <h3>AnchorMed</h3>
        </div>
        <div class="user-side">
            <div class="dropdown">
                <button class="dropbtn">Clinics <span class="material-symbols-outlined">arrow_drop_down</span></button>
                <div class="dropdown-content">
                    <a href="#locations">Branches</a>
                    <a href="#">Contacts</a>
                    <a href="#">Info</a>
                </div>
            </div>
            <div class="dropdown">
                <button class="dropbtn">Doctors<span class="material-symbols-outlined">arrow_drop_down</span></button>
                <div class="dropdown-content">
                    <a href="#">View Doctors</a>
                </div>
            </div>
            <button class="dropbtn">Book Appointment</button>
            <button class="dropbtn">Donate</button>
            <div class="dropdown">
                <button class="profile-btn">
                    <span class="material-symbols-outlined">account_circle</span>
                </button>
                <div class="dropdown-content">
                    <a href="/CLINIC_IS/account-page.php">Account</a>
                    <a href="/CLINIC_IS/logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <section class="hero-section">
        <div class="video-section">
            <div class="vid-with-gradient">
                <video autoplay loop muted plays-inline class="bg-video">
                    <source src="/CLINIC_IS/media/bg-video-loop.mp4">
                </video>
            </div>
            <div class="gradient">

            </div>
        </div>
        <div class="header">
            <h2>Welcome, <?php echo ($_SESSION['username']); ?></h2>
            <div class="inner-section">
                <p> Start your journey in living a good health</p>
                <button onclick="scrollFunction()">Learn how</button>
            </div>

        </div>
    </section>
    <div class="info">
        <img class="img1" src="/CLINIC_IS/media/doctor-with-patient.jpg" alt="">
        <div class="info-wrapper">
            <h1>Start your healing journey now.</h1>
            <p>At AnchorMed, we prioritize both expert medical care and patient-centered service. Our dedicated team of
                healthcare professionals is committed to providing comprehensive and compassionate care for all your
                health needs. From routine check-ups
                to specialized treatments, we are here to support you every step of the way. Schedule an appointment
                today and experience the highest standard of medical care in a welcoming and supportive environment.</p>
        </div>
        <div class="info-wrapper">
            <h1>
                World-class care for global patients
            </h1>
            <p>We make it easy for patients around the world to get care from AnchorMed</p>
        </div>
        <img class="img1" src="/CLINIC_IS/media/world-class-care.avif" alt="">

    </div>
    <div id="locations" class="location-header">
        <hr>
        <h1> Branches </h1>

        <div class="wrapper">
            <div class="box">
                <p> SM Trece </p>
                <img class="img1" src="/CLINIC_IS/media/SM-TRECE-MARTIRES.jpg" alt="" class="location-one-img">
                <a
                    href="https://www.google.com/maps/place/SM+City+Trece+Martires/@14.2815268,120.8632611,17.17z/data=!4m6!3m5!1s0x33bd813bfbee1f1d:0xbb55deff518446ca!8m2!3d14.281569!4d120.8659103!16s%2Fg%2F11bxd8cb4h?entry=ttu">
                    Check Directions ></a>
            </div>
            <div class="box">
                <p> Robinsons Antipolo </p>
                <img class="img2" src="/CLINIC_IS/media/rob-antipolo.jpg" alt="" class="location-one-img">
                <a
                    href="https://www.google.com/maps/place/Robinsons+Antipolo,+Brgy+Sumulong+Hwy,+Antipolo,+1870+Metro+Manila/@14.5953122,121.1725881,17z/data=!4m6!3m5!1s0x3397bf4d3c34fb97:0xa4addd730b3e7214!8m2!3d14.594579!4d121.1722829!16s%2Fg%2F11s8m6j5pk?entry=ttu">
                    Check Directions ></a>
            </div>
            <div class="box">
                <p> General Trias M-Hub </p>
                <img class="img1" src="/CLINIC_IS/media/mhub.png" alt="" class="location-one-img">
                <a
                    href="https://www.google.com/maps/place/1928+10th+Ave,+Taguig,+Metro+Manila/@14.5603903,121.0538097,18.5z/data=!4m19!1m12!4m11!1m3!2m2!1d121.050854!2d14.5460964!1m6!1m2!1s0x3397c8f3fa2994af:0x89c988af4760e40a!2sBonifacio+Global+City,+Taguig,+Metro+Manila!2m2!1d121.0503183!2d14.5408671!3m5!1s0x3397c85fc0d8128d:0x97d0450b97af3bcc!8m2!3d14.5599984!4d121.0551872!16s%2Fg%2F11gjt0bj_j?entry=ttu">
                    Check Directions ></a>
            </div>
            <div class="box">
                <p> Locations </p>
                <img class="img1" src="/CLINIC_IS/media/SM-TRECE-MARTIRES.jpg" alt="" class="location-one-img">
                <a
                    href="https://www.google.com/maps/place/SM+City+Trece+Martires/@14.2815268,120.8632611,17.17z/data=!4m6!3m5!1s0x33bd813bfbee1f1d:0xbb55deff518446ca!8m2!3d14.281569!4d120.8659103!16s%2Fg%2F11bxd8cb4h?entry=ttu">
                    Check Directions ></a>
            </div>
        </div>
    </div>
    <footer class="container-fluid">
        <div class="footer-header color-white flex justify-space-between align-items-center gap-10">
            <div class="footer-img flex justify-space-between">
                <img class="website-logo" src="/CLINIC_IS/media/logo-removebg-preview.png" alt="">
            </div>
            <div class="footer-body color-white flex justify-space-between align-items-center">
                <div class="site-map flex">
                    <div class="company flex flex-column gap-3">
                        <h6 class="font-bold">Company</h6>
                        <a href="#" class="link">About Us</a>
                        <a href="#" class="link">Contact Us</a>
                        <a href="#" class="link">Careers</a>
                        <a href="#" class="link">Press</a>
                    </div>
                    <div class="support flex flex-column gap-3">
                        <h6 class="font-bold">Support</h6>
                        <a href="mailto:moovemberdev@gmail.com" class="link">support@anchormed.com</a>
                        <a href="tel:" class="link">+1 800-123-4567</a>
                    </div>
                </div>
            </div>
            <div class="footer-footer color-white flex justify-space-between ">
                <div class="social-media flex gap-10">
                    <a href="#" class="link">Facebook</a>
                    <a href="#" class="link">Twitter</a>
                    <a href="#" class="link">Instagram</a>
                    <a href="#" class="link">Youtube</a>
                </div>
                <div class="copy-right">
                    <p>&copy; 2024 AnchorMed. All rights reserved.</p>
                </div>
            </div>
    </footer>
    </script>

    <button onclick="topFunction()" class="pageReset" id="backToTopBtn" title="Go to top"><span
            class="material-symbols-outlined">
            stat_1
        </span></button>

    <script>
        let backToTopBtn = document.getElementById("backToTopBtn");
        window.onscroll = function () {
            scrollFunction();
        };

        function scrollFunction() {
            if (document.body.scrollTop > 600 || document.documentElement.scrollTop > 600) {//display button at what partt
                backToTopBtn.style.display = "block";
            } else {
                backToTopBtn.style.display = "none";
            }
        }
        function topFunction() {
            document.documentElement.scrollTop = 0;
        }

    </script>
</body>

</html>