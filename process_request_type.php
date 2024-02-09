<?php
    include('queries.php');

    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        if(isset($_POST['request_type'])){
            $request_type = $_POST['request_type'];
            $_SESSION['request_type'] = $request_type;
        }

        // Process the form data
        if (isset($_POST['grades']) and isset($_POST['units']) and isset($_POST['request1_by'])){
            $grades = $_POST['grades'];
            $units = $_POST['units'];
            $prof = $_POST['request1_by'];

            $_SESSION['grades'] = $grades;
            $_SESSION['units'] = $units;
            $_SESSION['prof1'] = $prof;
        }

        if (isset($_POST['modified_fname']) and isset($_POST['modified_mname']) and isset($_POST['modified_lname']) and isset($_POST['request2_by'])){
            $modified_fname = $_POST['modified_fname'];
            $modified_mname = $_POST['modified_mname'];
            $modified_lname = $_POST['modified_lname'];
            $prof = $_POST['request2_by'];

            $_SESSION['modified_fname'] = $modified_fname;
            $_SESSION['modified_mname'] = $modified_mname;
            $_SESSION['modified_lname'] = $modified_lname;
            $_SESSION['prof2'] = $prof;
        }

        header("Location: review_application.php");
    }
?>