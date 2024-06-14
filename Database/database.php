<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "clinic_website";

$con = mysqli_connect($servername, $username, $password, $database);
if (!$con) {
    die("Connection Failed: " . mysqli_connect_error());
} else {
    echo "Connected successfully";
    /* $sql = "CREATE DATABASE clinic_website";
    if (mysqli_query($con, $sql)) {
        echo "Database created successfully with the name Clinic_IS";
    } else {
        echo "Error creating database: " . mysqli_error($con);
    }*/
    $sql_acc = "CREATE TABLE Accounts (
        AccountID INT(10) AUTO_INCREMENT PRIMARY KEY,
        AccountName VARCHAR(100) NOT NULL,
        AccountType VARCHAR(50) NOT NULL,
        UNIQUE (AccountName, AccountType)
    )";

    // Create AccData table
    $sql_accdata = "CREATE TABLE AccData (
        AccountID INT(10) PRIMARY KEY,
        AccountEmail VARCHAR(100) NOT NULL,
        AccountUsername VARCHAR(100) NOT NULL,
        AccountPass VARCHAR(100) NOT NULL,
        FOREIGN KEY (AccountID) REFERENCES Accounts (AccountID)
    )";


    if (mysqli_query($con, $sql_acc) && mysqli_query($con, $sql_accdata)) {
        echo "Tables for Accounts and AccData successfully created <br>";
    } else {
        echo "Error creating table: " . mysqli_error($con);
    }

    // Create Admins table
    $sql_admin = "CREATE TABLE Admins  (
        AdminID INT(10) AUTO_INCREMENT PRIMARY KEY,
        AccountID INT(10),
        FOREIGN KEY (AccountID) REFERENCES Accounts(AccountID) ON DELETE CASCADE
    )";

    // Create Employee table
    $sql_employee = "CREATE TABLE Employee  (
        EmployeeID INT(10) AUTO_INCREMENT PRIMARY KEY,
        AccountID INT(10),
        FOREIGN KEY (AccountID) REFERENCES Accounts(AccountID) ON DELETE CASCADE
    )";

    // Create Customer table
    $sql_customer = "CREATE TABLE Customer  (
        CustomerID INT(10) AUTO_INCREMENT PRIMARY KEY,
        AccountID INT(10),
        FOREIGN KEY (AccountID) REFERENCES Accounts(AccountID) ON DELETE CASCADE
    )";

    if (mysqli_query($con, $sql_admin) && mysqli_query($con, $sql_employee) && mysqli_query($con, $sql_customer)) {
        echo "Tables for Admins, Employee, and Customer successfully created<br>";
    } else {
        echo "Error creating table: " . mysqli_error($con);
    }

    // Create Employee_Details table
    $sql_employeedetails = "CREATE TABLE Employee_Details  (
        EmployeeID INT(10) PRIMARY KEY,
        EmployeeSpecialty VARCHAR(100) NOT NULL,
        RoomNumber INT NOT NULL,
        EmployeePicture BLOB,
        FOREIGN KEY (EmployeeID) REFERENCES Employee(EmployeeID) ON DELETE CASCADE
    )";

    // Create Employee_Availability table
    $sql_employeeavailability = "CREATE TABLE Employee_Availability  (
        EmployeeID INT(10),
        Date DATE NOT NULL,
        IsPresent BOOLEAN NOT NULL,
        PRIMARY KEY (EmployeeID, Date),
        FOREIGN KEY (EmployeeID) REFERENCES Employee(EmployeeID) ON DELETE CASCADE
    )";

    // Create Employee_Schedule table
    $sql_employeeschedule = "CREATE TABLE Employee_Schedule  (
        EmployeeID INT(10),
        DayofWeek VARCHAR(100) NOT NULL,
        StartTime VARCHAR (100) NOT NULL,
        EndTime VARCHAR (100) NOT NULL,
        PRIMARY KEY (EmployeeID, DayofWeek),
        FOREIGN KEY (EmployeeID) REFERENCES Employee(EmployeeID) ON DELETE CASCADE
    )";

    if (mysqli_query($con, $sql_employeedetails) && mysqli_query($con, $sql_employeeavailability) && mysqli_query($con, $sql_employeeschedule)) {
        echo "Tables for Employee_Details, Employee_Availability, Employee_Schedule, Employee_Worked_Minutes successfully created<br>";
    } else {
        echo "Error creating table: " . mysqli_error($con);
    }

    // Create Patient_Record table
    $sql_patientrecord = "CREATE TABLE Patient_Record  (
        CustomerID INT(10) PRIMARY KEY,
        CustomerRecord VARCHAR(500),
        FOREIGN KEY (CustomerID) REFERENCES Customer(CustomerID) ON DELETE CASCADE
    )";

    if (mysqli_query($con, $sql_patientrecord)) {
        echo "Table for Patient_Record successfully created<br>";
    } else {
        echo "Error creating table: " . mysqli_error($con);
    }
}

mysqli_close($con);
?>