<?php

//Delete one
if (isset($_POST['delete'])) {
            delete($_POST['delete']);
}

function delete($id) {
	//Create the connection
    require('db.php');
    //SQL statement for deletion 
    $sql_delete = "DELETE FROM user WHERE id= '" . $id . "'";
     // use exec() because no results are returned
    $conn->exec($sql_delete);

}
//Delete all
if (isset($_POST['delete_all'])) {
            delete_all($_POST['delete_all']);
}
function delete_all($id) {
	//Create the connection
    require('db.php');
    //SQL statement for deletion 
    $sql_delete = "DELETE FROM user";
     // use exec() because no results are returned
    $conn->exec($sql_delete);

}
?>