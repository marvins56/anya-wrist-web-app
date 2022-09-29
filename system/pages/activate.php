<?php
	// Connect to database
	include('database.php');
	// Check if id is set or not if true toggle,
	// else simply go back to the page
	if (isset($_GET['id'])){
		// Store the value from get to a
		// local variable "course_id"
		$bracelet_id = $_GET['id'];
		// SQL query that sets the status
		// to 1 to indicate activation.
		$sql="UPDATE `users` SET
			`status`=1 WHERE id='$bracelet_id'";
		// Execute the query
        $res = mysqli_query($conn,$sql);
        if($res){
            echo('staus changed');
        }else{
            echo('error updating status');
        }
	}
	// Go back to course-page.php
	header('location: dashboard.php');
?>