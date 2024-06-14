<?php
include('../Database/database.php'); // Ensure the correct path

// Handle update patient information
if (isset($_POST['update'])) {
    $id = $_POST['CustomerID'];
    $record = $_POST['CustomerRecord'];

    $updateQuery = "UPDATE Patient_Record SET CustomerRecord='$record' WHERE CustomerID='$id'";
    if (mysqli_query($conn, $updateQuery)) {
        echo "<script>alert('Patient information updated successfully.');</script>";
    } else {
        echo "<script>alert('Error updating patient information: " . mysqli_error($conn) . "');</script>";
    }
}

// Fetch patient data
$patientQuery = "SELECT C.CustomerID, C.CustomerName, PR.CustomerRecord 
                 FROM Customer C 
                 LEFT JOIN Patient_Record PR ON C.CustomerID = PR.CustomerID";
$patientResult = mysqli_query($conn, $patientQuery);

// Fetch schedule data
$scheduleQuery = "SELECT * FROM Employee_Schedule";
$scheduleResult = mysqli_query($conn, $scheduleQuery);
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
    <link rel=stylesheet href="../Styles/home.css">
    <link rel="icon" type="image/png" href="../media/logo-removebg-preview.png">
    <title>Employee Dashboard</title>
    <style>
        body {
            font-family: 'Raleway', sans-serif;
        }
        .container {
            padding: 20px;
        }
        .card {
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            margin-bottom: 20px;
            padding: 20px;
        }
        .card h2 {
            margin-top: 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        .update-form {
            display: flex;
            flex-direction: column;
        }
        .update-form input, .update-form button {
            margin-bottom: 10px;
        }
        .update-form button {
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        .update-form button:hover {
            background-color: #45a049;
        }
        h1 {
            font-family: 'Playfair Display', serif;
            font-size: 3em;
            margin-bottom: 20px;
            text-align: center;
            color: #333;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <div class="navigation-bar">
        <div class="logo-text">
            <img class="website-logo" src="../media/logo-removebg-preview.png" alt="">
            <a href="../home-page.php">AnchorMed</a>
        </div>

        <div class="user-section">
            <a href="../logout.php">Logout</a>
        </div>
    </div>

    <div class="container">
        <h1>Employee Dashboard</h1>

        <div class="card">
            <h2>Patient Information</h2>
            <?php if ($patientResult && mysqli_num_rows($patientResult) > 0): ?>
                <?php while ($row = mysqli_fetch_assoc($patientResult)): ?>
                    <form class="update-form" method="POST" action="employee-page.php">
                        <input type="hidden" name="CustomerID" value="<?= $row['CustomerID'] ?>">
                        <label for="CustomerRecord">Customer Record</label>
                        <input type="text" name="CustomerRecord" value="<?= $row['CustomerRecord'] ?>">
                        <button type="submit" name="update">Update</button>
                    </form>
                <?php endwhile; ?>
            <?php else: ?>
                <p>No patient records found</p>
            <?php endif; ?>
        </div>

        <div class="card">
            <h2>Schedules</h2>
            <?php if ($scheduleResult && mysqli_num_rows($scheduleResult) > 0): ?>
                <table>
                    <thead>
                        <tr>
                            <th>Employee ID</th>
                            <th>Day of Week</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($scheduleResult)): ?>
                            <tr>
                                <td><?= $row['EmployeeID'] ?></td>
                                <td><?= $row['DayofWeek'] ?></td>
                                <td><?= $row['StartTime'] ?></td>
                                <td><?= $row['EndTime'] ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>No schedules found</p>
            <?php endif; ?>
        </div>
    </div>

    <footer class="footer">
        <div class="footer-top">
            <div class="footer-column">
                <a href="#" class="link">About Us</a>
                <a href="tel:+63 912 345 6789" class="link">Contact Us: +63 912 345 6789</a>
            </div>
            <div class="footer-column">
                <a href="../terms&conditions.php" class="link">Terms & Conditions</a>
                <a href="../privacy-policy.php" class="link">Privacy Policy</a>
            </div>
            <div class="footer-column">
                <a href="#">FAQs</a>
                <a href="../privacy-policy.php" class="link">Support: <a href="mailto:anchormed@support.com">anchormed@support.com</a></a>
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
</body>
</html>
