<?php
	echo "<div class='table-responsive'><table class='table table-striped'>";
	echo "<tr><th>Delete</th><th>Id</th><th>Firstname</th><th>Lastname</th><th>Position</th></tr>";

	class TableRows extends RecursiveIteratorIterator { 
	    function __construct($it) { 
	        parent::__construct($it, self::LEAVES_ONLY); 
	    }

	    function current() {
	        return "<td>" . parent::current(). "</td>";
	    }

	    function beginChildren() { 
	        echo "<tr>"; 
	    } 

	    function endChildren() { 
	        echo "</tr>" . "\n";
	    } 
	}
	
	try {
		require('db.php');
	    $stmt = $conn->prepare("SELECT id, firstname, lastname, position FROM user"); 
	    $stmt->execute();

	    // set the resulting array to associative
	    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
	    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { 
	        echo $v;
	    }
	}
	catch(PDOException $e) {
	    echo "Error: " . $e->getMessage();
	}
	$conn = null;
	echo "</table>";
?>