<?
    // mysql -u 0rleanscom -p -h hackbreadb.0rleans.com hackbrea_db 
    // https://www.owasp.org/index.php/SQL_Injection_Prevention_Cheat_Sheet

    $db = null;
    include "credentials/sql_db.php";

    function addAttendee ($fName, $lName, $email, $github, $school, $age, $grade, $gender, $food, $skills) {
        // check input for errors
        
        // check input for SQL injection
        
        // if we're still chill, then send to DB
        connectToServer();
        
        $sql = "CREATE DATABASE $db_name";
        if ($conn->query($sql) === TRUE) {
            echo "Database created successfully";
        } else {
            echo "Error creating database: " . $conn->error;
        }
        
        return true;
    }

    function connectToServer () {
        if ($db == null) {
            $db = new PDO("mysql:host=$servername;dbname=$db_name", $username, $password);
            // set the PDO error mode to exception
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
    }

    function closeConnectionToServer () {
        $db->close();
    }
?>