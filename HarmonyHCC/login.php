<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE-edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="images/logoicon.png" type="image/x-icon">
	<link rel="stylesheet" href="./doctorschedules.css">
	<title>Login</title>
	<style>
		.form {
			width: 230px;
			height: 280px;
		}
	</style>
</head>
<body>
		<?php
			require('./connection.php');
			if (isset($_POST['login_button'])) {
				$_SESSION['validate']=false;
				$username=$_POST['username'];
				$password=$_POST['password'];
				$p=crud::connect()->prepare('SELECT * FROM credentials WHERE username=:u and pass=:p');
				$p->bindValue(':u', $username);
				$p->bindValue(':p', $password);
				$p->execute();
				$d=$p->fetchAll(PDO::FETCH_ASSOC);
				if ($p->rowCount()>0) {
					$_SESSION['username']=$username;
					$_SESSION['pass']=$password;
					$_SESSION['validate']=true;
					header('location:doctorschedules.php');
				}
				else {
					echo 'Incorrect login!';
				}
			}
		?>




	<div class="form">
		<div class="title">
			<p>Login</p>
		</div>
		<form action="" method="post">
			<input type="text" name="username" placeholder="Name">
			<input type="text" name="password" placeholder="Password">
			<input class="add-schedule blue-btn" type="submit" name="login_button" value="Login">
		</form>
	</div>
</body>
</html>