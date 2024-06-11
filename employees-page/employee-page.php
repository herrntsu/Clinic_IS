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
        body {
            font-family: 'Playfair Display', serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .navigation-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            background-color: #f4f4f4;
            border-bottom: 1px solid #ddd;
        }
        .navigation-bar .logo-text {
            display: flex;
            align-items: center;
        }
        .navigation-bar .website-logo {
            height: 50px;
            margin-right: 10px;
        }
        .navigation-bar .user-section a {
            margin-left: 10px;
            text-decoration: none;
            color: #333;
        }
        .employee-section {
            padding: 20px;
        }
        .employee-info {
            margin-bottom: 20px;
        }
        .employee-info p {
            font-size: 18px;
            color: #555;
        }
        .employee-dashboard {
            display: flex;
            justify-content: space-between;
        }
        .employee-dashboard .section {
            width: 48%;
        }
        .employee-dashboard .section h3 {
            font-size: 24px;
            color: #333;
            border-bottom: 2px solid #ddd;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .employee-dashboard .section ul {
            list-style-type: none;
            padding: 0;
        }
        .employee-dashboard .section ul li {
            background-color: #f9f9f9;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        footer {
            text-align: center;
            padding: 20px;
            background-color: #f4f4f4;
            border-top: 1px solid #ddd;
        }
    </style>
    <link rel=stylesheet href="/CLINIC_IS/Styles/home.css">
    <link rel="icon" type="png" href="media/logo-removebg-preview.png">
    <title>Employee Page</title>
</head>

<body>
    <div class="navigation-bar">
        <div class="logo-text">
            <img class="website-logo" src="/CLINIC_IS/media/logo-removebg-preview.png" alt="">
            <h3>AnchorMed</h3>
        </div>

        <div class="user-section">
            <a href="registration-page.php">Sign-up now</a>|
            <a href="login-page.php">Sign-in</a>|
            <a href="employee-page.php">Employee Dashboard</a>|
            <a href="logout.php">Logout</a>
        </div>
    </div>

    <section class="employee-section">
        <h2>Employee Dashboard</h2>
        <div class="employee-info">
            <p>Welcome, [Employee Name]</p>
        </div>
        <div class="employee-dashboard">
            <div class="section">
                <h3>Schedule</h3>
                <ul>
                    <li>Monday: 9:00 AM - 5:00 PM</li>
                    <li>Tuesday: 9:00 AM - 5:00 PM</li>
                    <li>Wednesday: 9:00 AM - 5:00 PM</li>
                    <li>Thursday: 9:00 AM - 5:00 PM</li>
                    <li>Friday: 9:00 AM - 5:00 PM</li>
                </ul>
                <a href="view-schedule.php">View Full Schedule</a>
            </div>
            <div class="section">
                <h3>Tasks</h3>
                <ul>
                    <li>Task 1: Complete patient reports</li>
                    <li>Task 2: Update medical records</li>
                    <li>Task 3: Attend team meeting</li>
                </ul>
                <a href="update-info.php">Update Tasks</a>
            </div>
        </div>
    </section>

    <footer>
        <p>Author: Hege Refsnes</p>
        <p><a href="mailto:hege@example.com">hege@example.com</a></p>
    </footer>
</body>

</html>
