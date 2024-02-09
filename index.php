<?php 
    include('navbar.html');
    session_start();
    session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <!-- proceeds to student info form page -->
    <a href="student_info.php"><button>Submit a Request</button></a>
</body>
</html>