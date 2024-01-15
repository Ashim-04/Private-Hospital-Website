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
		require('./connection2.php');

		if (isset($_GET['Doctor'])) {
			$Doctor=$_GET['Doctor'];
			$query="SELECT * FROM crudtable WHERE Doctor='$Doctor'";
			$result=mysqli_query($con,$query);
			if (mysqli_num_rows($result)>0) {
				$row=mysqli_fetch_assoc($result);
			}else {
				$row="";
			}
			if (isset($_POST['update'])) {
			$doctor=$_POST['doctor'];
			$specialization=$_POST['specialization'];
			$aDays=$_POST['aDays'];
			$time=$_POST['time'];
		    $query="UPDATE crudtable SET doctor='$doctor', specialization='$specialization', AvailableDays='$aDays', time='$time' WHERE Doctor='$Doctor'";
			$result=mysqli_query($con,$query);
			if ($result) {
				echo 'Updated!';
				header('location:maineditschedule.php');
			}else {

			echo 'Not Updated!';
		    }

		}
	}
	?>
	<div class="form">
		<div class="title">
			<p>Edit Doctor Schedules</p>
		</div>
		<form action="" method="post">
			<input type="text" name="doctor" placeholder="Doctor" value="<?php if (isset($row)) {
				echo $row['Doctor'];
			}?>">
			<input type="text" name="specialization" placeholder="Specialization" value="<?php if (isset($row)) {
				echo $row['Specialization'];
			}?>">
			<input type="text" name="aDays" placeholder="Available Days" value="<?php if (isset($row)) {
				echo $row['AvailableDays'];
			}?>">
			<input type="text" name="time" placeholder="Time" value="<?php if (isset($row)) {
				echo $row['Time'];
			}?>">
			<input class="add-schedule blue-btn" type="submit" name="update" value="UPDATE">
			<a href="maineditschedule.php" class="edit-btn blue-btn">View Schedule</a>
		</form>
	</div>
</body>
</html>