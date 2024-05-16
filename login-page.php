<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400" rel="stylesheet"> 
    <title>Login</title>
</head>

<body>
    <div class="container">
        <p>Please fill in your email and password.</p>
        <form action="" method="post" class = "form-group">
            <div class="formgroup">
                <label>Email Address:</label>
                <input type="email" name="email" id="user-email" required />
            </div>
            <div class="formgroup">
                <label>Password</label>
                <input type="password" name="password" class="user-password" required>
            </div>
            <div class="formgroup">
                <input type="submit" name="submit" class="submit-btn" value="Submit">
            </div>

            <img src = "logo.jpg">
    </div>
</body>

</html>