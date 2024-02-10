<?php 
    $current_page = basename($_SERVER['PHP_SELF']);
    include('navbar.html');
    session_start();
    session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Home</title>
</head>
<body> 
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                 <form>
                    <label for="request-type">Completion Form</label>
                     <ul class="list-unstyled list-bullet">
                        <li class="list-group-item">Late Reporting of Grades</li>
                        <li class="list-group-item">Correction of Entry</li>
                        <li class="list-group-item">Completion of Incomplete Grades</li>
                    </ul>
                    <div class="mb-3"></div>
                    <a href="student_info.php" class="btn btn-primary submit-request-button">SUBMIT A REQUEST</a>
                </form>
            </div>
        </div>
    </div>  
</body>
</html>