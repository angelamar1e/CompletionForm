<?php 
    $current_page = basename($_SERVER['PHP_SELF']);
    include('navbar.html');
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
                <div class="form-container custom-margin"> 
                    <form class="submit-form">
                        <div class="form-group">
                            <label for="request-type">Completion Form</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="request-type" id="request-type-1" value="option1" checked>
                                <label class="form-check-label" for="request-type-1">Late Reporting of Grades</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="request-type" id="request-type-2" value="option2">
                                <label class="form-check-label" for="request-type-2">Correction of Entry</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="request-type" id="request-type-3" value="option3">
                                <label class="form-check-label" for="request-type-3">Completion of Incomplete Grades</label>
                            </div>
                        </div>
                        <div class="mb-3"></div>
                        <a href="student_info.php" class="btn btn-primary submit-request-button">SUBMIT A REQUEST</a>
                    </form>
                </div>
            </div>
        </div>  
</body>
</html>