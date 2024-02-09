<?php 
    include('navbar.html');
    include('connection.php');
    include('queries.php');

    $all_courses = select(array("*"),"courses");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Information</title>
</head>
<body>
    <?php session_start(); ?>
        <form method="post" action="process_student_info.php" id="student_info_form">
            <!-- basic information -->
            <label for="studentnumber">Student Number</label>
            <input type="text" name="stud_num" id="stud_num" value="<?php echo isset($_SESSION['stud_num']) ? $_SESSION['stud_num'] : '';?>"required>
            <label for="firstname">First Name</label>
            <input type="text" name="fname" id="fname" value="<?php echo isset($_SESSION['fname']) ? $_SESSION['fname'] : '';?>" required>
            <label for="middlename">Middle Name</label>
            <input type="text" name="mname" id="mname" value="<?php echo isset($_SESSION['mname']) ? $_SESSION['mname'] : '';?>" required>
            <label for="lastname">Last Name</label>
            <input type="text" name="lname" id="lname" value="<?php echo isset($_SESSION['lname']) ? $_SESSION['lname'] : '';?>" required>
            
            <!-- course selection -->
            <label for="course">Course</label>
            <select name="course_select" id="course_select" required>
            <!-- default option, hints no selection -->
            <option value="<?php echo isset($_SESSION['course_code']) ? $_SESSION['course_code'] : '';?>" selected hidden><?php echo isset($_SESSION['course_title']) ? $_SESSION['course_title'] : 'Select';?></option>
            <!-- fetching each course to be set as options, value stored into database is course code but text displayed is the course name -->
            <?php
                while($course = mysqli_fetch_array($all_courses,MYSQLI_ASSOC)):;
            ?>
                <option value="<?php echo $course['course_code'];?>">
                    <?php echo $course['course_title']; ?>
                </option>
            <?php
                endwhile;
            ?>
            </select>

            <!-- year selection -->
            <label for="year">Year</label>
            <select name="year_select" id="year_select" required>
                <option value="<?php echo isset($_SESSION['year_select']) ? $_SESSION['year_select'] : '';?>" selected hidden><?php echo isset($_SESSION['year_select']) ? $_SESSION['year_select'] : '';?></option>
                <option value="1st Year">1st Year</option>
                <option value="2nd Year">2nd Year</option>
                <option value="3rd Year">3rd Year</option>
                <option value="4th Year">4th Year</option>
            </select>

            <!-- section input -->
            <label for="section">Section</label>
            <input type="text" name="section" id="section" value="<?php echo isset($_SESSION['section']) ? $_SESSION['section'] : '';?>" required>

            <input type="submit" value="Next">
        </form>
</body>
</html>