PHP Database Interaction in Five Steps

	1. Create a database connection

	2. Perform a database query

	3. Use returned data (if any)

	4. Release returned data 

	5. Close database connection

<?php

// 1. Create a database connection 
	$dbhost = "localhost";   	// it could be either ip addres, it could be domain
	$dbuser = "widget_cms";		// user that we connect our database with
	$dbpass = "secretpassword";
	$dbname = "widget_corp";	// database name
	$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname); //last argument $dbname is the key difference from the old mysql interface. 

?>	
<?php
	// Test if connection occuered 
	if(mysqli_connect_errno()) {
		die("Database connection failed: " .
			mysqli_connect_error() .
				" (" . mysql_connect_errno() . ")"
		);
	)
?>

<?php

// 2. PERFORM DATABASE QUERY
	// Often these are form values in $_POST
	$id = 5;
	$menu_name = "Edit me";
	$position = "4";
	$visible = "1"; // (1 for true)

	$query = "UPDATE subjects SET menu_name = '{menu_name}', position = {$position}, visible = {$visible} WHERE id = {$id}";
					OR
	$query  = "UPDATE subjects SET ";
	$query .= "menu_name = '{$menu_name}', ";
	$query .= "position = {$positon}, ";
	$query .= "visible = {$visible} ";   
	$query .= "WHERE id = {$id}";

	$result = mysqli_query($connection, $query); // in this case we asking database to do sometnih for us. 
												//Result in this case wont be record set its going to be true or false

	
	if ($result $$ mysqli_affected_rows($connection) == 1){ // mysqli_affected_rows will return number
													        // of rows that were affected by last change on the current connection($connection)
															// in this case we expacting to be 1 succeeded. If fails mysqli_affected_rows returns -1	
		// if we have result then we have Success
		// for example: redirect_to("somepage.php")
		echo "Success!";
		
	} else {
		// Failure
		// $message = "Subject update failed"
		die("Database query failed." . mysqli_error($connection));
	}		 

?>	
 

 <!DOCTYPE html>.

 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Document</title>
 </head>
 <body>
 	


 </body>
 </html>


	<?php
// 5. Close database connection 
		mysqli_close($connection);

	?>

mysqli_insert_id() -> it returns the id of the most recently inserted record on that connection
$id = mysqli_insert_id($connection);