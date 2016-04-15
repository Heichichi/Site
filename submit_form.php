<?php 
	    # basic pdo connection (with added option for error handling)
    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        if (!$_POST['firstname'] || !$_POST['lastname'] || !$_POST['position']) {
            echo '<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Please supply all of the data</div>';
            //exit;
        } else {
            try {        
                require('db.php');
                $STH = $conn->prepare("INSERT INTO user (firstname,lastname,position) VALUES (:firstname,:lastname,:position)");

                $STH->bindParam(':firstname', $_POST['firstname']);
                $STH->bindParam(':lastname', $_POST['lastname']);
                $STH->bindParam(':position', $_POST['position']);

                $STH->execute();

                $add_member = "show_message";
                setcookie('added_member',$add_member);
                echo "<meta http-equiv='refresh' content='0'>";
            } catch (PDOException $e) {
                echo $e->getMessage();
            }



        }
    }
        if(isset($_COOKIE["added_member"])) {
    echo '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Data submitted successfully</div>';
        setcookie('added_member', '', time()-60*60*24*365);
    }

    echo '<div class="collapse navbar-collapse">';
        echo '<form class="col-md-4 navbar-form" method="POST" action="">';
            echo '<div class="form-group">';
            echo '<label class="sr-only" for="firstname">Firstname:</label> <input type="text" class="form-control" name="firstname" placeholder="Firstname"><br />';
            echo '<label class="sr-only" for="lastname">Lastname:</label> <input type="text" class="form-control" name="lastname" placeholder="Lastname"><br />';
            echo '<label class="sr-only" for="position">Position:</label> <input type="text" class="form-control" name="position" placeholder="Position"><br />';
        	echo '<input type="submit" class="btn btn-default" value="Submit"></form>';
        echo '</div>';
    echo '</div>';



    # close the connection  
    $DBH = null;



?>