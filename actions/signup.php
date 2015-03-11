<?php
    require $_SERVER["DOCUMENT_ROOT"]."/actions/database/controller_sql.php";
    require $_SERVER["DOCUMENT_ROOT"]."/data/info.php";

    $status = "failure";
    switch ($_POST["type"]) {
    	case 'attendee':
		    $status = addAttendee($_POST["fName"], $_POST["lName"], strtolower($_POST["email"]), $_POST["github"], $_POST["school"], $_POST["age"], $_POST["grade"], $_POST["gender"], $_POST["food"], $_POST["skills"]);
            if ($status == "success") {
                $message = "<p>Hey ".$_POST["fName"]."! It looks like you've applied to ".$EVENT_NAME.", which is awesome!<br />
                We are looking forward to meeting you on ".$DAY_OF_EVENT.", ".$MONTH_OF_EVENT." ".$DATE_OF_EVENT." at ".$START_TIME.".</p>
                <p>We'll keep you up to date on any news about HackBrea as it comes in via email, but you can also follow us on <a href='".$FACEBOOK_ACCOUNT."' style='color:rgb(17,94,67);'>Facebook</a> and <a href='".$TWITTER_ACCOUNT."' style='color:rgb(17,94,67);'>Twitter</a></p>";

                sendEmail("HackBrea Team", $TEAM_EMAIL, strtolower($_POST["email"]), "Application for ".$EVENT_NAME, $message);
            }
    		break;
    	case 'volunteer':
		    $status = addVolunteer($_POST["fName"], $_POST["lName"], strtolower($_POST["email"]), $_POST["age"], $_POST["gender"], $_POST["food"], $_POST["skills"]);
    		break;
    	case 'sponsor':
		    $status = addSponsor($_POST["cName"], $_POST["fName"], $_POST["lName"], strtolower($_POST["email"]), $_POST["message"]);
    		break;
    }

    echo $_POST["type"] . ":" . $status;

    function sendEmail ($name, $fromaddress, $toaddress, $subject, $message) {
        $fromaddress = preg_replace("([\r\n])", "", $fromaddress);
        $toaddress = preg_replace("([\r\n])", "", $toaddress);

        $find = "/(content-type|bcc:|cc:)/i";
        if (preg_match($find, $name) || preg_match($find, $email)) {
           echo "<h1>Error</h1>\n
              <p>No meta/header injections, please.</p>";
           exit;
        }

        $headers = 'From: '. $name . " <" . $fromaddress . ">\r\n" .
            'Reply-To: ' . $fromaddress . "\r\n" .
            'X-Mailer: PHP/' . phpversion() . "\r\n" .
            'Content-Type: text/html; charset=ISO-8859-1\r\n';

        mail($toaddress, $subject, $message, $headers);
    }
?>