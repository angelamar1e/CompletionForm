<?php 
    include('navbar.html');
    include('connection.php');
    include('queries.php');

    // get all types of sessions, terms, campuses listed in db, to display as options for session select 
    $all_sessions = select(array("*"),"sessions");
    $all_terms = select(array("*"),"terms");
    $all_campus = select(array("*"),"campuses");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request Information</title>
</head>
<body>
    <?php 
        session_start();
        if(isset($_REQUEST['details'])){ ?>
            <form action="process_request_info.php" method="post" id="request_info_form">
                <!-- subject code, title input -->
                <label for="subj_code">Subject Code</label>
                <input type="text" name="subj_code" id="subj_code" value="<?php echo isset($_SESSION['subj_code']) ? $_SESSION['subj_code'] : '';?>" required>
                <label for="subj_title">Subject Title</label>
                <input type="text" name="subj_title" id="subj_title" value="<?php echo isset($_SESSION['subj_title']) ? $_SESSION['subj_title'] : '';?>" required>
                
                <!-- school year input -->
                <label for="sy">School Year</label>
                <input type="text" name="sy" id="sy" value="<?php echo isset($_SESSION['school_year']) ? $_SESSION['school_year'] : '';?>" required>
                
                <!-- school session selection -->
                <label for="session_select">School Session</label>
                <select name="session_select" id="session_select">
                    <option value="<?php echo isset($_SESSION['session_code']) ? $_SESSION['session_code'] : '';?>" selected hidden required><?php echo isset($_SESSION['session_desc']) ? $_SESSION['session_desc'] : 'Select';?>
                    <?php
                        while($session = mysqli_fetch_array($all_sessions,MYSQLI_ASSOC)):;
                    ?>
                        <option value="<?php echo $session['session_code'];?>">
                            <?php echo $session['session_desc']; ?>
                        </option>
                    <?php
                        endwhile;
                    ?>
                </select>

                <!-- term selection -->
                <label for="term_select">Term</label>
                <select name="term_select" id="term_select">
                    <option value="<?php echo isset($_SESSION['term_code']) ? $_SESSION['term_code'] : '';?>" selected hidden required><?php echo isset($_SESSION['term_desc']) ? $_SESSION['term_desc'] : 'Select';?>
                    <?php
                        while($term = mysqli_fetch_array($all_terms,MYSQLI_ASSOC)):;
                    ?>
                        <option value="<?php echo $term['term_code'];?>">
                            <?php echo $term['term_desc']; ?>
                        </option>
                    <?php
                        endwhile;
                    ?>
                </select>

                <!-- campus selection -->
                <label for="campus_select">Campus</label>
                <select name="campus_select" id="campus_select">
                    <option value="<?php echo isset($_SESSION['campus_id']) ? $_SESSION['campus_id'] : '';?>" selected hidden required><?php echo isset($_SESSION['campus_name']) ? $_SESSION['campus_name'] : 'Select';?>
                    <?php
                        while($campus = mysqli_fetch_array($all_campus,MYSQLI_ASSOC)):;
                    ?>
                        <option value="<?php echo $campus['campus_id'];?>">
                            <?php echo $campus['campus_name']; ?>
                        </option>
                    <?php
                        endwhile;
                    ?>
                </select>

                <!-- reason for application input -->
                <label for="reason">Reason for Application</label>
                <input type="text" name="reason" id="reason" value="<?php echo isset($_SESSION['reason']) ? $_SESSION['reason'] : '';?>" required>

                <!-- student previously reported as -->
                <label for="prev_report">Student previously reported as</label>
                <input type="text" name="prev_report" id="prev_report" value="<?php echo isset($_SESSION['prev_report']) ? $_SESSION['prev_report'] : '';?>" required>

                <!-- submit button -->
                <input type="submit" value="Next">
            </form>
        <?php
        }

        if(isset($_REQUEST['type'])){ ?>
            

        <?php
        }
    ?>
</body>
</html>