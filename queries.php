<?php
    include('connection.php');

    // forms simple select query (SELECT cols FROM table)
    function select($cols, $table){
    global $conn;
    $select = "SELECT ";
    $select .= count($cols) > 1 ? implode(", ",$cols) : implode($cols);
    $query = "$select
    FROM $table";
    $result = mysqli_query($conn, $query);
    return $result;
}

// forms select query with where clause (SELECT cols FROM table WHERE condition)
    function select_where($cols, $table, $condition){
    global $conn;
    $select = "SELECT ";
    $select .= count($cols) > 1 ? implode(", ",$cols) : implode($cols);
    $query = "$select
    FROM $table
    WHERE $condition";
    $result = mysqli_query($conn, $query);
    return $result;
}

// get course title
function get_course_title($code){
    global $conn;
    $query = "SELECT *
            FROM courses
            WHERE course_code = '$code'";
    $result = mysqli_query($conn, $query);
    while($course = mysqli_fetch_array($result,MYSQLI_ASSOC)){
        $title = $course['course_title'];
    }
    return $title;
}

// get session description
function get_session_desc($code){
    global $conn;
    $query = "SELECT *
            FROM sessions
            WHERE session_code = '$code'";
    $result = mysqli_query($conn, $query);
    while($session = mysqli_fetch_array($result,MYSQLI_ASSOC)){
        $desc = $session['session_desc'];
    }
    return $desc;
}

// get term description
function get_term_desc($code){
    global $conn;
    $query = "SELECT *
            FROM terms
            WHERE term_code = '$code'";
    $result = mysqli_query($conn, $query);
    while($term = mysqli_fetch_array($result,MYSQLI_ASSOC)){
        $desc = $term['term_desc'];
    }
    return $desc;
}

// get campus name
function get_campus_name($id){
    global $conn;
    $query = "SELECT *
            FROM campuses
            WHERE campus_id = '$id'";
    $result = mysqli_query($conn, $query);
    while($campus = mysqli_fetch_array($result,MYSQLI_ASSOC)){
        $name = $campus['campus_name'];
    }
    return $name;
}

// check if student record is already in the db 
function is_existing($stud_num){
    global $conn;
    $query = "SELECT COUNT(*) as 'count'
    FROM students
    WHERE student_number = $stud_num";
    $result = mysqli_query($conn, $query);
    $count = mysqli_fetch_array($result,MYSQLI_ASSOC);
    return $count['count'];
}

// add student info into students table 
function add_student($stud_num, $fname, $mname, $lname, $course, $year, $section){
    global $conn;
    $query = "INSERT INTO students(student_number, first_name, middle_name, last_name, course_code, year, section)
            VALUES ($stud_num, '$fname', '$mname','$lname','$course','$year','$section')";
    $result = mysqli_query($conn, $query);
    return $result;
}

// add request info into requests table 
function add_request($stud_num, $subj_code, $subj_title, $session, $term, $campus, $report,$reason,$prof){
    // Generate a control number with date and time
    $dateTime = date('YmdHis'); // Current date and time in the format YYYYMMDDHHMMSS
    $randomNumber = mt_rand(0,999999); // Generate a random 4-digit number
    $control_number = $dateTime . $randomNumber;
    $control_number = substr($control_number, 0, 11);

    $stud_num = $_SESSION['stud_num'];
    $_SESSION['control_number'] = $control_number;

    $date = date("Y-m-d");
    global $conn;
    $query = "INSERT INTO requests(control_number, student_number, subject_code, subject_title, session_code, term_code, campus_id, reported_as, reason, creation_date, requested_by)
            VALUES ($control_number, $stud_num, '$subj_code','$subj_title','$session', '$term', $campus, '$report','$reason','$date','$prof')";
    $result = mysqli_query($conn, $query);
    return $result;
}

// add additional info for different request types into tables
function late_reporting_request($control_number,$grade,$units){
    global $conn;
    $query = "INSERT INTO late_reporting_requests(control_number,final_grade,units)
            VALUES ($control_number,$grade,$units)";
    $result = mysqli_query($conn, $query);
    return $result;
}

function completion_request($control_number,$grade,$units){
    global $conn;
    $query = "INSERT INTO completion_requests(control_number,final_grade,units)
            VALUES ($control_number,$grade,$units)";
    $result = mysqli_query($conn, $query);
    return $result;
}

function correction_request($control_number,$fname,$mname,$lname){
    global $conn;
    $query = "INSERT INTO correction_requests(control_number,modified_fname,modified_mname,modified_lname)
            VALUES ($control_number,'$fname','$mname','$lname')";
    $result = mysqli_query($conn, $query);
    return $result;
}
?>