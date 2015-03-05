<?php
    require $_SERVER["DOCUMENT_ROOT"]."/actions/database/controller_sql.php";

    $status = "failure";
    switch ($_POST["type"]) {
    	case 'attendee':
		    $status = addAttendee($_POST["fName"], $_POST["lName"], strtolower($_POST["email"]), $_POST["github"], $_POST["school"], $_POST["age"], $_POST["grade"], $_POST["gender"], $_POST["food"], $_POST["skills"]);
    		break;
    	case 'volunteer':
		    $status = addVolunteer($_POST["fName"], $_POST["lName"], strtolower($_POST["email"]), $_POST["age"], $_POST["gender"], $_POST["food"], $_POST["skills"]);
    		break;
    	case 'sponsor':
		    $status = addSponsor($_POST["cName"], $_POST["fName"], $_POST["lName"], strtolower($_POST["email"]), $_POST["message"]);
    		break;
    }

    echo $_POST["type"] . ":" . $status
?>