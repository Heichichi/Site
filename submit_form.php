<?php 
	    # basic pdo connection (with added option for error handling)
    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        if (!$_POST['firstname'] || !$_POST['lastname'] || !$_POST['position']) {
            echo "<p>Please supply all of the data!</p>";
            exit;
        } else {
            try {        
                require('db.php');
                $STH = $conn->prepare("INSERT INTO user (firstname,lastname,position) VALUES (:firstname,:lastname,:position)");

                $STH->bindParam(':firstname', $_POST['firstname']);
                $STH->bindParam(':lastname', $_POST['lastname']);
                $STH->bindParam(':position', $_POST['position']);

                $STH->execute();

            } catch (PDOException $e) {
                echo $e->getMessage();
            }
            echo "<p>Data submitted successfully</p>";
        }
    }

    echo '<form method="POST" action="">';
    echo 'Firstname: <input type="text" name="firstname"><br />';
    echo 'Lastname: <input type="text" name="lastname"><br />';
    echo 'Position: <input type="text" name="position"><br />';
	echo '<input type="submit" value="Do-It"></form>';



    # close the connection  
    $DBH = null;



?>