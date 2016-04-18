<?php 
	# basic pdo connection (with added option for error handling)
    if ($_SERVER['REQUEST_METHOD'] == "POST") {



        if (!$_POST['firstname'] || !$_POST['lastname'] || !$_POST['position']) {
            echo '<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Please supply all of the data</div>';
            //exit;
        }
         else {
            try {        
                require('db.php');
                $STH = $conn->prepare("INSERT INTO user (firstname,lastname,position) VALUES (:firstname,:lastname,:position)");

                $STH->bindParam(':firstname', $_POST['firstname']);
                $STH->bindParam(':lastname', $_POST['lastname']);
                $STH->bindParam(':position', $_POST['position']);

                // Include file upload functionality
                require("upload.php");

                $STH->bindParam(':fileToUpload', $target_file);
                

                if($error_message_upload == "") {
                    $STH->execute();
                    $add_member = "show_message";
                    setcookie('added_member',$add_member);
                    echo "<meta http-equiv='refresh' content='0'>";
                }
                else {
                    echo $error_message_upload;
                }
            } catch (PDOException $e) {
                echo $e->getMessage();
            }



        }
    }
        if(isset($_COOKIE["added_member"])) {
            echo '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Data submitted successfully</div>';
        //Clear the cookie
        setcookie('added_member', '', time()-60*60*24*365);
    }

    require("form.php");

    # close the connection  
    $DBH = null;



?>