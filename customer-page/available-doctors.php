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
                        <a href="#locations">Branches</a>
                        <a href="#footer">Contacts</a>
                        <a href="#">Info</a>
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


    <?php
    // if 
    ?>
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
                echo '<div class="card">';
                // echo '<img src = "" alt = "">' . $row['AccountProfile'] . '</img>';
                echo '<h4> Name: ' . $row['AccountName'] . '</h4>';
                echo '<p> Employee ID: ' . $row['EmployeeID'] . '</p>';
                echo '<p>Specialty: ' . $row['EmployeeSpecialty'] . '</p>';
                echo '<p>Room Number: ' . $row['RoomNumber'] . '</p>';

                // Ensure AccountEmail is echoed inside the anchor tag
                echo '<a href="mailto:' . $row['AccountEmail'] . '"> Request Appointment </a>';

                // Add other fields as needed
                echo '</div>';
            }
        } else {
            echo "No results found.";
        }

        $conn->close();
        ?>

    </div>
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