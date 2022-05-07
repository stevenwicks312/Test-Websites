<?php

	include 'dbconnect.php';

	$make = $_POST['make'];
	$model = $_POST['model'];
	$year = $_POST['year'];
	$mileage = $_POST['mileage'];
	$price = $_POST['price'];
	$email = $_POST['email'];
	$image = $_POST['image'];

	//Check connection

	if (isset($_POST['Submit'])) {
		//add logic to check the db and enter
		//the data into the entries table
		$query ="INSERT INTO listing (make,model,year,mileage,price,contact,image) VALUES('$make','$model','$year','$mileage','$price','$email',$image)";
		mysqli_query($conn, $query);

	}


	$last_id = mysqli_insert_id($conn);

	mysqli_close($conn);
	header("Location: postListing.php?msg=thankyou&last_id=" . $last_id);


?>