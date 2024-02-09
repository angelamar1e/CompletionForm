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
?>