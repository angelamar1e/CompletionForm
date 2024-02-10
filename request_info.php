<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="request_info.css">
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

        input[type="text"], select {
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

        #grades_form, #name_form {
            display: none;
        }
    </style>
    <title>Request Information</title>
    <script src="helper_functions.js"></script>
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
=======
    <title>Request Information</title>
    <script src="helper_functions.js"></script>
</head>
<body>
    <a href="?details"><h3>Request Details</h3></a>
    <a href="?type"><h3>Type of Request</h3></a>
    <?php 
        session_start();
        if(isset($_REQUEST['details'])){ ?>
            <form action="process_request_details.php" method="post" id="request_info_form">
                <!-- subject code, title input -->
                <label for="subj_code">Subject Code</label>
                <input type="text" name="subj_code" id="subj_code" value="<?php echo isset($_SESSION['subj_code']) ? $_SESSION['subj_code'] : '';?>" required>
                <label for="subj_title">Subject Title</label>
                <input type="text" name="subj_title" id="subj_title" value="<?php echo isset($_SESSION['subj_title']) ? $_SESSION['subj_title'] : '';?>" required>
                
                <!-- school year input -->
                <label for="sy">School Year</label>
                <input type="text" name="sy" id="sy" value="<?php echo isset($_SESSION['school_year']) ? $_SESSION['school_year'] : '';?>" required>
                
                <!-- school session selection -->
                <label for="session_select">School Session</label>
                <select name="session_select" id="session_select" required>
                    <option value="<?php echo isset($_SESSION['session_code']) ? $_SESSION['session_code'] : '';?>" selected hidden><?php echo isset($_SESSION['session_desc']) ? $_SESSION['session_desc'] : 'Select';?>
                    <?php
                        while($session = mysqli_fetch_array($all_sessions,MYSQLI_ASSOC)):;
                    ?>
                        <option value="<?php echo $session['session_code'];?>">
                            <?php echo $session['session_desc']; ?>
                        </option>
                    <?php
                        endwhile;
                    ?>
                </select>

                <!-- term selection -->
                <label for="term_select">Term</label>
                <select name="term_select" id="term_select" required>
                    <option value="<?php echo isset($_SESSION['term_code']) ? $_SESSION['term_code'] : '';?>" selected hidden><?php echo isset($_SESSION['term_desc']) ? $_SESSION['term_desc'] : 'Select';?>
                    <?php
                        while($term = mysqli_fetch_array($all_terms,MYSQLI_ASSOC)):;
                    ?>
                        <option value="<?php echo $term['term_code'];?>">
                            <?php echo $term['term_desc']; ?>
                        </option>
                    <?php
                        endwhile;
                    ?>
                </select>

                <!-- campus selection -->
                <label for="campus_select">Campus</label>
                <select name="campus_select" id="campus_select" required>
                    <option value="<?php echo isset($_SESSION['campus_id']) ? $_SESSION['campus_id'] : '';?>" selected hidden required><?php echo isset($_SESSION['campus_name']) ? $_SESSION['campus_name'] : 'Select';?>
                    <?php
                        while($campus = mysqli_fetch_array($all_campus,MYSQLI_ASSOC)):;
                    ?>
                        <option value="<?php echo $campus['campus_id'];?>">
                            <?php echo $campus['campus_name']; ?>
                        </option>
                    <?php
                        endwhile;
                    ?>
                </select>

                <!-- reason for application input -->
                <label for="reason">Reason for Application</label>
                <input type="text" name="reason" id="reason" value="<?php echo isset($_SESSION['reason']) ? $_SESSION['reason'] : '';?>" required>

                <!-- student previously reported as -->
                <label for="prev_report">Student previously reported as</label>
                <input type="text" name="prev_report" id="prev_report" value="<?php echo isset($_SESSION['prev_report']) ? $_SESSION['prev_report'] : '';?>" required>
                
                <h3>Click next to save your input.</h3>
                <!-- submit button -->
                <input type="submit" value="Next">
            </form>
        <?php
        } 

        if(isset($_REQUEST['type'])) { ?>
        <form action="process_request_type.php" id="types" method="POST">
            <input type="radio" name="request_type" id="late" value="Late Reporting of Grades" <?php if(isset($_POST['request_type']) && $_POST['request_type'] == 'Late Reporting of Grades') echo 'checked'; ?>>
            <label for="late">Late Reporting of Grades</label>
            <input type="radio" name="request_type" id="correction" value="Correction of Entry" <?php if(isset($_POST['request_type']) && $_POST['request_type'] == 'Correction of Entry') echo 'checked'; ?>>
            <label for="correction">Correction of Entry</label>
            <input type="radio" name="request_type" id="completion" value="Completion of Incomplete Grades" <?php if(isset($_POST['request_type']) && $_POST['request_type'] == 'Completion of Incomplete Grades') echo 'checked'; ?>>
            <label for="completion">Completion of Incomplete Grades</label>

            <!-- to display if request type is Late Reporting of Grades or Completion of Incomplete Grades -->
            <div id="grades_form" style="display:none;">
                <!-- final grade selection -->
                <label for="grades">Final Grade</label>
                <select name="grades" id="grades">
                    <option value="<?php echo isset($_SESSION['grades']) ? $_SESSION['grades'] : '';?>" selected hidden><?php echo isset($_SESSION['grades']) ? $_SESSION['grades'] : 'Select';?>
                    <option value="1.0">1.0</option>
                    <option value="1.25">1.25</option>
                    <option value="1.50">1.50</option>
                    <option value="1.75">1.75</option>
                    <option value="2.0">2.0</option>
                    <option value="2.25">2.25</option>
                    <option value="2.50">2.50</option>
                    <option value="2.75">2.75</option>
                    <option value="3.0">3.0</option>
                    <option value="5.0">5.0</option>
                </select>

                <!-- number of units input -->
                <label for="units">Number of Units</label>
                <input type="text" name="units" id="units" value="<?php echo isset($_SESSION['units']) ? $_SESSION['units'] : '';?>">

                <!-- instructor's name input -->
                <label for="prof_name">Professor/Instructor's Name</label>
                <input type="text" name="request1_by" id="request1_by" value="<?php echo isset($_SESSION['prof1']) ? $_SESSION['prof1'] : '';?>">
            </div>

            <!-- to display if request type is Correction of Entry -->
            <div id="name_form" style="display:none;">
                <!-- fields for modifying name -->
                <label for="fname">First Name</label>
                <input type="text" name="modified_fname" id="modified_fname" value="<?php echo isset($_SESSION['modified_fname']) ? $_SESSION['modified_fname'] : '';?>">
                <label for="mname">Middle Name</label>
                <input type="text" name="modified_mname" id="modified_mname" value="<?php echo isset($_SESSION['modified_mname']) ? $_SESSION['modified_mname'] : '';?>">
                <label for="lname">Last Name</label>
                <input type="text" name="modified_lname" id="modified_lname" value="<?php echo isset($_SESSION['modified_lname']) ? $_SESSION['modified_lname'] : '';?>">

                <!-- instructor's name input -->
                <label for="prof_name">Professor/Instructor's Name</label>
                <input type="text" name="request2_by" id="request2_by" value="<?php echo isset($_SESSION['prof2']) ? $_SESSION['prof2'] : '';?>">
            </div>

            <h3>Click next to save your input.</h3>
            <input type="submit"  value="Next">
        </form>
    <?php
    }
    ?>
    <script src="helper_functions.js"></script>
</body>
</html>

