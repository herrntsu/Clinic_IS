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
    $sql_users = "CREATE TABLE users (
     id INT(10) AUTO_INCREMENT PRIMARY KEY,
     fullname VARCHAR(100) NOT NULL,
     email VARCHAR(50) NOT NULL,
     passw VARCHAR(200) NOT NULL
    )"; 

    $sql_employees = "CREATE TABLE clinic_admin (
    admin_id INT(10) AUTO_INCREMENT PRIMARY KEY,
    admin_fullname VARCHAR(100) NOT NULL,
    admin_email VARCHAR(50) NOT NULL,
    admin_passw VARCHAR(200) NOT NULL
    )"; 

    $sql_admins = "CREATE TABLE sql_admins (
    employee_id INT(10) AUTO_INCREMENT PRIMARY KEY,
    employee_fullname VARCHAR(100) NOT NULL,
    employee_email VARCHAR(50) NOT NULL,
    employee_passw VARCHAR(200) NOT NULL
    )"; 

    if (mysqli_query($con, $sql_users) && mysqli_query($con, $sql_admins) && mysqli_query($con, $sql_employees)) {
        echo "Tables for users, employees, and admin successfully created";
    } else {
        echo "Error creating table: " . mysqli_error($con);
    }
}

mysqli_close($con);
?>