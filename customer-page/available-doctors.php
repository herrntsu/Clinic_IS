<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/CLINIC_IS/Styles/available-doctors.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
    <link rel="icon" type="image/png" href="/CLINIC_IS/media/logo-removebg-preview.png">

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Available Doctors</title>
</head>

<body>
    <section>
        <div class="navigation-bar">
            <div onclick="redirecttoHome()" class="logo-text">
                <img class="website-logo" src="/CLINIC_IS/media/logo-removebg-preview.png" alt="Logo">
                <a href="/CLINIC_IS/customer-page/welcome-page.php">AnchorMed</a>
            </div>
            <div class="user-side">
                <button onclick="redirecttoHome()" class="dropbtn solo">Home</button>
                <div class="dropdown">
                    <button class="dropbtn">Clinics <span
                            class="material-symbols-outlined">arrow_drop_down</span></button>
                    <div class="dropdown-content">
                        <a href="/CLINIC_IS/customer-page/welcome-page.php#locations">Branches</a>
                        <a href="/CLINIC_IS/customer-page/welcome-page.php#footer">Contacts</a>
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
    <div class="header" data-aos="fade-left" data-aos-duration="800">
        <h1>Meet Our Professionals</h1>
    </div>
    <div class="wrapper">
        <?php
        // Database connection
        $servername = "localhost"; //database server
        $username = "root"; //database username
        $password = ""; //database password
        $database = "clinic_website"; //database name
        
        $conn = mysqli_connect($servername, $username, $password, $database);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM accounts
            JOIN employee ON accounts.AccountID = employee.AccountID 
            JOIN employee_details ON employee.EmployeeID = employee_details.EmployeeID
            JOIN accdata ON accounts.AccountID = accdata.AccountID;";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="card" data-aos="flip-right" data-aos-duration="500">';
                echo '<img src = "\Clinic_IS\employeePicture\Dr. Lance.jpg" alt = ""></img>';
                echo '<h4> Name: Dr. ' . $row['AccountName'] . '</h4>';
                echo '<p>Specialty: ' . $row['EmployeeSpecialty'] . '</p>';
                echo '<p>Room Number: ' . $row['RoomNumber'] . '</p>';

                // Ensure AccountEmail is echoed inside the anchor tag
                echo '<a href="mailto:' . $row['AccountEmail'] . '"> Request Appointment </a>';

                // Add other fields as needed
                echo '</div>';
            }
        } else {
            echo "No Available Employee.";
        }

        $conn->close();
        ?>

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

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>
<script>
    function redirecttoHome() {
        window.location.href = "/CLINIC_IS/customer-page/welcome-page.php";
    }
    function redirectToDonate() {
        window.location.href = "/CLINIC_IS/customer-page/donation-page.php";
    }
</script>