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

// 2. Perform database query
	$query = "Select * From subjects";
					or
		//Assembling a query techique
	$query  = "Select * ";
	$query .= "From subjects ";
	$query .= "Where visible = 1 ";
	$query .= "Order by positiob ASC"

	$result = mysqli_query($connection, $query);  // $result is goint to be special kind of object called resource. Resource is collection of database rows


	
	//test if the query succeed or not
	if (!$rezult) {
		die("Database query failed.")  //Faileure is not the same thing as not getting any rows back. Bad syntax will give you a failure.
	}		 
?>	
// 3. Use return data(if any)
	// Use the while to loop through all rows that will return to us
<body>
	<?php 
		while($row = mysqli_fetch_row($result)) { // go get the first row from rezult set and assign it to $row. While mysqli_fetch_row is still able to something 
												// back and assign it to row then do while loop. Fetching the row increments the array pointer for us. 
												// Php doesnt have ability to increment the array pointer using simple php loop, becouse it is not a php array it is a mysql resault set. 
												// it is different. mysqli_fetch_row() will increment the array pointer for us. We dont have to do it, all we have to do is just fetch
												// You cant use foreach(mysqli_fetch($rezult) rows as row)  becouse that is going to try increment the pointer at the end. 
												//	Only way to do this  is using syntax while.
		// output data from each raw
		var_damp($);  // dump the output of each row
		echo "<hr />"	
		}	 
			 Or

		while($row = mysqli_fetch_assoc($result)) {
			echo $row["id"] . "<br />";
			echo $row["menu_name"] . "<br />";
			echo $row["position"] . "<br />";
			echo $row["visible"] . "<br />";
			echo "<hr />";
		}
	?>
			OR
	<ul>
	
		<?php while($subject = mysqli_fecth_assoc($result)) { ?>
			<li><?php echo $subjects["menu_name"] . " (" . $subject["id"] . ")"; ?></li>
	<?php } ?>
	
	</ul>


	<?php
// 4. Release returned data
		
		mysqli_free_result($result);
	?>

<body>


	<?php
// 5. Close database connection 
		mysqli_close($connection);

	?>

// Retreaving data from a query result

	There is four ways to retrieving data from a result set

	1. mysql_fetch_row -> Brings back a row of data and assign it to a standard array. 
						The Keys for each one of these columns are gona be integers.

	2. mysqli_fetch_assoc -> The result is going to be returned in an associative array
							The Keys gonna be the column names. This version is most convenient to use.

	3. mysqli_fetch_array -> The result will return  either standard array or an associative array
							 or both. MYSQL_NUM, MYSQL_ASSOC, MYSQL_BOTH(will made dataset and memory much larger)
	4. mysqli_fetch_object