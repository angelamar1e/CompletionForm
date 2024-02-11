<?php 
    // Define the current page variable based on the filename
    $current_page = basename($_SERVER['PHP_SELF']);

    include('navbar.html');
    include('connection.php');
    include('queries.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review Application</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=SF+Pro+Display:wght@700&display=swap">
    <link rel="stylesheet" href="review_application.css">
</head>
<body>
<?php
    session_start();

    $complete_student_info = true;
    $complete_request_info = true;

    $student_info = ['stud_num','fname','mname','lname','course_code','course_title','year_select','section'];
    
    $request_details = ['subj_code','subj_title','school_year','session_code','session_desc','term_code','term_desc','campus_id','campus_name','reason',
    'prev_report'];

    $incomplete_section = [];

    foreach ($student_info as $variable) {
        if (!isset($_SESSION[$variable]) || $_SESSION[$variable] === null) {
            $incomplete_section[] = "Student Information";
            $complete_student_info = false;
            break;
        }
    }

    foreach ($request_details as $variable) {
            if (!isset($_SESSION[$variable]) || $_SESSION[$variable] === null) {
                $incomplete_section[] = "Request Details";
                $complete_request_info = false;
                break;
            }
    }

    if (!isset($_SESSION['request_type'])){
        $incomplete_section[] = "Type of Request";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review Application</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="review_application.css">
</head>
<body class="custom-font">
    <div class="container-fluid">
        <div class="row">
            <div class="row mt-5">
                <?php
                if ($complete_student_info){ ?>
                    <div class="col-4">
                        <h1>Student Information</h1>
                        <div class="row">
                            <p><span class="label">Student Number: </span><?php echo $_SESSION['stud_num'];?></p>
                            <p><span class="label">First Name: </span><?php echo $_SESSION['fname'];?></p>
                            <p><span class="label">Middle Name: </span><?php echo $_SESSION['mname'];?></p>
                            <p><span class="label">Last Name: </span><?php echo $_SESSION['lname'];?></p>
                            <p><span class="label">Course: </span><?php echo $_SESSION['course_title'];?></p>
                            <p><span class="label">Year: </span><?php echo $_SESSION['year_select'];?></p>
                            <p><span class="label">Section: </span><?php echo $_SESSION['section'];?></p>
                        </div>
                    </div>
                <?php
                } ?>
                <div class="col-4">
                <?php
                if ($complete_request_info){ ?>
                        <div class="row">
                            <h1>Request Information</h1>
                            <p><span class="label">Subject Code: </span><?php echo $_SESSION['subj_code'];?></p>
                            <p><span class="label">Subject Title: </span><?php echo $_SESSION['subj_title'];?></p>
                            <p><span class="label">School Year: </span><?php echo $_SESSION['school_year'];?></p>
                            <p><span class="label">Session: </span><?php echo $_SESSION['session_desc'];?></p>
                            <p><span class="label">Term: </span><?php echo $_SESSION['term_desc'];?></p>
                            <p><span class="label">Campus: </span><?php echo $_SESSION['campus_name'];?></p>
                            <p><span class="label">Reason: </span><?php echo $_SESSION['reason'];?></p>
                            <p><span class="label">Previously reported as: </span><?php echo $_SESSION['prev_report'];?></p>
                        </div>
                        <?php
                } ?>
                        <div class="row">
                            <?php
                            if (isset($_SESSION['request_type'])){ ?>
                                <h1><?php echo $_SESSION['request_type'] ?></h1>
                                <?php
                                $request_type = $_SESSION['request_type'];
                                if ($request_type == 'Late Reporting of Grades' or $request_type == 'Completion of Incomplete Grades'){ ?>
                                    <p><span class="label">Final Grade: </span><?php echo $_SESSION['grades'];?></p>
                                    <p><span class="label">Number of Units: </span><?php echo $_SESSION['units'];?></p>
                                    <p><span class="label">Professor/Instructor's Name: </span><?php echo  $_SESSION['prof1'];?></p>
                                <?php
                                }
                                else { 
                                    $request_type = $_SESSION['request_type']; ?>
                                    <p><span class="label">Modified First Name: </span><?php echo $_SESSION['modified_fname'];?></p>
                                    <p><span class="label">Modified Middle Name: </span><?php echo  $_SESSION['modified_mname'];?></p>
                                    <p><span class="label">Modified Last Name: </span><?php echo  $_SESSION['modified_lname'];?></p>
                                    <p><span class="label">Professor/Instructor's Name: </span><?php echo  $_SESSION['prof2'];?></p>
                                    <?php
                                }?>
                                <?php
                            } ?>
                        </div>
                    </div>
            </div>
            <?php
            if ($complete_student_info and $complete_request_info and isset($_SESSION['request_type'])){ ?>
                <form action="submit_request.php">
                    <input type="submit" value="Submit">
                </form>
            <?php
            }
            else{ ?>
                <div class="row m-5 text-center justify-content-center">
                    <h4>Form cannot be submitted yet.</h4>
                    <h3> Fill all required fields under the following: </h3>
                    <div class="row flex-column text-start justify-content-center">
                        <div class="col mx-auto d-flex flex-column w-25">
                            <?php
                            foreach ($incomplete_section as $section){ ?>
                                <h4><li><?php echo $section;?></li></h4>
                            <?php
                            } ?>
                        </div>
                    </div>
                </div>
            <?php
            }?>
        </div>
    </div>
</body>
</html>