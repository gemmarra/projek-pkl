<?php

	// Connect to database
	$con=mysqli_connect("localhost","root","","crud");

	// Check if id is set or not if true toggle,
	// else simply go back to the page
	if (isset($_GET['id'])){

		// Store the value from get to a
		// local variable "course_id"
		$petugas=$_GET['id'];

		// SQL query that sets the status
		// to 1 to indicate activation.
		$sql="UPDATE `petugas` SET
			`keterangan`= 0 WHERE id_petugas='$petugas'";

		// Execute the query
		mysqli_query($con,$sql);
	}

	// Go back to course-page.php
	return view('Petugas/list_petugas',$data);
?>
