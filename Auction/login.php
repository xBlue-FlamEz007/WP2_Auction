<?php
$email = $password = '';
	$errors = array('email' => '', 'password' => '');

	if(isset($_POST['submit'])){


    if(empty($_POST['email'])){
			$errors['email'] = 'An email is required';
		} else{
			$email = $_POST['email'];
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				$errors['email'] = 'Email must be a valid email address';
			}
		}

    if (empty($_POST["password"])){
      $errors['password'] = 'Password is required';
    }
    else {
      $password=  $_POST['password'];
    }

    if(!array_filter($errors)){
      header('Location: home.php');
    }

  }

?>

<!DOCTYPE html>
<html>

	<?php include('templates/header.php'); ?>

	<section class="container grey-text">
		<h2 class="brand-logo brand-text center">Login</h2><br>
		<h4 class="center">Enter your details</h4>
		<form class="white" action="login.php" method="POST">
			<label>Email</label>
			<input type="email" name="email" value="<?php echo htmlspecialchars($email) ?>">
      <div class="red-text"><?php echo $errors['email']; ?></div>
      <label>Password</label>
			<input type="password" name="password" value="<?php echo htmlspecialchars($password) ?>">
      <div class="red-text"><?php echo $errors['password']; ?></div>
			<div class="center">
				<input type="submit" name="submit" value="Submit" class="btn brand z-depth-0">
			</div>
		</form>
	</section>

	<?php include('templates/footer.php'); ?>

</html>
