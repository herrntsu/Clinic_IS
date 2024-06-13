<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: /CLINIC_IS/home-page.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
    <link rel="stylesheet" href="/CLINIC_IS/Styles/welcome.css">
    <link rel="icon" type="image/png" href="/CLINIC_IS/media/logo-removebg-preview.png">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script defer src="app.js"></script>
    <title>Welcome to AnchorMed</title>
</head>

<body>
    <section>
        <div class="navigation-bar">
            <div class="logo-text">
                <img class="website-logo" src="/CLINIC_IS/media/logo-removebg-preview.png" alt="Logo">
                <a href="/CLINIC_IS/customer-page/welcome-page.php">AnchorMed</a>
            </div>
            <div class="user-side">
                <button class="dropbtn solo" onclick="redirectToHome()"> Home</button>
                <div class="dropdown">
                    <button class="dropbtn">Clinics <span
                            class="material-symbols-outlined">arrow_drop_down</span></button>
                    <div class="dropdown-content">
                        <a href="#locations">Branches</a>
                        <a href="#footer">Contacts</a>
                    </div>
                </div>
                <div class="dropdown">
                    <button class="dropbtn">Doctors <span
                            class="material-symbols-outlined">arrow_drop_down</span></button>
                    <div class="dropdown-content">
                        <a href="available-doctors.php">View Doctors</a>
                    </div>
                </div>
                <button class="dropbtn solo" onclick="redirectToDonate()">Donate</button>
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
    </section>
    <section class="hero-section" id="hero-section">
        <div class="video-section">
            <div class="vid-with-gradient">
                <video autoplay loop muted plays-inline class="bg-video">
                    <source src="/CLINIC_IS/media/bg-video-loop.mp4" type="video/mp4">
                </video>
            </div>
            <div class="gradient"></div>
        </div>
        <div class="header">
            <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?></h2>
            <div class="inner-section">
                <p>Start your journey in living a good health</p>
                <button onclick="scrollFunctionInfo()">Learn how</button>
            </div>
        </div>
    </section>

    <section class="info-section" id="info">
        <div class="info">
            <img class="img1" src="/CLINIC_IS/media/doctor-with-patient.jpg" alt="Doctor with patient">
            <div class="info-wrapper">
                <h1>Start your healing journey now.</h1>
                <p>At AnchorMed, we prioritize both expert medical care and patient-centered service. Our dedicated team
                    of healthcare professionals is committed to providing comprehensive and compassionate care for all
                    your health needs. From routine check-ups to specialized treatments, we are here to support you
                    every
                    step of the way. Schedule an appointment today and experience the highest standard of medical care
                    in
                    a welcoming and supportive environment.</p>
            </div>
            <div class="info-wrapper">
                <h1>World-class care for global patients</h1>
                <p>We make it easy for patients around the world to get care from AnchorMed</p>
                <button onclick="redirectToDoctors()">Request Appointment</button>
            </div>
            <img class="img2" src="/CLINIC_IS/media/world-class-care.avif" alt="World class care">
        </div>
    </section>

    <div id="locations" class="location-header">
        <hr>
        <h1>Branches</h1>
        <div class="wrapper">
            <div class="box">
                <p>SM Trece</p>
                <img class="img1" src="/CLINIC_IS/media/SM-TRECE-MARTIRES.jpg" alt="SM Trece Martires">
                <a
                    href="https://www.google.com/maps/place/SM+City+Trece+Martires/@14.2815268,120.8632611,17.17z/data=!4m6!3m5!1s0x33bd813bfbee1f1d:0xbb55deff518446ca!8m2!3d14.281569!4d120.8659103!16s%2Fg%2F11bxd8cb4h?entry=ttu">
                    Check Directions ></a>
            </div>
            <div class="box">
                <p>Robinsons Antipolo</p>
                <img class="img2" src="/CLINIC_IS/media/rob-antipolo.jpg" alt="Robinsons Antipolo">
                <a
                    href="https://www.google.com/maps/place/Robinsons+Antipolo,+Brgy+Sumulong+Hwy,+Antipolo,+1870+Metro+Manila/@14.5953122,121.1725881,17z/data=!4m6!3m5!1s0x3397bf4d3c34fb97:0xa4addd730b3e7214!8m2!3d14.594579!4d121.1722829!16s%2Fg%2F11s8m6j5pk?entry=ttu">
                    Check Directions ></a>
            </div>
            <div class="box">
                <p>General Trias M-Hub</p>
                <img class="img1" src="/CLINIC_IS/media/mhub.png" alt="General Trias M-Hub">
                <a
                    href="https://www.google.com/maps/place/1928+10th+Ave,+Taguig,+Metro+Manila/@14.5603903,121.0538097,18.5z/data=!4m19!1m12!4m11!1m3!2m2!1d121.050854!2d14.5460964!1m6!1m2!1s0x3397c8f3fa2994af:0x89c988af4760e40a!2sBonifacio+Global+City,+Taguig,+Metro+Manila!2m2!1d121.0503183!2d14.5408671!3m5!1s0x3397c85fc0d8128d:0x97d0450b97af3bcc!8m2!3d14.5599984!4d121.0551872!16s%2Fg%2F11gjt0bj_j?entry=ttu">
                    Check Directions ></a>
            </div>
            <div class="box">
                <p>District Mall Imus by Ayala Malls</p>
                <img class="img1" src="/CLINIC_IS/media/district-mall.png" alt="District Mall Imus by Ayala Malls">
                <a
                    href="https://www.google.com/maps/place/The+District+Imus+by+Ayala+Malls/@14.3807524,120.9480511,14.17z/data=!4m15!1m8!3m7!1s0x32559173e462e30f:0x9befb54ef959f073!2sMarawi+City,+Lanao+del+Sur!3b1!8m2!3d8.0106213!4d124.297718!16zL20vMDNrOWNi!3m5!1s0x3397d37faef3495b:0x2271700d622a3f58!8m2!3d14.3706045!4d120.939236!16s%2Fg%2F11f405bsr5?entry=ttu">
                    Check Directions ></a>
            </div>
        </div>
    </div>
    <footer class="footer" id="footer">
        <div class="footer-top">
            <div class="footer-column">
                <a href="#" class="link ">About Us</a>
                <a href="tel:+63 912 345 6789" class="link">Contact Us: +63 912 345 6789</a>
            </div>
            <div class="footer-column">
                <a href="\Clinic_IS\terms&conditions.php" class="link">Terms & Conditions</a>
                <a href="\Clinic_IS\privacy-policy.php" class="link">Privacy Policy</a>
            </div>
            <div class="footer-column">
                <a href="\Clinic_IS\privacy-policy.php" class="link">FAQs</a>
                <a href="\Clinic_IS\privacy-policy.php" class="link">Support: <a
                        href="mailto:anchormed@support.com">anchormed@support.com</a></a>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="divider social-media">
                <a href="https://www.facebook.com/zorah.19" class="fa fa-facebook link"></a>
                <a href="https://x.com/_IUofficial" class="fa fa-twitter link"></a>
                <a href="https://www.instagram.com/pookie_bear_fanpage_/" class="fa fa-instagram link"></a>
                <a href="https://www.linkedin.com" class="fa fa-linkedin link"></a>
            </div>
            <hr>
            <div class="copy-right">
                <p>&copy; 2024 AnchorMed. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <button onclick="topFunction()" class="pageReset" id="backToTopBtn" title="Go to top">
        <span class="material-symbols-outlined">stat_1</span>
    </button>

    <script>
        let backToTopBtn = document.getElementById("backToTopBtn");
        window.onscroll = function () {
            scrollFunction();
        };

        function scrollFunction() {
            if (document.body.scrollTop > 600 || document.documentElement.scrollTop > 600) {
                backToTopBtn.style.display = "block";
            } else {
                backToTopBtn.style.display = "none";
            }
        }

        function topFunction() {
            document.documentElement.scrollTop = 0;
        }

        function scrollFunctionInfo() {
            const element = document.getElementById("info");
            element.scrollIntoView();
        }
        function redirectToDonate() {
            window.location.href = "/CLINIC_IS/customer-page/donation-page.php";
        }

        function redirectToDoctors() {
            window.location.href = "/CLINIC_IS/customer-page/available-doctors.php"
        }

        function redirectToHome() {
            const element = document.getElementById("hero-section");
            element.scrollIntoView();
        }
    </script>
</body>

</html>