<?php 
     // Define the current page variable based on the filename
     $current_page = basename($_SERVER['PHP_SELF']);

    include('navbar.html');
    include('connection.php');
    include('queries.php');

    session_start();

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
<div class="container-fluid">
    <div class="row">
        <div class="row justify-content-center mt-5">
            <p id="disclaimer" class="w-75">Going back to the homepage erases your input.</p>
        </div>
        <div class="row mt-5 tab-container justify-content-center text-center">
            <div class="col-4"><a href="?details" class="tab_type <?php echo isset($_REQUEST['details']) ? 'selected' : ''; ?>">Request Details</a></div>
            <div class="col-4"><a href="?type" class="tab_type <?php echo isset($_REQUEST['type']) ? 'selected' : ''; ?>">Type of Request</a></div>
        </div>
        <div class="row">
            <!-- request details section -->
            <div class="row">
                <?php
                if(isset($_REQUEST['details'])){ ?>
                    <div class="col">
                        <div class="row mt-5 justify-content-center">
                            <div class="row justify-content-center">
                            <form class="d-flex justify-content-evenly w-75" action="process_request_details.php" method="post" id="request_info_form">
                                <!-- labels -->
                                    <div class="col-4 d-flex flex-column justify-content-evenly text-end">
                                        <label for="subj_code">Subject Code</label>
                                        <label for="subj_title">Subject Title</label>
                                        <label for="sy">School Year</label>
                                        <label for="session_select">School Session</label>
                                        <label for="term_select">Term</label>
                                        <label for="campus_select">Campus</label>
                                    </div>
                                    <div class="col-5 d-flex flex-column">
                                        <!-- subj code, title input -->
                                        <input type="text" name="subj_code" id="subj_code" value="<?php echo isset($_SESSION['subj_code']) ? $_SESSION['subj_code'] : '';?>" required>
                                        <input type="text" name="subj_title" id="subj_title" value="<?php echo isset($_SESSION['subj_title']) ? $_SESSION['subj_title'] : '';?>" required>
                                        <!-- school year input -->
                                        <input type="text" name="sy" id="sy" value="<?php echo isset($_SESSION['school_year']) ? $_SESSION['school_year'] : '';?>" required>
                                        <!-- school session selection -->
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
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="col">
                        <!-- reason for application input -->
                        <div class="row mt-5">
                            <div class="row w-75">
                                <label for="reason" class="p-0 m-0">Reason for Application</label>
                                <textarea id="reason" name="reason" rows="3" value="<?php echo isset($_SESSION['reason']) ? $_SESSION['reason'] : '';?>" required></textarea>
                                <!-- student previously reported as -->
                                <label for="prev_report" class="p-0 mb-0">Student previously reported as</label>
                                <textarea name="prev_report" id="prev_report" rows="3" value="<?php echo isset($_SESSION['prev_report']) ? $_SESSION['prev_report'] : '';?>" required></textarea>
                            </div>
                        </div>
                        <div class="row mt-5 w-75 text-end justify-content-end">
                            <h5>Click next to save your input.</h5>
                            <!-- submit button -->
                            <input type="submit" value="Next">
                    </form>
                        </div>
                    </div>
                <?php
                } ?>
            </div>
            
            <!-- request type section -->
            <div class="row justify-content-center  mt-5 ">
                <?php
                    if(isset($_REQUEST['type'])) { ?>
                    <div class="row justify-content-center m-0 w-75">
                        <form action="process_request_type.php" id="types" method="POST">
                            <div class="row">
                                <h3>Select one from the following types:</h3>
                            </div>
                            <div class="row justify-content-center text-center radio-container">
                                <div class="col">
                                    <input type="radio" class="m-3" name="request_type" id="late" value="Late Reporting of Grades" <?php if(isset($_POST['request_type']) && $_POST['request_type'] == 'Late Reporting of Grades') echo 'checked'; ?>>
                                    <label for="late">Late Reporting of Grades</label>
                                </div>
                                <div class="col">
                                    <input type="radio" class="m-3" name="request_type" id="correction" value="Correction of Entry" <?php if(isset($_POST['request_type']) && $_POST['request_type'] == 'Correction of Entry') echo 'checked'; ?>>
                                    <label for="correction">Correction of Entry</label>
                                </div>
                                <div class="col-5">
                                    <input type="radio" class="m-3" name="request_type" id="completion" value="Completion of Incomplete Grades" <?php if(isset($_POST['request_type']) && $_POST['request_type'] == 'Completion of Incomplete Grades') echo 'checked'; ?>>
                                    <label for="completion">Completion of Incomplete Grades</label>
                                </div>
                            </div>
                            <!-- to display if request type is Late Reporting of Grades or Completion of Incomplete Grades -->
                            <div id="grades_form" class="row mt-5" style="display:none;">
                                <div class="row justify-content-center">
                                    <div class="row w-75 justify-content-evenly">
                                        <!-- final grade selection -->
                                        <div class="col-5 p-0 text-end"><label for="grades">Final Grade </label></div>
                                        <div class="col-5">
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
                                    <!-- number of units input -->
                                    <div class="row w-75 justify-content-evenly">
                                        <div class="col-5 p-0 text-end">
                                            <label for="units">Number of Units</label>
                                        </div>
                                        <div class="col-5"><input type="text" name="units" id="units" value="<?php echo isset($_SESSION['units']) ? $_SESSION['units'] : '';?>"></div>
                                    </div>
                                    <!-- instructor's name input -->
                                    <div class="row w-75 justify-content-evenly professor-input-row">
                                        <div class="col-5 p-0 text-end">
                                            <label for="prof_name">Instructor's Name </label>
                                        </div>
                                        <div class="col-5">
                                            <input type="text" name="request1_by" id="request1_by" value="<?php echo isset($_SESSION['prof1']) ? $_SESSION['prof1'] : '';?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <!-- to display if request type is Correction of Entry -->
                        <div class="row mt-5 justify-content-center" id="name_form" style="display:none;">
                            <div class="row w-75 justify-content-evenly m-0 p-0">
                                <div class="col-5 d-flex flex-column justify-content-evenly text-end">
                                    <label for="fname">First Name</label>
                                    <label for="mname">Middle Name</label>
                                    <label for="lname">Last Name</label>
                                    <label for="prof_name">Professor/Instructor's Name: </label>
                                </div>
                                <div class="col-5 d-flex flex-column">
                                    <!-- fields for modifying name -->
                                    <input type="text" name="modified_fname" id="modified_fname" value="<?php echo isset($_SESSION['modified_fname']) ? $_SESSION['modified_fname'] : '';?>">
                                    <input type="text" name="modified_mname" id="modified_mname" value="<?php echo isset($_SESSION['modified_mname']) ? $_SESSION['modified_mname'] : '';?>">
                                    <input type="text" name="modified_lname" id="modified_lname" value="<?php echo isset($_SESSION['modified_lname']) ? $_SESSION['modified_lname'] : '';?>">
                                    <!-- instructor's name input -->
                                    <input type="text" name="request2_by" id="request2_by" value="<?php echo isset($_SESSION['prof2']) ? $_SESSION['prof2'] : '';?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-5 w-75 text-end justify-content-end">
                            <h5>Click next to save your input.</h5>
                            <!-- submit button -->
                            <input type="submit" value="Next">
                    </form>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
    <script src="helper_functions.js"></script>
</body>
</html>