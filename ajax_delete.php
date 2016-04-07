<?php


if (isset($_POST['action'])) {
            delete();
}

function delete() {
	//Create the connection
    require('db.php');
    //SQL statement
    $sql = "DELETE FROM user WHERE id=1";
     // use exec() because no results are returned
    $conn->exec($sql);
    echo "Record deleted successfully";
}


?>