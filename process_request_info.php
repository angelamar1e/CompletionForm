<?php
    include('queries.php');

    session_start();
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        // Process the form data
        $subj_code = $_POST['subj_code'];
        $subj_title = $_POST['subj_title'];
        $sy = $_POST['sy'];
        $session_code = $_POST['session_select'];
        $session_desc = get_session_desc($session_code);
        $term_code = $_POST['term_select'];
        $term_desc = get_term_desc($term_code);
        $campus_id = $_POST['campus_select'];
        $campus_name = get_campus_name($campus_id);
        $reason = $_POST['reason'];
        $prev_report = $_POST['prev_report'];
        
        // Store the form data in session variables
        $_SESSION['subj_code'] = $subj_code;
        $_SESSION['subj_title'] = $subj_title;
        $_SESSION['school_year'] = $sy;
        $_SESSION['session_code'] = $session_code;
        $_SESSION['session_desc'] = $session_desc;
        $_SESSION['term_code'] = $term_code;
        $_SESSION['term_desc'] = $term_desc;
        $_SESSION['campus_id'] = $campus_id;
        $_SESSION['campus_name'] = $campus_name;
        $_SESSION['reason'] = $reason;
        $_SESSION['prev_report'] = $prev_report;
    }

    header('Location: request_info.php?type');
?>