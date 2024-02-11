<?php 
    include('navbar.html');
    include('connection.php');
    include('queries.php');
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="request_info.css">

    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
        }
    </style>
</head>
</head>
<body class="bg-danger text-white">
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <a href="?details" class="btn btn-warning text-white oblong-hover" style="margin-top: 10px;"><h3>Request Details</h3></a>
            </div>
            <div class="col text-center">
                <a href="?type" class="btn btn-warning text-white oblong-hover" style="margin-top: 10px;"><h3>Type of Application</h3></a>
            </div>
        </div>
    </div>
</body>
</html>

<?php if(isset($_REQUEST['details'])) { ?>
    <div class="row">
        <div class="col-md-6">
            <!-- subject code input -->
            <div class="form-group">
                <label for="subj_code" class="custom-textbox-label-code">Subject Code:</label>
                <input type="text" name="subj_code" id="subj_code" class="form-control custom-textbox-code" value="<?php echo isset($_SESSION['subj_code']) ? $_SESSION['subj_code'] : '';?>" required minlength="3" maxlength="50"pattern="[A-Za-z0-9\s]+>
            </div>

            <!-- subject title input -->
            <div class="form-group">
                <label for="subj_title" class="custom-textbox-label-title">Subject Title:</label>
                <input type="text" name="subj_title" id="subj_title" class="form-control custom-textbox-title" value="<?php echo isset($_SESSION['subj_title']) ? $_SESSION['subj_title'] : '';?>" required minlength="3" maxlength="100" pattern="[A-Za-z0-9\s]+">
            </div>

            <!-- school year input -->
            <div class="form-group">
                <label for="sy" class="custom-textbox-label-school-year">School Year:</label>
                <input type="text" name="sy" id="sy" class="form-control custom-textbox-year" value="<?php echo isset($_SESSION['school_year']) ? $_SESSION['school_year'] : '';?>" required minlength="4" maxlength="10">
            <!-- Assuming the school year should be 4 characters long, adjust as needed -->
            </div>

            <!-- school session selection -->
            <div class="form-group">
                <label for="session_select" class="custom-textbox-label-school-session">School Session:</label>
                <select name="session_select" id="session_select" class="form-control custom-textbox-session" required>
                    <option value="<?php echo isset($_SESSION['session_code']) ? $_SESSION['session_code'] : '';?>" selected hidden><?php echo isset($_SESSION['session_desc']) ? $_SESSION['session_desc'] : 'Select';?></option>
                    <?php
                        while($session = mysqli_fetch_array($all_sessions, MYSQLI_ASSOC)):
                    ?>
                        <option value="<?php echo $session['session_code'];?>">
                            <?php echo $session['session_desc']; ?>
                        </option>
                    <?php
                        endwhile;
                    ?>
                </select>
            </div>
        </div>

        <div class="col-md-6">
            <!-- term selection -->
            <div class="form-group">
                <label for="term_select" class="custom-textbox-label-term">Term:</label>
                <select name="term_select" id="term_select" class="form-control custom-textbox-term" required>
                    <option value="<?php echo isset($_SESSION['term_code']) ? $_SESSION['term_code'] : '';?>" selected hidden><?php echo isset($_SESSION['term_desc']) ? $_SESSION['term_desc'] : 'Select';?></option>
                    <?php
                        while($term = mysqli_fetch_array($all_terms, MYSQLI_ASSOC)):
                    ?>
                        <option value="<?php echo $term['term_code'];?>">
                            <?php echo $term['term_desc']; ?>
                        </option>
                    <?php
                        endwhile;
                    ?>
                </select>
            </div>

            <!-- campus selection -->
            <div class="form-group">
                <label for="campus_select" class="custom-textbox-label-campus">Campus:</label>
                <select name="campus_select" id="campus_select" class="form-control custom-textbox-campus" required>
                    <option value="<?php echo isset($_SESSION['campus_id']) ? $_SESSION['campus_id'] : '';?>" selected hidden required><?php echo isset($_SESSION['campus_name']) ? $_SESSION['campus_name'] : 'Select';?></option>
                    <?php
                        while($campus = mysqli_fetch_array($all_campus, MYSQLI_ASSOC)):
                    ?>
                        <option value="<?php echo $campus['campus_id'];?>">
                            <?php echo $campus['campus_name']; ?>
                        </option>
                    <?php
                        endwhile;
                    ?>
                </select>
            </div>

        <!-- reason for application input -->
        <div class="form-group">
             <label for="reason" class="custom-textbox-label-reason">Reason for Application:</label>
             <input type="text" name="reason" id="reason" class="form-control custom-textbox-reason" value="<?php echo isset($_SESSION['reason']) ? $_SESSION['reason'] : '';?>" required minlength="5" maxlength="200">
        </div>

            <!-- student previously reported as -->
            <div class="form-group">
                <label for="prev_report" class="custom-textbox-label-report">Student Previously Reported As:</label>
                <input type="text" name="prev_report" id="prev_report" class="form-control custom-textbox-report" value="<?php echo isset($_SESSION['prev_report']) ? $_SESSION['prev_report'] : '';?>" required minlength="5" maxlength="200">
            </div>
        </div>
    </form>
<?php } ?>

<?php if(isset($_REQUEST['type'])) { ?>
    <form action="process_request_type.php" id="types" method="POST">
    <div class="row">
        <div class="col-md-4">
            <div class="radio-group-late">
                <input type="radio" name="request_type" id="late" value="Late Reporting of Grades" <?php if(isset($_POST['request_type']) && $_POST['request_type'] == 'Late Reporting of Grades') echo 'checked'; ?>>
                <label for="late">Late Reporting of Grades</label>
            </div>
        </div>
            
            <div class="col-md-4">
                <div class="radio-group-correction">
                    <input type="radio" name="request_type" id="correction" value="Correction of Entry" <?php if(isset($_POST['request_type']) && $_POST['request_type'] == 'Correction of Entry') echo 'checked'; ?>>
                    <label for="correction">Correction of Entry</label>
                </div>
            </div>

            <div class="col-md-4">
                <div class="radio-group-completion">
                    <input type="radio" name="request_type" id="completion" value="Completion of Incomplete Grades" <?php if(isset($_POST['request_type']) && $_POST['request_type'] == 'Completion of Incomplete Grades') echo 'checked'; ?>>
                    <label for="completion">Completion of Incomplete Grades</label>
                </div>
            </div>

            <div class="row mt-3">
            <div class="col-md-12">
                <!-- submit button -->
                <input type="submit" value="Next" class="custom-submit-button submit-hover" style="margin-left: auto; margin-right: auto; margin-top: 20px;">
            </div>
        </div>
    </div>
</form>

<div id="grades_form" style="display:none; margin-top: -550px;">
    <div class="yellow-box" style="width: 400px; height: 400px;">
        <div class="form-group-grade">
            <div>
                <label for="grades">Final Grade:</label>
            </div>
            <div>
                <select name="grades" id="grades">
                    <option value="<?php echo isset($_SESSION['grades']) ? $_SESSION['grades'] : '';?>" selected hidden><?php echo isset($_SESSION['grades']) ? $_SESSION['grades'] : 'Select';?></option>
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

        <div class="form-group-units">
            <div>
                <label for="units">Number of Units:</label>
            </div>
            <div>
                <input type="text" name="units" id="units" value="<?php echo isset($_SESSION['units']) ? $_SESSION['units'] : ''; ?>"required pattern="[0-9]+" min="1" max="3">
            </div>
        </div>

        <div class="form-group-name">
            <div>
                <label for="prof_name">Professor/Instructor's Name:</label>
            </div>
            <div>
                <input type="text" name="request1_by" id="request1_by" value="<?php echo isset($_SESSION['prof1']) ? $_SESSION['prof1'] : ''; ?>"minlength="3" maxlength="50" pattern="[^0-9]*" required>
            </div>
        </div>
    </div>
</div>

<div id="name_form" style="display:none; margin-top: -550px; margin-left: 100px;">
    <div class="yellow-box-2" style="width: 400px; height: 400px;">
        <!-- Fields for modifying name -->
        <div class="form-group-first">
            <label for="fname">First Name:</label>
            <input type="text" name="modified_fname" id="modified_fname" value="<?php echo isset($_SESSION['modified_fname']) ? $_SESSION['modified_fname'] : ''; ?>" minlength="3" maxlength="50" pattern="[^0-9]*" required>
        </div>

        <div class="form-group-middle">
            <label for="mname">Middle Name:</label>
            <input type="text" name="modified_mname" id="modified_mname" value="<?php echo isset($_SESSION['modified_mname']) ? $_SESSION['modified_mname'] : ''; ?>" minlength="3" maxlength="50" pattern="[^0-9]*" required>
        </div>

        <div class="form-group-last">
            <label for="lname">Last Name:</label>
            <input type="text" name="modified_lname" id="modified_lname" value="<?php echo isset($_SESSION['modified_lname']) ? $_SESSION['modified_lname'] : ''; ?>" minlength="3" maxlength="50" pattern="[^0-9]*" required>
        </div>

        <!-- Instructor's name input -->
        <div class="form-group-name2">
            <label for="prof_name">Professor/Instructor's Name:</label>
            <input type="text" name="request2_by" id="request2_by" value="<?php echo isset($_SESSION['prof2']) ? $_SESSION['prof2'] : ''; ?>" minlength="3" maxlength="50" pattern="[^0-9]*" required>
        </div>
    </div>
</div>
<?php  ?>

<script src="helper_functions.js"></script>
</body>
</html>
