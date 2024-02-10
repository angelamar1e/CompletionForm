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

    $is_complete = true;

    $student_info = ['stud_num','fname','mname','lname','course_code','course_title','year_select','section'];
    
    $request_details = ['subj_code','subj_title','school_year','session_code','session_desc','term_code','term_desc','campus_id','campus_name','reason',
    'prev_report'];

    $warning = "Fill all required fields under ";
    $incomplete_forms = [];
?>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <?php
            foreach ($student_info as $variable) {
                if (!isset($_SESSION[$variable]) || $_SESSION[$variable] === null) {
                    $incomplete_forms[] = "Student Information";
                    $is_complete = false;
                    break;
                }
                else { ?>
                <h1>Student Information</h1>
                <p><strong style="color: #c79a15;">Student Number: </strong><?php echo $_SESSION['stud_num'];?></p>
                <p><strong style="color: #c79a15;">First Name: </strong><?php echo $_SESSION['fname'];?></p>
                <p><strong style="color: #c79a15;">Middle Name: </strong><?php echo $_SESSION['mname'];?></p>
                <p><strong style="color: #c79a15;">Last Name: </strong><?php echo $_SESSION['lname'];?></p>
                <p><strong style="color: #c79a15;">Course: </strong><?php echo $_SESSION['course_title'];?></p>
                <p><strong style="color: #c79a15;">Year: </strong><?php echo $_SESSION['year_select'];?></p>
                <p><strong style="color: #c79a15;">Section: </strong><?php echo $_SESSION['section'];?></p>      
            <?php
                break;
            } 
        }
        ?>
    </div>
    <div class="col-md-6">
        <?php
        foreach ($request_details as $variable) {
            if (!isset($_SESSION[$variable]) || $_SESSION[$variable] === null) {
                $incomplete_forms[] = "Request Details";
                $is_complete = false;
                break;
        }
        else{ ?>
            <h1>Request Information</h1>
            <p><strong style="color: #c79a15;">Subject Code: </strong><?php echo $_SESSION['subj_code'];?></p>
            <p><strong style="color: #c79a15;">Subject Title: </strong><?php echo $_SESSION['subj_title'];?></p>
            <p><strong style="color: #c79a15;">School Year: </strong><?php echo $_SESSION['school_year'];?></p>
            <p><strong style="color: #c79a15;">Session: </strong><?php echo $_SESSION['session_desc'];?></p>
            <p><strong style="color: #c79a15;">Term: </strong><?php echo $_SESSION['term_desc'];?></p>
            <p><strong style="color: #c79a15;">Campus: </strong><?php echo $_SESSION['campus_name'];?></p>
            <p><strong style="color: #c79a15;">Reason: </strong><?php echo $_SESSION['reason'];?></p>
            <p><strong style="color: #c79a15;">Previously reported as: </strong><?php echo $_SESSION['prev_report'];?></p>      
        <?php
            break;
        }
    }
   ?>
    <div class="col-md-6"></div>
    <div class="row">
        <div class="col-md-12">
            <?php
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
                            <p><strong style="color: #c79a15;">Final Grade: </strong><?php echo $_SESSION['grades'];?></p>
                            <p><strong style="color: #c79a15;">Number of Units: </strong><?php echo $_SESSION['units'];?></p>
                            <p><strong style="color: #c79a15;">Professor/Instructor's Name: </strong><?php echo  $_SESSION['prof1'];?></p>
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
                           <div class="request-type">
                                <h1><?php echo $request_type ?></h1>
                            </div>
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
        </div>
    </div>
</body>
</html>