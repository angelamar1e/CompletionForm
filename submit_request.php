<?php

include('navbar.html');
include('connection.php');
include('queries.php');

session_start();
// session_destroy();

function alert_redirect($message,$path){
    echo '<script>
            alert("'.$message.'");
            window.location.replace("'.$path.'");
        </script>';
}

$existing_student = is_existing($_SESSION['stud_num']);

if ($existing_student == 0){
    $add_student_result = add_student($_SESSION['stud_num'],$_SESSION['fname'],$_SESSION['mname'],$_SESSION['lname'],$_SESSION['course_code'],$_SESSION['year_select'],$_SESSION['section']);
    
    if(isset($_SESSION['prof1'])){
        $_SESSION['prof'] = $_SESSION['prof1'];
    }
    elseif(isset($_SESSION['prof2'])){
        $_SESSION['prof'] = $_SESSION['prof2'];
    }

    $add_request = add_request($_SESSION['stud_num'],$_SESSION['subj_code'],$_SESSION['subj_title'],$_SESSION['session_code'],$_SESSION['term_code'],$_SESSION['campus_id'],$_SESSION['prev_report'],$_SESSION['reason'],$_SESSION['prof']);
    
    if(isset($_SESSION['request_type'])){
        $request_type = $_SESSION['request_type'];
        if ($request_type == 'Late Reporting of Grades'){
            $add_additional_info = late_reporting_request($_SESSION['control_number'],$_SESSION['grades'],$_SESSION['units']);
        }
        elseif ($request_type == 'Completion of Incomplete Grades'){
            $add_additional_info = completion_request($_SESSION['control_number'],$_SESSION['grades'],$_SESSION['units']);
        }
        else{
            $add_additional_info = correction_request($_SESSION['control_number'],$_SESSION['modified_fname'],$_SESSION['modified_mname'],$_SESSION['modified_lname']);
        }
    }

    if ($add_student_result and $add_request and $add_additional_info){
        alert_redirect("Request submitted successfully.","index.php");
    }
    else{
        alert_redirect("Error: '. mysqli_error($conn) . '","index.php");
    }
}
else{
<<<<<<< HEAD
=======
    if(isset($_SESSION['prof1'])){
        $_SESSION['prof'] = $_SESSION['prof1'];
    }
    elseif(isset($_SESSION['prof2'])){
        $_SESSION['prof'] = $_SESSION['prof2'];
    }

>>>>>>> d96d9d1cfa5f6514bde7bc54a40f4a21470ea637
    $add_request = add_request($_SESSION['stud_num'],$_SESSION['subj_code'],$_SESSION['subj_title'],$_SESSION['session_code'],$_SESSION['term_code'],$_SESSION['campus_id'],$_SESSION['prev_report'],$_SESSION['reason'],$_SESSION['prof']);
    
    if(isset($_SESSION['request_type'])){
        $request_type = $_SESSION['request_type'];
        if ($request_type == 'Late Reporting of Grades'){
            $add_additional_info = late_reporting_request($_SESSION['control_number'],$_SESSION['grades'],$_SESSION['units']);
        }
        elseif ($request_type == 'Completion of Incomplete Grades'){
            $add_additional_info = completion_request($_SESSION['control_number'],$_SESSION['grades'],$_SESSION['units']);
        }
        else{
            $add_additional_info = correction_request($_SESSION['control_number'],$_SESSION['modified_fname'],$_SESSION['modified_mname'],$_SESSION['modified_lname']);
        }
    }

    if($add_request and $add_additional_info){
        alert_redirect("Request submitted successfully.","index.php");
    }
    else{
        alert_redirect("Error: '. mysqli_error($conn) . '","index.php");
    }
}
?>