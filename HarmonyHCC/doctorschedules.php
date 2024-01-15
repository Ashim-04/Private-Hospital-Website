<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE-edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="images/logoicon.png" type="image/x-icon">
	<link rel="stylesheet" href="./doctorschedules.css">
	<title>Edit Doctor Schedules</title>
</head>
<body>
	<?php
		require('./connection.php');
		if (isset($_POST['add_button'])) {
			$doctor=$_POST['doctor'];
			$specialization=$_POST['specialization'];
			$aDays=$_POST['aDays'];
			$time=$_POST['time'];
		   if (!empty($_POST['doctor']) && !empty($_POST['specialization']) && !empty($_POST['aDays']) && !empty($_POST['time'])) {
		   	$p=crud::connect()->prepare('INSERT INTO crudtable(Doctor, Specialization, AvailableDays, Time) VALUES(:d, :s, :a, :t)');
			$p->bindValue(':d', $doctor);
			$p->bindValue(':s', $specialization);
			$p->bindValue(':a', $aDays);
			$p->bindValue(':t', $time);
			$p->execute();
			echo 'Successfully Updated!';
		   }

		}
	?>
	<div class="form">
		<div class="title">
			<p>Add new Schedule</p>
		</div>
		<form action="" method="post">
			<input type="text" name="doctor" placeholder="Doctor">
			<input type="text" name="specialization" placeholder="Specialization">
			<input type="text" name="aDays" placeholder="Available Days">
			<input type="text" name="time" placeholder="Time">
			<input class="add-schedule blue-btn" type="submit" name="add_button" value="Add Schedule">
			<a href="maineditschedule.php" class="edit-btn blue-btn">View Schedule</a>
		</form>
	</div>
</body>
</html>