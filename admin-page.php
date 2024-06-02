<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <link rel="icon" type="png" href="media\logo-removebg-preview.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title>Admin</title>
    <script>
            document.addEventListener("DOMContentLoaded", function() {
                var addCustomerModal = document.getElementById("addCustomerModal");
                var addCustomerBtn = document.getElementById("addCustomerBtn");
                var addCustomerSpan = addCustomerModal.querySelector(".close");

                addCustomerBtn.onclick = function() {
                    addCustomerModal.style.display = "block";
                };

                addCustomerSpan.onclick = function() {
                    addCustomerModal.style.display = "none";
                };

                var addDoctorModal = document.getElementById("addDoctorModal");
                var addDoctorBtn = document.getElementById("addDoctorBtn");
                var addDoctorSpan = addDoctorModal.querySelector(".close");

                addDoctorBtn.onclick = function() {
                    addDoctorModal.style.display = "block";
                };

                addDoctorSpan.onclick = function() {
                    addDoctorModal.style.display = "none";
                };

                var editAccModal = document.getElementById("editAccModal");
                var editAccSpan = editAccModal.querySelector(".close");
                var editBtns = document.querySelectorAll(".editBtn");

                for (var i = 0; i < editBtns.length; i++) {
                    editBtns[i].onclick = function() {
                        var accountID = this.getAttribute("data-id");
                        var accountName = this.getAttribute("data-name");
                        var accountType = this.getAttribute("data-type");
                        var accountEmail = this.getAttribute("data-email");
                        var accountUsername = this.getAttribute("data-username");
                        var accountPassword = this.getAttribute("data-password");

                        document.getElementById("editAccountID").value = accountID;
                        document.getElementById("editAccountName").value = accountName;
                        document.getElementById("editAccountType").value = accountType;
                        document.getElementById("editAccountEmail").value = accountEmail;
                        document.getElementById("editAccountUsername").value = accountUsername;
                        document.getElementById("editAccountPassword").value = accountPassword;

                        editAccModal.style.display = "block";
                    }
                }

                editAccSpan.onclick = function() {
                    editAccModal.style.display = "none";
                };

                window.onclick = function(event) {
                    if (event.target == addCustomerModal) {
                        addCustomerModal.style.display = "none";
                    }
                    if (event.target == addDoctorModal) {
                        addDoctorModal.style.display = "none";
                    }
                    if (event.target == editAccModal) {
                        editAccModal.style.display = "none";
                    }
                };

                var delBtns = document.querySelectorAll(".delAccBtn");
                for (var i = 0; i < delBtns.length; i++) {
                    delBtns[i].onclick = function() {
                        var accountID = this.getAttribute("data-id");
                        if (confirm("Are you sure you want to delete this account?")) {
                            var form = document.createElement("form");
                            form.method = "post";
                            form.action = "admin-page.php";
                            
                            var input = document.createElement("input");
                            input.type = "hidden";
                            input.name = "deleteAccountID";
                            input.value = accountID;
                            form.appendChild(input);
                            
                            document.body.appendChild(form);
                            form.submit();
                        }
                    }
                }
            });
</script>


</head>

<body>
    <div class="navigation-bar">
            <div class="logo-text">
                <img class="website-logo" src="media/logo-removebg-preview.png" alt="">
                <h3>AnchorMed</h3>
            </div>

        </div>

    <h1>Admin Page</h1>
    
    <div class = "container">
    <div class = "table-container">
    <h2>All Accounts</h2>
        <table border="1">
            <tr>
                <th>Account ID</th>
                <th>Account Name</th>
                <th>Account Type</th>
                <th>Account Email</th>
                <th>Account Username</th>
                <th>Account Password</th>
                <th>Actions</th>
            </tr>
            <?php
            $con = mysqli_connect("localhost", "root", "", "clinic_website");
            if (!$con) {
                die("Connection Failed: " . mysqli_connect_error());
            }

            $result = getAllAccounts($con);
            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['AccountID'] . "</td>";
                    echo "<td>" . $row['AccountName'] . "</td>";
                    echo "<td>" . $row['AccountType'] . "</td>";
                    echo "<td>" . $row['AccountEmail'] . "</td>";
                    echo "<td>" . $row['AccountUsername'] . "</td>";
                    echo "<td>" . $row['AccountPass'] . "</td>";
                    echo "<td><button class ='editBtn' data-id='" . $row['AccountID'] . "' data-name='" . $row['AccountName'] . "' data-type='" . $row['AccountType'] . "' data-email='" . $row['AccountEmail'] .  "' data-username='" . $row['AccountUsername'] . "' data-password='" . $row['AccountPass'] ."'>Edit</button>
                    <button class='delAccBtn' data-id='" . $row['AccountID'] . "'>Delete</button>
                            </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='7'>No accounts found</td></tr>";
            }

            mysqli_close($con);
            ?>
        </table>
    
    <div class="button-container">
        <button id="addCustomerBtn">Add Customer</button>
        <button id="addDoctorBtn">Add Doctor</button>
    </div>
</div>
</div>
    <!-- Edit Account Modal -->
    <div id="editAccModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Edit Account</h2>
        <form method="post" action="admin-page.php">
            <input type="hidden" name="accountID" id="editAccountID">
            <input type="text" name="accountName" id="editAccountName" placeholder="Account Name" required>
            <input type="hidden" name="accountType" id="editAccountType" placeholder="Account Type" required>
            <input type="email" name="accountEmail" id="editAccountEmail" placeholder="Account Email" required>
            <input type="text" name="accountUsername" id="editAccountUsername" placeholder="Account Username" required>
            <input type="text" name="accountPassword" id="editAccountPassword" placeholder="Account Password" required>
            <input type="submit" name="editAccount" value="Save Changes">
        </form>
    </div>
</div>

    <!-- Add Customer Modal -->
    <div id="addCustomerModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Add Customer</h2>
            <form method="post" action="admin-page.php">
                <input type="text" name="customerName" placeholder="Customer Name" required>
                <input type="email" name="customerEmail" placeholder="Customer Email" required>
                <input type="text" name="customerUsername" placeholder="Customer Username" required>
                <input type="password" name="customerPassword" placeholder="Customer Password" required>
                <input type="submit" name="addCustomer" value="Add Customer">
            </form>
        </div>
    </div>

    <!-- Add Doctor Modal -->
    <div id="addDoctorModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Add Doctor</h2>
            <form method="post" action="admin-page.php">
                <input type="text" name="accountName" placeholder="Account Name" required>
                <input type="text" name="specialty" placeholder="Specialty" required>
                <input type="number" name="roomNumber" placeholder="Room Number" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="text" name="employee_username" placeholder="Username" required>
                <input type="password" name="employee_password" placeholder="Password" required>
                <input type="submit" name="addDoctor" value="Add Doctor">
            </form>
        </div>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $con = mysqli_connect("localhost", "root", "", "clinic_website");
        if (!$con) {
            die("Connection Failed: " . mysqli_connect_error());
        }

        if (isset($_POST['addCustomer'])) {
            $customerName = $_POST['customerName'];
            $customerEmail = $_POST['customerEmail'];
            $customerUsername = $_POST['customerUsername'];
            $customerPassword = $_POST['customerPassword'];
        
            // Insert into Accounts table
            $sql_accounts = "INSERT INTO Accounts (AccountName, AccountType) VALUES ('$customerName', 'customer')";
            if (mysqli_query($con, $sql_accounts)) {
                $accountID = mysqli_insert_id($con);
        
                // Insert into AccData table
                $sql_accdata = "INSERT INTO AccData (AccountID, AccountName, AccountEmail, AccountUsername, AccountPass) VALUES ('$accountID', '$customerName', '$customerEmail', '$customerUsername', '$customerPassword')";
                if (mysqli_query($con, $sql_accdata)) {
                    echo "New customer added successfully";
                } else {
                    echo "Error: " . mysqli_error($con);
                }
            } else {
                echo "Error: " . mysqli_error($con);
            }
        }

        if (isset($_POST['addDoctor'])) {
            $accountName = $_POST['accountName'];
            $specialty = $_POST['specialty'];
            $roomNumber = $_POST['roomNumber'];
            $email = $_POST['email'];
            $employee_username = $_POST['employee_username'];
            $employee_password = $_POST['employee_password'];
            addDoctor($con, $accountName, $specialty, $roomNumber, $email, $employee_username, $employee_password);
        }

        if (isset($_POST['editAccount'])) {
            $accountID = $_POST['accountID'];
            $accountName = $_POST['accountName'];
            $accountType = $_POST['accountType'];
            $accountEmail = $_POST['accountEmail'];  
            $accountUsername = $_POST['accountUsername'];  
            $accountPassword = $_POST['accountPassword'];  
            editAccount($con, $accountID, $accountName, $accountType, $accountEmail, $accountUsername, $accountPassword);
        }

        if (isset($_POST['deleteAccountID'])) {
            $accountID = $_POST['deleteAccountID'];
            deleteAccount($con, $accountID);
        }

        if (isset($_POST['trackHours'])) {
            $employeeID = $_POST['employeeID'];
            trackWorkingHours($con, $employeeID);
        }

         mysqli_close($con);

    }

    

    function getAllAccounts($con) {
        $sql = "SELECT Accounts.AccountID, Accounts.AccountName, Accounts.AccountType, AccData.AccountEmail, AccData.AccountUsername, AccData.AccountPass 
                FROM Accounts 
                INNER JOIN AccData ON Accounts.AccountID = AccData.AccountID";
        $result = mysqli_query($con, $sql);
        return $result;
    }
    
    function addDoctor($con, $accountName, $specialty, $roomNumber, $email, $employee_username, $employee_password) {
        $sql_accounts = "INSERT INTO Accounts (AccountName, AccountType) VALUES ('$accountName', 'employee')";
        if (mysqli_query($con, $sql_accounts)) {
            $accountID = mysqli_insert_id($con);
            $sql_employee = "INSERT INTO Employee (AccountID, AccountName, AccountType) VALUES ('$accountID', '$accountName', 'employee')";
            if (mysqli_query($con, $sql_employee)) {
                $employeeID = mysqli_insert_id($con);
                $sql_employee_details = "INSERT INTO Employee_Details (EmployeeID, EmployeeSpecialty, RoomNumber) VALUES ('$employeeID', '$specialty', '$roomNumber')";
                if (mysqli_query($con, $sql_employee_details)) {
                    $sql_accdata = "INSERT INTO AccData (AccountID, AccountName, AccountEmail, AccountUsername, AccountPass) VALUES ('$accountID', '$accountName', '$email', '$employee_username', '$employee_password')";
                    if (mysqli_query($con, $sql_accdata)) {
                        echo "New doctor added successfully";
                    } else {
                        echo "Error: " . mysqli_error($con);
                    }
                } else {
                    echo "Error: " . mysqli_error($con);
                }
            } else {
                echo "Error: " . mysqli_error($con);
            }
        } else {
            echo "Error: " . mysqli_error($con);
        }
    }

    function deleteAccount($con, $accountID) {
        
        mysqli_begin_transaction($con);
    
        try {
            // Check if the account is associated with an employee
            $sql = "SELECT COUNT(*) AS EmployeeCount FROM Employee WHERE AccountID = $accountID";
            $result = mysqli_query($con, $sql);
            $row = mysqli_fetch_assoc($result);
            $employeeCount = $row['EmployeeCount'];
    
            if ($employeeCount > 0) {
                
                $sql = "DELETE FROM Employee_Details WHERE EmployeeID IN (SELECT EmployeeID FROM Employee WHERE AccountID = $accountID)";
                mysqli_query($con, $sql);
    
                $sql = "DELETE FROM Employee WHERE AccountID = $accountID";
                mysqli_query($con, $sql);
            }
    
            $sql = "DELETE FROM AccData WHERE AccountID = $accountID";
            mysqli_query($con, $sql);
    
            $sql = "DELETE FROM Accounts WHERE AccountID = $accountID";
            mysqli_query($con, $sql);
    
            mysqli_commit($con);
            echo "Account deleted successfully";
        } catch (mysqli_sql_exception $exception) {
            mysqli_rollback($con);
            echo "Error: " . $exception->getMessage();
        }
    }

    function editAccount($con, $accountID, $accountName, $accountType, $accountEmail, $accountUsername, $accountPassword) {
        $sql = "UPDATE Accounts SET AccountName='$accountName', AccountType='$accountType' WHERE AccountID='$accountID'";
        if (mysqli_query($con, $sql)) {
           
            $sql_update_accdata = "UPDATE AccData SET AccountEmail='$accountEmail', AccountUsername='$accountUsername', AccountPass='$accountPassword' WHERE AccountID='$accountID'";
            if (mysqli_query($con, $sql_update_accdata)) {
                echo "Account updated successfully";
            } else {
                echo "Error updating account: " . mysqli_error($con);
            }
        } else {
            echo "Error updating account: " . mysqli_error($con);
        }
    }

    function trackWorkingHours($con, $employeeID) {
        $sql = "SELECT EmployeeID, DayofWeek, TIMEDIFF(EndTime, StartTime) AS HoursWorked 
                FROM Employee_Schedule 
                WHERE EmployeeID = $employeeID";
        $result = mysqli_query($con, $sql);
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                echo "Day: " . $row["DayofWeek"]. " - Hours Worked: " . $row["HoursWorked"]. "<br>";
            }
        } else {
            echo "No records found";
        }
    }

    ?>
</body>

</html>
