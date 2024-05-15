<?php
require_once "config.php";
require_once "session-start.php";

$error = '';
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    //check if email field is empty

    if (empty($email) || empty($password)) {
        $error .= '<p class = "error"> Please fill out the required fields. </p>';
    }
    if (empty($error)) {
        if ($query = $db->prepare("SELECT * FROM users WHERE email = ?")) {
            $query->bind_param('s', $email);
            $query->execute();
            $row = $query->fetch();
            if ($row) {
                if (password_verify($password, $row['password'])) {
                    $_SESSION["userid"] = $row['id'];

                    //Redirect the user to welcome page
                    header("location: welcome-page.php");
                    exit;
                } else {
                    $error .= '<p class = "error">The password is incorrect.</p>';
                }
            } else {
                $error .= '<p class "error"> Username doesn\'t exist';
            }
        }
    }
    mysqli_close($db);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Login</h2>
                <p>Please fill in your email and password.</p>
                <form action="" method="post">
                    <div class="form-group">
                        <label>Email Address:</label>
                        <input type="email" name="email" id="user-email" required />
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" class="btn btn-primary" value="Submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
</form>
</div>
</div>
</div>
</body>

</html>