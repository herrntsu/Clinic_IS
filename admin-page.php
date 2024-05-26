<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin-page.css">
    <link rel="icon" type="png" href="images/logo-removebg-preview.png">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400" rel="stylesheet">
    <title>Admin</title>
</head>

<body>
    <div class="dashboard">
    <button id = "view-employees-button" class="button">
        View Employees
</button>

    </div>  
    <!-- end of dashboard div -->

    <script>
        document.getElementById('view-employees-button').addEventListener('click', function () {
            window.location.href = 'employees-list.php';
        });
    </script>
</body>

</html>