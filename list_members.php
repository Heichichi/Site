<?php
	//List members
	echo "<div class='table-responsive'><table class='table table-striped'>";
	echo "<tr><th>Delete</th><th>Id</th><th>Firstname</th><th>Lastname</th><th>Position</th></tr>";

    try {
	    require('db.php');
	    //Retrieve ID for users
	    $sql_id = "SELECT id, firstname, lastname, position FROM user";
	    foreach($conn->query($sql_id) as $row) {
	    	echo '<tr><td><input class="delete" type="submit" name=' . $row['id'] . ' value="X">' . '</td><td>' . $row['id'] . '</td><td>' . $row['firstname'] . '</td><td>' . $row['lastname'] . '</td><td>' . $row['position'] . "</td></tr>";
	    }
	}
	catch(PDOException $e) {
	    echo "Error: " . $e->getMessage();
	}

    $conn = null;
    echo "</table>";
?>