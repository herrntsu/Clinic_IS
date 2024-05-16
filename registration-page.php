<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
</head>
<link rel="stylesheet" href="style.css">

<body>
    <div class="container">
        <form action="" method="post" class="form-group">
            <h2>Create an Account.</h2>

            <div class="form-group">
                <h2>Please fill this form to create an account.</h2>
                <label>Full Name:</label>
                <input type="text" name="fullname" id="full-name" placeholder="Full Name" required />
                <label>Email Address:</label>
                <input type="email" name="email" class="form-control" placeholder="E-mail" required />
                <label>Password:</label>
                <input type="password" name="user-password-reg" class="user-password-reg" placeholder="Password"
                    required>
                <label>Confirm Password:</label>
                <input type="password" name="user-cpassword-reg" class="user-cpassword-reg"
                    placeholder="Confirm password" required>
                <input type="submit" name="submit" class="submit-btn" value="Sign in">
                <p>Already have an account? <a href="login-page.php">Login here</a>.</p>
                <p>By creating an account, you are agreeing to the <a href="terms&conditions.php">Terms & Conditions</a>
                </p>
            </div>
        </form>
    </div>
</body>


</html>