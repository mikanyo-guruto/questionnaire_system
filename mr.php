<!DOCTYPE HTML>
<html>
<head>
    <title>PDO</title>
  
</head>
<body>
<form  method="POST">
<input type="text" name="search"><input type="submit" value="search">
</form>
</body>

</html>

<?php
error_reporting(E_ALL & ~E_NOTICE);


// include database connection
include 'database.php';


 
// select all data
$query = "SELECT * from products,members where products.id=members.product_id and products.id=?";
$stmt = $con->prepare($query);

echo $_POST['search'];

$stmt->execute(array($_POST['search']));

// this is how to get number of rows returned
$num = $stmt->rowCount();


echo "<table class='table table-hover table-responsive table-bordered'>";//start table
     
        //creating our table heading
        echo "<tr>";
            echo "<th>ID</th>";
            echo "<th>Name</th>";
            echo "<th>overview</th>";
            echo "<th>genre</th>";
            echo "<th>value</th>";
	echo "<th>period</th>";
	echo "<th>img</th>";
	echo "<th>create_time</th>";
        echo "</tr>";
         
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            
            extract($row);
             
            // creating new table row per record

            $Id=$row['id'];
            $overview=$row['product_name'];
            $genre=$row['overview'];
	    $value=$row['genre'];
	    $period=$row['value'];
	    $period=$row['period'];
	    $img=$row['img'];
	    $create_time=$row['create_time'];
		
		

            
            echo "<tr>";
                echo "<td>{$Id}</td>";
                echo "<td>{$overview}</td>";
                echo "<td>{$genre}</td>";
		echo "<td>{$value}</td>";
		echo "<td>{$period}</td>";
		echo "<td>{$img}</td>";
		echo "<td>{$create_time}</td>";
		
            echo "</tr>";
        }
     
    // end table
    echo "</table>";




?>