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
?>