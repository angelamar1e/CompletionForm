<?php
    include('navbar.html');
    include('connection.php');
    include('queries.php');

    session_start();
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        // Process the form data
        $stud_num = $_POST["stud_num"];
        $fname = $_POST['fname'];
        $mname = $_POST['mname'];
        $lname = $_POST['lname'];
        $course = $_POST['course_select'];
        $course_title = get_course_title($course);
        $year = $_POST['year_select'];
        $section = $_POST['section'];
        
        // Store the form data in session variables
        $_SESSION['stud_num'] = $stud_num;
        $_SESSION['fname'] = $fname;
        $_SESSION['mname'] = $mname;
        $_SESSION['lname'] = $lname;
        $_SESSION['course_code'] = $course;
        $_SESSION['course_title'] = $course_title;
        $_SESSION['year_select'] = $year;
        $_SESSION['section'] = $section;
    }

    header('Location: request_info.php');
?>