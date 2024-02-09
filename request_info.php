<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'SF Pro Display', sans-serif;
            margin: 20px;
        }

        .nav_container {
            background-color: #740e0eb9;
            color: #fff;
            padding: 10px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .navbar {
            width: 65%;
            height: 67%;
            display: flex;
            flex-direction: row;
            justify-content: flex-start;
            align-items: center;
            margin-left: 50px;
        }

        .img_div {
            margin-right: 20px;
            margin-left: 40px;
        }

        img {
            width: 100px;
            height: auto;
        }

        .request-form {
            max-width: 600px;
            margin: 20px auto;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
    <title>Request Information</title>
</head>
<body>
    <?php include('navbar.html'); ?>

    <div class="nav_container">
        <div class="navbar">
            <div class="img_div">
                <img src="img/PUPLogo.png" alt="logo">
            </div>
            <h1>Request Information</h1>
        </div>
    </div>

    <div class="request-form">
        <form action="process_request.php" method="post">
            <div class="form-group">
                <label for="subject_code">Subject Code:</label>
                <input type="text" id="subject_code" name="subject_code">
            </div>

            <div class="form-group">
                <label for="subject_title">Subject Title:</label>
                <input type="text" id="subject_title" name="subject_title">
            </div>

            <div class="form-group">
                <label for="school_year">School Year:</label>
                <input type="text" id="school_year" name="school_year">
            </div>

            <div class="form-group">
                <label for="school_session">School Session:</label>
                <input type="text" id="school_session" name="school_session">
            </div>

            <div class="form-group">
                <label for="term">Term:</label>
                <input type="text" id="term" name="term">
            </div>

            <div class="form-group">
                <label for="campus">Campus:</label>
                <input type="text" id="campus" name="campus">
            </div>

            <div class="form-group">
                <label for="reason_for_application">Reason for Application:</label>
                <input type="text" id="reason_for_application" name="reason_for_application">
            </div>

            <div class="form-group">
                <label for="previously_reported">Student previously reported as:</label>
                <input type="text" id="previously_reported" name="previously_reported">
            </div>

            <input type="submit" value="Submit Request">
        </form>
    </div>
</body>
</html>
