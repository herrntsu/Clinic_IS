<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400" rel="stylesheet">
    <title>Login</title>
</head>

<body>
    <!-- start of container class -->
    <div class="container">


        <!-- start of form-group -->
        <form action="" method="post" class="form-group">
            <img src="logo.jpg">
            <h2>Login to AnchorMed Clinic.</h2>
            <div class="form-group">
                <label>Email Address:</label>
                <input type="email" name="email" id="user-email" required/>
                
                <label>Password</label>
                <input type="password" name="password" class="user-password" placeholder="Password" required>
                <input type="submit" name="submit" class="submit-btn" value="Sign in">
                <p>By clicking sign in, you are agreeing to the <a href="terms&conditions.php">Terms & Conditions</a></p>
            </div>
        </form>
        
        <!-- end of form-group -->
        
    </div>
    <!-- end of container class -->

    <!-- start of footer class -->
    <div class="footer">
        <div class="item1"></div>
    </div>
</body>

</html>