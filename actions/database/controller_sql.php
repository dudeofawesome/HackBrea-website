<?
    $db = null;
    
    function addAttendee ($fName, $lName, $email, $github, $school, $age, $grade, $gender, $food, $skills) {
        // check input for errors
        if (trim($fName) == "" || 
            trim($lName) == "" || 
            !isEmail($email) || 
            trim($github) == "" || 
            trim($school) == "" || 
            trim($age) == "" || $age < 13 || 
            trim($skills) == "") {

            return "failure";
        }

        // if we're still chill, then send to DB
        $db = connectToServer();

        include $_SERVER["DOCUMENT_ROOT"]."/actions/database/credentials/sql_db.php";

        $sql = $db->prepare("INSERT INTO $SQL_DB_PAGE_ATTENDEES (fName, lName, email, github, school, age, grade, gender, food, skills) VALUES (:fName, :lName, :email, :github, :school, :age, :grade, :gender, :food, :skills)");
        $sql->bindParam(':fName', $fName);
        $sql->bindParam(':lName', $lName);
        $sql->bindParam(':email', $email);
        $sql->bindParam(':github', $github);
        $sql->bindParam(':school', $school);
        $sql->bindParam(':age', $age);
        $sql->bindParam(':grade', $grade);
        $sql->bindParam(':gender', $gender);
        $sql->bindParam(':food', $food);
        $sql->bindParam(':skills', $skills);

        $sql->execute();
        
        return "success";
    }

    function addVolunteer ($fName, $lName, $email, $age, $gender, $food, $skills) {
        // check input for errors
        if (trim($fName) == "" || 
            trim($lName) == "" || 
            !isEmail($email) || 
            trim($age) == "" || $age < 18 || 
            trim($skills) == "") {

            return "failure";
        }

        // if we're still chill, then send to DB
        $db = connectToServer();

        include $_SERVER["DOCUMENT_ROOT"]."/actions/database/credentials/sql_db.php";

        $sql = $db->prepare("INSERT INTO $SQL_DB_PAGE_VONLUNTEERS (fName, lName, email, age, gender, food, skills) VALUES (:fName, :lName, :email, :age, :gender, :food, :skills)");
        $sql->bindParam(':fName', $fName);
        $sql->bindParam(':lName', $lName);
        $sql->bindParam(':email', $email);
        $sql->bindParam(':age', $age);
        $sql->bindParam(':gender', $gender);
        $sql->bindParam(':food', $food);
        $sql->bindParam(':skills', $skills);

        $sql->execute();
        
        sendMeEmail ($fName . "_" . $lName, $email, "New Volunteer", "They are a " . $age . " year old " . $gender . "\nTheir skills: " . $skills . "\nThey have the following dietary restrictions: " . $food);
        
        return "success";
    }

    function addSponsor ($cName, $fName, $lName, $email, $message) {
        // check input for errors
        if (trim($cName) == "" || 
            trim($fName) == "" || 
            trim($lName) == "" || 
            !isEmail($email) || 
            trim($message) == "") {

            return "failure";
        }
        
        // if we're still chill, then send to DB
        $db = connectToServer();

        include $_SERVER["DOCUMENT_ROOT"]."/actions/database/credentials/sql_db.php";

        $sql = $db->prepare("INSERT INTO $SQL_DB_PAGE_SPONSORS (company, fName, lName, email, message) VALUES (:company, :fName, :lName, :email, :message)");
        $sql->bindParam(':company', $cName);
        $sql->bindParam(':fName', $fName);
        $sql->bindParam(':lName', $lName);
        $sql->bindParam(':email', $email);
        $sql->bindParam(':message', $message);

        $sql->execute();

        sendMeEmail ($fName . "_" . $lName, $email, "Sponsorship Opportunity from " . $cName, $message);
        
        return "success";
    }

    function connectToServer () {
        if ($db == null) {
            include $_SERVER["DOCUMENT_ROOT"]."/actions/database/credentials/sql_db.php";
            $db = new PDO("mysql:host=$SQL_DB_SERVER;dbname=$SQL_DB_NAME", $SQL_DB_USERNAME, $SQL_DB_PASSWORD);
            // set the PDO error mode to exception
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return $db;
    }

    function closeConnectionToServer () {
        $db->close();
    }

    function isEmail ($email) {
        // return (strlen($email) >= 5 && email.split("@").length == 2 && email.split(".").length == 2 && email.indexOf("@") < email.indexOf(".") - 1 && email.indexOf("@") != 0 && email.indexOf(".") != email.length - 1);
        return (strlen($email) >= 5 && strrpos(" ", $email) === false && count(explode("@", $email)) == 2 && count(explode(".", $email)) == 2 && strpos($email, "@") < strpos($email, ".") - 1 && strpos($email, "@") != 0 && strpos($email, ".") != strlen($email) - 1);
    }

    function sendMeEmail ($from, $address, $subject, $message) {
        $email = preg_replace("([\r\n])", "", $address);
        $name = $from;

        $find = "/(content-type|bcc:|cc:)/i";
        if (preg_match($find, $name) || preg_match($find, $email)) {
           echo "<h1>Error</h1>\n
              <p>No meta/header injections, please.</p>";
           exit;
        }

        $to      = 'louis@0rleans.com';
        $headers = 'From: '. $name . "\r\n" .
            'Reply-To: ' . $email . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

        mail($to, $subject, $message, $headers);
    }
?>