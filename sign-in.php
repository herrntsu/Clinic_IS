<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $servername = "localhost";
    $username = "root"; // Replace with your MySQL username
    $password_db = ""; // Replace with your MySQL password
    $dbname = "school_db"; // Ensure this matches your database name

    // Create connection to the MySQL server
    $conn = new mysqli($servername, $username, $password_db, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve the user's hashed password from the database
    $sql = "SELECT id, password, name FROM students WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($id, $hashed_password, $name);
    $stmt->fetch();

    // Verify the password
    if ($hashed_password && password_verify($password, $hashed_password)) {
        // Password is correct, start a session
        $_SESSION['user_id'] = $id;
        $_SESSION['user_email'] = $email;
        $_SESSION['user_name'] = $name;
        
        // Redirect to a protected page
        header("Location: welcome.php");
        exit();
    } else {
        header("Location: Sign up - Students WrongPass.php");
    }

    $stmt->close();
    $conn->close();
}
?>