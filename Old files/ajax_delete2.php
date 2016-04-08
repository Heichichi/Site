<?php
if (isset($_POST['action'])) {
            delete();
}



function delete() {
    try {
	    require('db.php');
	    //Retrieve ID for users
	    $sql_id = "SELECT id, firstname, lastname, position FROM user";
	    foreach($conn->query($sql_id) as $row) {
	    	print $row['id'] . ' - ' . $row['id'] . ' - ' . $row['firstname'] . ' - ' . $row['lastname'] . ' - ' . $row['position'];
	    }
	}
	catch(PDOException $e) {
	    echo "Error: " . $e->getMessage();
	}

    $conn = null;


}
?>