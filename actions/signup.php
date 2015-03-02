<?php
    require "/actions/database/controller_sql.php";

    if (database.addAttendee($_POST["fName"], $_POST["lName"], $_POST["email"], $_POST["github"], $_POST["school"], $_POST["age"], $_POST["grade"], $_POST["gender"], $_POST["food"], $_POST["skills"])) {
        echo "success";
    } else {
        echo "failure";
    }
?>