<?php 
     // Define the current page variable based on the filename
     $current_page = basename($_SERVER['PHP_SELF']);

    include('navbar.html');
    include('connection.php');
    include('queries.php');

    // get all types of sessions, terms, campuses listed in db, to display as options for session select 
    $all_sessions = select(array("*"),"sessions");
    $all_terms = select(array("*"),"terms");
    $all_campus = select(array("*"),"campuses");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request Information</title>
    <script src="helper_functions.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=SF+Pro+Display:wght@700&display=swap">
    <link rel="stylesheet" href="request_info.css">
</head>
<body>
<div class="tab-container">
    <a href="?details" class="tab <?php echo isset($_REQUEST['details']) ? 'selected' : ''; ?>">Request Details</a>
    <a href="?type" class="tab <?php echo isset($_REQUEST['type']) ? 'selected' : ''; ?>">Type of Request</a>
</div>
    <?php 
        session_start();
        // request details section
        if(isset($_REQUEST['details'])){ ?>
            <form action="process_request_details.php" method="post" id="request_info_form">
                <!-- subject code, title input -->
                <label for="subj_code">Subject Code</label>
                <input type="text" name="subj_code" id="subj_code" value="<?php echo isset($_SESSION['subj_code']) ? $_SESSION['subj_code'] : '';?>" required pattern="[A-Za-z0-9]+" required>
                <label for="subj_title">Subject Title</label>
                <input type="text" name="subj_title" id="subj_title" value="<?php echo isset($_SESSION['subj_title']) ? $_SESSION['subj_title'] : '';?>" pattern="[A-Za-z]+" required>
                
                <!-- school year input -->
                <label for="sy">School Year</label>
                <input type="text" name="sy" id="sy" value="<?php echo isset($_SESSION['school_year']) ? $_SESSION['school_year'] : '';?>" required pattern="20[0-9]{2} - 20[0-9]{2}" placeholder="20XX-20XX" required>
                
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

        // request type section
        if(isset($_REQUEST['type'])) { ?>
        <div class="container mt-4">
            <form action="process_request_type.php" id="types" method="POST">
                <div class="radio-container">
                    <div class="col">
                        <input type="radio" name="request_type" id="late" value="Late Reporting of Grades" <?php if(isset($_POST['request_type']) && $_POST['request_type'] == 'Late Reporting of Grades') echo 'checked'; ?>>
                        <label for="late">Late Reporting of Grades</label>
                    </div>
                    <div class="col">
                        <input type="radio" name="request_type" id="correction" value="Correction of Entry" <?php if(isset($_POST['request_type']) && $_POST['request_type'] == 'Correction of Entry') echo 'checked'; ?>>
                        <label for="correction">Correction of Entry</label>
                    </div>
                    <div class="col">
                        <input type="radio" name="request_type" id="completion" value="Completion of Incomplete Grades" <?php if(isset($_POST['request_type']) && $_POST['request_type'] == 'Completion of Incomplete Grades') echo 'checked'; ?>>
                        <label for="completion">Completion of Incomplete Grades</label>
                    </div>
                </div>
            
                <!-- to display if request type is Late Reporting of Grades or Completion of Incomplete Grades -->
                <div id="grades_form" class="field-container" style="display:none;">
                    <div class="row">
                        <div class="col">
                            <div class="form-check form-check-inline">
                            <!-- final grade selection -->
                            <label for="grades">Final Grade: </label>
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
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-check form-check-inline">
                                <!-- number of units input -->
                                <label for="units">Number of Units:</label>
                                <input type="text" name="units" id="units" value="<?php echo isset($_SESSION['units']) ? $_SESSION['units'] : '';?>" required pattern="[3-5]" required>
                            </div>
                        </div>
                    </div>
                        <!-- instructor's name input -->
                    <div class="row professor-input-row">
                        <div class="col">
                            <label for="prof_name">Professor/Instructor's Name: </label>
                            <input type="text" name="request1_by" id="request1_by" value="<?php echo isset($_SESSION['prof1']) ? $_SESSION['prof1'] : '';?>" required pattern="[A-Za-z]+" required>
                        </div>
                    </div>
                </div>
            
            <!-- to display if request type is Correction of Entry -->
            <div id="name_form" style="display:none;">
                <!-- fields for modifying name -->
                <label for="fname">First Name</label>
                <input type="text" name="modified_fname" id="modified_fname" value="<?php echo isset($_SESSION['modified_fname']) ? $_SESSION['modified_fname'] : '';?>" pattern="[A-Za-z]+">
                <label for="mname">Middle Name</label>
                <input type="text" name="modified_mname" id="modified_mname" value="<?php echo isset($_SESSION['modified_mname']) ? $_SESSION['modified_mname'] : '';?>" pattern="[A-Za-z]+">
                <label for="lname">Last Name</label>
                <input type="text" name="modified_lname" id="modified_lname" value="<?php echo isset($_SESSION['modified_lname']) ? $_SESSION['modified_lname'] : '';?>" pattern="[A-Za-z]+">

                <!-- instructor's name input -->
                <div class="row professor-input-row">
                    <div class="col">
                        <label for="prof_name">Professor/Instructor's Name: </label>
                        <input type="text" name="request2_by" id="request2_by" value="<?php echo isset($_SESSION['prof2']) ? $_SESSION['prof2'] : '';?>" required pattern="[A-Za-z]+" required>
                    </div>
                </div>
            </div>
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