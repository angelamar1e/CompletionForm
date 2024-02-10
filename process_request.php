<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $requestType = $_POST["request_type"];

    if ($requestType == "late_reporting") {
        $finalGrade = $_POST["final_grade"];
        $units = $_POST["units"];

        // Process late reporting form data
        // Example: store data in database, send emails, etc.

    } elseif ($requestType == "completion_of_incomplete_grades") {
        // Process completion of incomplete grades form data
        // Example: store data in database, send emails, etc.

    } elseif ($requestType == "correction_of_entry") {
        // Process correction of entry form data
        // Example: store data in database, send emails, etc.

    } else {
        // Handle unexpected request type
    }
}
?>
