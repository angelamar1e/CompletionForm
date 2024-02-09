<?php 
    include('navbar.html');
    include('connection.php');
    include('queries.php');

    session_start();

    $is_complete = true;

    $student_info = ['stud_num','fname','mname','lname','course_code','course_title','year_select','section'];
    
    $request_details = ['subj_code','subj_title','school_year','session_code','session_desc','term_code','term_desc','campus_id','campus_name','reason',
    'prev_report'];

    $warning = "Fill all required fields under ";
    $incomplete_forms = [];

    foreach ($student_info as $variable) {
        if (!isset($_SESSION[$variable]) || $_SESSION[$variable] === null) {
            $incomplete_forms[] = "Student Information";
            $is_complete = false;
            break;
        }
        else { ?>
            <h1>Student Information</h1>
            <p>Student Number: <?php echo $_SESSION['stud_num'];?></p>
            <p>First Name: <?php echo $_SESSION['fname'];?></p>
            <p>Middle Name: <?php echo $_SESSION['mname'];?></p>
            <p>Last Name: <?php echo $_SESSION['lname'];?></p>
            <p>Course: <?php echo $_SESSION['course_title'];?></p>
            <p>Year: <?php echo $_SESSION['year_select'];?></p>
            <p>Section: <?php echo $_SESSION['section'];?></p>
            <?php
            break;
        } 
    }

    foreach ($request_details as $variable) {
        if (!isset($_SESSION[$variable]) || $_SESSION[$variable] === null) {
            $incomplete_forms[] = "Request Details";
            $is_complete = false;
            break;
        }
        else{ ?>
            <h1>Request Information</h1>
            <p>Subject Code: <?php echo $_SESSION['subj_code'];?></p>
            <p>Subject Title: <?php echo $_SESSION['subj_title'];?></p>
            <p>School Year: <?php echo $_SESSION['school_year'];?></p>
            <p>Session: <?php echo $_SESSION['session_desc'];?></p>
            <p>Term: <?php echo $_SESSION['term_desc'];?></p>
            <p>Campus: <?php echo $_SESSION['campus_name'];?></p>
            <p>Reason: <?php echo $_SESSION['reason'];?></p>
            <p>Previously reported as: <?php echo $_SESSION['prev_report'];?></p>
        <?php
            break;
        }
    }

    if(isset($_SESSION['request_type'])){
        $request_type = $_SESSION['request_type'];
        if ($request_type == 'Late Reporting of Grades' or $request_type == 'Completion of Incomplete Grades'){
            $late_correction_request = ['grades','units','prof1'];
            foreach ($late_correction_request as $variable) {
                if (!isset($_SESSION[$variable]) || $_SESSION[$variable] === null) {
                    echo "Fill out all required fields for $request_type.";
                    $is_complete = false;
                    break;
                }
                else{ ?>
                    <h1><?php echo $request_type ?></h1>
                    <p>Final Grade: <?php echo $_SESSION['grades'];?></p>
                    <p>Number of Units: <?php echo $_SESSION['units'];?></p>
                    <p>Professor/Instructor's Name: <?php echo  $_SESSION['prof1'];?></p>
                <?php
                    break;
                }
            }
        }
        else {
            $correction_request_info = ['modified_fname','modified_mname','modified_lname','prof2'];
            foreach ($correction_request_info as $variable) {
                if (!isset($_SESSION[$variable]) || $_SESSION[$variable] === null) {
                    echo "Fill out all required fields for $request_type.";
                    $is_complete = false;
                    break;
                }
                else{ ?>
                    <h1><?php echo $request_type ?></h1>
                    <p>Modified First Name: <?php echo $_SESSION['modified_fname'];?></p>
                    <p>Modified Middle Name: <?php echo  $_SESSION['modified_mname'];?></p>
                    <p>Modified Last Name: <?php echo  $_SESSION['modified_lname'];?></p>
                    <p>Professor/Instructor's Name: <?php echo  $_SESSION['prof2'];?></p>
                <?php
                    break;
                }
            }
        }
    }
    else{ 
        $is_complete = false; ?>
        <h3><?php echo "Please select a request type."; ?></h3> 
    <?php
    }
    
    if ($is_complete){ ?>
        <form action="submit_request.php">
            <input type="submit" value="Submit">
        </form>
    <?php
    }
    else{
        $warning .= count($incomplete_forms) == 2 ? implode(" and ",$incomplete_forms) : implode($incomplete_forms); ?>
        <h3><?php echo $warning; ?></h3>
    <?php
    }?>