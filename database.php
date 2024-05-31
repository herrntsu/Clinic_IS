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
     UNIQUE (AccountID, AccountName, AccountType)
    )"; 

    $sql_accdata = "CREATE TABLE AccData (
    AccountID INT(10) PRIMARY KEY,
    AccountName VARCHAR(100) NOT NULL,
    AccountEmail VARCHAR(100) NOT NULL,
    AccountUsername VARCHAR (100) NOT NULL,
    AccountPass VARCHAR(100) NOT NULL,
    FOREIGN KEY (AccountID, AccountName) REFERENCES Accounts (AccountID, AccountName)
    )"; 


    if (mysqli_query($con, $sql_acc) && mysqli_query($con, $sql_accdata)) {
        echo "Tables for Accounts and AccountData succesfully created <br>";
    } else {
        echo "Error creating table: " . mysqli_error($con);
    }

    $sql_admin = "CREATE TABLE Admins (
        AdminID INT(10) PRIMARY KEY,
        AccountID INT(10),
        AccountName VARCHAR(100) NOT NULL,
        AccountType VARCHAR(50) NOT NULL,
        FOREIGN KEY (AccountID, AccountName, AccountType) REFERENCES Accounts(AccountID, AccountName, AccountType)
       /* FOREIGN KEY (AccountName) REFERENCES Accounts(AccountName),
        FOREIGN KEY (AccountType) REFERENCES Accounts(AccountType) */
    )";
    
    $sql_employee = "CREATE TABLE Employee (
        EmployeeID INT(10) PRIMARY KEY,
        AccountID INT(10),
        AccountName VARCHAR(100) NOT NULL,
        AccountType VARCHAR(50) NOT NULL,
        FOREIGN KEY (AccountID, AccountName, AccountType) REFERENCES Accounts(AccountID, AccountName, AccountType)
        /*FOREIGN KEY (AccountName) REFERENCES Accounts(AccountName),
        FOREIGN KEY (AccountType) REFERENCES Accounts(AccountType)*/
    )";
    
    $sql_customer = "CREATE TABLE Customer (
        CustomerID INT(10) PRIMARY KEY,
        AccountID INT(10),
        AccountName VARCHAR(100) NOT NULL,
        AccountType VARCHAR(50) NOT NULL,
        FOREIGN KEY (AccountID, AccountName, AccountType) REFERENCES Accounts(AccountID, AccountName, AccountType)
        /*FOREIGN KEY (AccountName) REFERENCES Accounts(AccountName),
        FOREIGN KEY (AccountType) REFERENCES Accounts(AccountType)*/
    )";
    
    if (mysqli_query($con, $sql_admin) && mysqli_query($con, $sql_employee) && mysqli_query($con, $sql_customer)) {
        echo "Tables for Admins, Employee, and Customer successfully created<br>";
    } else {
        echo "Error creating table: " . mysqli_error($con);
    }

    $sql_employeedetails = "CREATE TABLE Employee_Details (
        EmployeeID INT(10) PRIMARY KEY,
        EmployeeSpecialty VARCHAR(100) NOT NULL,
        RoomNumber INT(50) NOT NULL,
        FOREIGN KEY (EmployeeID) REFERENCES Employee(EmployeeID)
        )";

    $sql_employeeavailability = "CREATE TABLE Employee_Availability (
        EmployeeID INT(10) PRIMARY KEY,
        Date DATE NOT NULL,
        IsPresent BOOLEAN NOT NULL,
        FOREIGN KEY (EmployeeID) REFERENCES Employee(EmployeeID)
        )";

    $sql_employeeschedule = "CREATE TABLE Employee_Schedule (
        EmployeeID INT(10) PRIMARY KEY,
        DayofWeek VARCHAR (100) NOT NULL,
        StartTime TIME NOT NULL,
        EndTime TIME NOT NULL,
        FOREIGN KEY (EmployeeID) REFERENCES Employee(EmployeeID)
        )";
    
    $sql_employeeworkedminutes = "CREATE TABLE Employee_Worked_Minutes (
        EmployeeID INT(10) PRIMARY KEY,
        Date DATE NOT NULL,
        WorkedMinutes INT (120) NOT NULL,
        FOREIGN KEY (EmployeeID) REFERENCES Employee(EmployeeID)
        )";

    if (mysqli_query($con, $sql_employeedetails) && mysqli_query($con, $sql_employeeavailability) && mysqli_query($con, $sql_employeeschedule) && mysqli_query($con, $sql_employeeworkedminutes)) {
        echo "Tables for Employee_Details, Employee_Availability, Employee_Schedule, Employee_Worked_Minutes successfully created<br>";
    } else {
        echo "Error creating table: " . mysqli_error($con);
    }

    $sql_patientrecord = "CREATE TABLE Patient_Record (
        CustomerID INT(10) PRIMARY KEY,
        CustomerRecord VARCHAR (500),
        FOREIGN KEY (CustomerID) REFERENCES Customer(CustomerID)
        )";

    if (mysqli_query($con, $sql_patientrecord)) {
        echo "Tables for Patient_Record successfully created<br>";
    } else {
        echo "Error creating table: " . mysqli_error($con);
    }
}
//hindi pa tapos(?)
mysqli_close($con);
?>