<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "clinic_is";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

// Create database if it does not exist
$sql = "CREATE DATABASE IF NOT EXISTS clinic_is";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}

$conn = new mysqli($servername, $username, $password, $dbname);

// Function to check if a table exists
function tableExists($conn, $table) {
    $result = mysqli_query($conn, "SHOW TABLES LIKE '$table'");
    return $result && mysqli_num_rows($result) > 0;
}

// Create Accounts table if it doesn't exist
if (!tableExists($conn, 'Accounts')) {
    $sql_accounts = "CREATE TABLE Accounts (
        AccountID INT(10) AUTO_INCREMENT PRIMARY KEY,
        AccountName VARCHAR(50) NOT NULL,
        AccountPassword VARCHAR(50) NOT NULL,
        AccountType ENUM('Admin', 'Employee', 'Customer') NOT NULL
    )";
    if ($conn->query($sql_accounts) === TRUE) {
        echo "Table Accounts created successfully";
    } else {
        echo "Error creating table: " . $conn->error;
    }
}

// Create Employee table if it doesn't exist
if (!tableExists($conn, 'Employee')) {
    $sql_employee = "CREATE TABLE Employee (
        EmployeeID INT(10) AUTO_INCREMENT PRIMARY KEY,
        AccountID INT(10),
        FOREIGN KEY (AccountID) REFERENCES Accounts(AccountID) ON DELETE CASCADE
    )";

    if ($conn->query($sql_employee) === TRUE) {
        echo "Table Employee created successfully";
    } else {
        echo "Error creating table: " . $conn->error;
    }
}

// Create Employee_Details table if it doesn't exist
if (!tableExists($conn, 'Employee_Details')) {
    $sql_employeedetails = "CREATE TABLE Employee_Details (
        EmployeeID INT(10) PRIMARY KEY,
        EmployeeSpecialty VARCHAR(100) NOT NULL,
        RoomNumber INT NOT NULL,
        FOREIGN KEY (EmployeeID) REFERENCES Employee(EmployeeID) ON DELETE CASCADE
    )";

    if ($conn->query($sql_employeedetails) === TRUE) {
        echo "Table Employee_Details created successfully";
    } else {
        echo "Error creating table: " . $conn->error;
    }
}

// Create Employee_Availability table if it doesn't exist
if (!tableExists($conn, 'Employee_Availability')) {
    $sql_employeeavailability = "CREATE TABLE Employee_Availability (
        EmployeeID INT(10),
        Date DATE NOT NULL,
        IsPresent BOOLEAN NOT NULL,
        PRIMARY KEY (EmployeeID, Date),
        FOREIGN KEY (EmployeeID) REFERENCES Employee(EmployeeID) ON DELETE CASCADE
    )";

    if ($conn->query($sql_employeeavailability) === TRUE) {
        echo "Table Employee_Availability created successfully";
    } else {
        echo "Error creating table: " . $conn->error;
    }
}

// Create Employee_Schedule table if it doesn't exist
if (!tableExists($conn, 'Employee_Schedule')) {
    $sql_employeeschedule = "CREATE TABLE Employee_Schedule (
        EmployeeID INT(10),
        DayofWeek VARCHAR(100) NOT NULL,
        StartTime TIME NOT NULL,
        EndTime TIME NOT NULL,
        PRIMARY KEY (EmployeeID, DayofWeek),
        FOREIGN KEY (EmployeeID) REFERENCES Employee(EmployeeID) ON DELETE CASCADE
    )";

    if ($conn->query($sql_employeeschedule) === TRUE) {
        echo "Table Employee_Schedule created successfully";
    } else {
        echo "Error creating table: " . $conn->error;
    }
}

// Create Employee_Worked_Minutes table if it doesn't exist
if (!tableExists($conn, 'Employee_Worked_Minutes')) {
    $sql_employeeworkedminutes = "CREATE TABLE Employee_Worked_Minutes (
        EmployeeID INT(10),
        Date DATE NOT NULL,
        WorkedMinutes INT,
        PRIMARY KEY (EmployeeID, Date),
        FOREIGN KEY (EmployeeID) REFERENCES Employee(EmployeeID) ON DELETE CASCADE
    )";

    if ($conn->query($sql_employeeworkedminutes) === TRUE) {
        echo "Table Employee_Worked_Minutes created successfully";
    } else {
        echo "Error creating table: " . $conn->error;
    }
}

// Ensure the Customer table exists before creating Patient_Record table
if (!tableExists($conn, 'Customer')) {
    $sql_customer = "CREATE TABLE Customer (
        CustomerID INT(10) AUTO_INCREMENT PRIMARY KEY,
        CustomerName VARCHAR(50) NOT NULL
    )";
    if ($conn->query($sql_customer) === TRUE) {
        echo "Table Customer created successfully";
    } else {
        echo "Error creating table: " . $conn->error;
    }
}

// Create Patient_Record table if it doesn't exist
if (!tableExists($conn, 'Patient_Record')) {
    $sql_patientrecord = "CREATE TABLE Patient_Record (
        CustomerID INT(10) PRIMARY KEY,
        CustomerRecord VARCHAR(500),
        FOREIGN KEY (CustomerID) REFERENCES Customer(CustomerID) ON DELETE CASCADE
    )";

    if ($conn->query($sql_patientrecord) === TRUE) {
        echo "Table Patient_Record created successfully";
    } else {
        echo "Error creating table: " . $conn->error;
    }
}
?>
