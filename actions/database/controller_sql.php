<?
    // mysql -u 0rleanscom -p -h hackbreadb.0rleans.com hackbrea_db 
    // https://www.owasp.org/index.php/SQL_Injection_Prevention_Cheat_Sheet

    $db = null;
    
//    $SQL_DB_SERVER
//    $SQL_DB_USERNAME
//    $SQL_DB_PASSWORD
//    $SQL_DB_NAME
//    $SQL_DB_TABLE_ATTENDEES

    function addAttendee ($fName, $lName, $email, $github, $school, $age, $grade, $gender, $food, $skills) {
        // check input for errors
        
        // check input for SQL injection
        
        // if we're still chill, then send to DB
        $db = connectToServer();

        include $_SERVER["DOCUMENT_ROOT"]."/actions/database/credentials/sql_db.php";

        $sql = "INSERT INTO $SQL_DB_TABLE_ATTENDEES (fName, lName, email, github, school, age, grade, gender, food, skills)
        VALUES ('fName', 'lName', 'email', 'github', 'school', 'age', 'grade', 'gender', 'food', 'skills')";
//        VALUES ($fName, $lName, $email, $github, $school, $age, $grade, $gender, $food, $skills)";
        // use exec() because no results are returned
        $db->exec($sql);
        
        return true;
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
?>