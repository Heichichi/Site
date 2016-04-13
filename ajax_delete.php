<?php


if (isset($_POST['action'])) {
            delete($_POST['action']);
}



function delete($id) {
	//Create the connection
    require('db.php');
    //SQL statement for deletion 
    $sql_delete = "DELETE FROM user WHERE id= '" . $id . "'";
     // use exec() because no results are returned
    $conn->exec($sql_delete);
    echo "Record deleted successfully";

}
?>