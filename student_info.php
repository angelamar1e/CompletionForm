<?php 
    // Define the current page variable based on the filename
    $current_page = basename($_SERVER['PHP_SELF']);

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="student_info.css">
</head>
<body class="vh-100 custom-font">
    <?php session_start(); ?>
<<<<<<< HEAD
    <div class="container">
        <form method="post" action="process_student_info.php" id="student_info_form" class="container">
            <!-- basic information -->
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6 text-end pe-3">
                            <label for="studentnumber" class="col-md-6 col-form-label">Student Number: </label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="stud_num" id="stud_num" required pattern="20\d{2}-\d{5}-[A-Z]{2}-0" placeholder="20XX-XXXXX-MN-0">
<<<<<<< HEAD
=======
=======
    <div class="container-fluid mt-5">
        <div class="row justify-content-center">
            <form class="w-75" method="post" action="process_student_info.php" id="student_info_form" class="container">
                <!-- basic information -->
                <div class="row">
                    <div class="col mt-5 d-flex justify-content-end">
                        <div class="row w-75">
                            <div class="row justify-content-center mb-3">
                                <div class="col pe-3 d-flex align-items-center">
                                    <label for="studentnumber" class="w-100 text-end">Student Number: </label>
                                </div>
                                <div class="col d-flex align-items-center">
                                    <input type="text" name="stud_num" id="stud_num" value="<?php echo isset($_SESSION['stud_num']) ? $_SESSION['stud_num'] : '';?>" required>
                                </div>
                            </div>
                            <div class="row justify-content-center mb-3">
                                <div class="col text-end pe-3 d-flex align-items-center">
                                    <label for="firstname" class="w-100 text-end">First Name: </label>
                                </div>
                                <div class="col d-flex align-items-center">
                                    <input type="text" name="fname" id="fname" value="<?php echo isset($_SESSION['fname']) ? $_SESSION['fname'] : '';?>" required>
                                </div>
                            </div>
                            <div class="row justify-content-center mb-3">
                                <div class="col text-end pe-3 d-flex align-items-center">
                                    <label for="middlename" class="w-100 text-end">Middle Name: </label>
                                </div>
                                <div class="col d-flex align-items-center">
                                    <input type="text" name="mname" id="mname" value="<?php echo isset($_SESSION['mname']) ? $_SESSION['mname'] : '';?>" required>
                                </div>
                            </div>
                            <div class="row justify-content-center mb-3">
                                <div class="col pe-3 d-flex align-items-center">
                                    <label for="lastname" class="w-100 text-end">Last Name: </label>
                                </div>
                                <div class="col d-flex align-items-center">
                                    <input type="text" name="lname" id="lname" value="<?php echo isset($_SESSION['lname']) ? $_SESSION['lname'] : '';?>" required>
                                </div>
                            </div>
>>>>>>> 427086647455eff8a37b948668dd18f12976e1da
>>>>>>> 073bf0226a91ee50452ec7cfdb433968668d2821
                        </div>
                    </div>
                    <!-- course selection -->
                    <div class="col h-50 d-flex align-self-end">
                        <div class="row w-75">
                            <div class="row mb-3">
                                <div class="col-3 pe-3 d-flex align-items-center">
                                    <label for="course" class="form-label w-100 text-end">Course: </label>
                                </div>
                                <div class="col-8 d-flex align-items-center">
                                    <select name="course_select" class="course_select" id="course_select" required>
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
                                </div>
                            </div>
                            <!-- year selection -->
                            <div class="row mb-3">
                                <div class="col-3 pe-3 d-flex align-items-center">
                                    <label for="year" class="form-label w-100 text-end">Year: </label>
                                </div>
                                <div class="col d-flex align-items-center">
                                    <select name="year_select" id="year_select" required>
                                        <option value="<?php echo isset($_SESSION['year_select']) ? $_SESSION['year_select'] : '';?>" selected hidden><?php echo isset($_SESSION['year_select']) ? $_SESSION['year_select'] : '';?></option>
                                        <option value="1st Year">1st Year</option>
                                        <option value="2nd Year">2nd Year</option>
                                        <option value="3rd Year">3rd Year</option>
                                        <option value="4th Year">4th Year</option>
                                    </select>
                                </div>
                            </div>
                            <!-- section input -->
                            <div class="row mb-3">
                                <div class="col-3 pe-3 d-flex align-items-center">
                                    <label for="section" class="form-label w-100 text-end">Section: </label>
                                </div>
                                <div class="col d-flex align-items-center">
                                    <input type="text" name="section" id="section" value="<?php echo isset($_SESSION['section']) ? $_SESSION['section'] : '';?>" required>
                                </div>
                            </div>
                                                </div>
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="fname" id="fname" pattern="[A-Za-z]+" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 text-end pe-3">
                            <label for="middlename" class="col-md-6 col-form-label">Middle Name: </label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="mname" id="mname" pattern="[A-Za-z]+">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 text-end pe-3">
                            <label for="lastname" class="col-md-6 col-form-label">Last Name: </label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="lname" id="lname" pattern="[A-Za-z]+" required>
                        </div>
                    </div>
                </div>
                <!-- course selection -->
                <div class="col-md-6 mt-5">
                    <div class="row">
                        <div class="col-md-6 pe-3">
                            <label for="course" class="form-label">Course: </label>
                        </div>
                        <div class="col-md-6">
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
                        </div>
                    </div>
                    <!-- year selection -->
                    <div class="row">
                        <div class="col-md-6 pe-3">
                            <label for="year" class="form-label">Year: </label>
                        </div>
                        <div class="col-md-6">
                            <select name="year_select" id="year_select" required>
                                <option value="<?php echo isset($_SESSION['year_select']) ? $_SESSION['year_select'] : '';?>" selected hidden><?php echo isset($_SESSION['year_select']) ? $_SESSION['year_select'] : '';?></option>
                                <option value="1st Year">1st Year</option>
                                <option value="2nd Year">2nd Year</option>
                                <option value="3rd Year">3rd Year</option>
                                <option value="4th Year">4th Year</option>
                            </select>
                        </div>
                    </div>
                    <!-- section input -->
                    <div class="row">
                        <div class="col-md-6 pe-3">
                            <label for="section" class="form-label">Section: </label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="section" id="section" value="<?php echo isset($_SESSION['section']) ? $_SESSION['section'] : '';?>" required pattern="\d{1}|\d{1}[A-Za-z]{1}" required>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-end">
                    <input type="submit" value="Next">
                </div>
            </form>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('select').select2();
        });
    </script>
</body>
</html>