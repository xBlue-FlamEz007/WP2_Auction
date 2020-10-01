<?php
$fname = $lname = $email = $password = $confirm_password = '';
	$errors = array('fname' => '', 'lname' => '', 'email' => '', 'password' => '', 'confirm_password' => '');

	if(isset($_POST['submit'])){


		if(empty($_POST['fname'])){
			$errors['fname'] = 'First Name is required';
		} else{
			$fname = $_POST['fname'];
			if(!preg_match("/^([a-zA-Z']+)$/",$_POST['fname'])){
        $errors['fname'] = 'First Name must be valid';
      }
		}

    if(empty($_POST['lname'])){
			$errors['lname'] = 'Last Name is required';
		} else{
			$lname = $_POST['lname'];
			if(!preg_match("/^([a-zA-Z']+)$/",$_POST['lname'])){
        $errors['lname'] = 'Last Name must be valid';
      }
		}

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

    if (empty($_POST["confirm_password"])){
      $errors['confirm_password'] = 'Confirm password is required';
    }
    else {
      $confirm_password=  $_POST['confirm_password'];
      if($_POST['password']!=$_POST['confirm_password']){
        $errors['confirm_password'] = 'Confirm password should match Password';
      }
    }

    if(!array_filter($errors)){
      header('Location: login.php');
    }

  }

?>

<!DOCTYPE html>
<html>

	<?php include('templates/header.php'); ?>

	<section class="container grey-text">
		<h4 class="center">Enter your details</h4>
		<form class="white" action="signup.php" method="POST">
			<label>First Name</label>
			<input type="text" name="fname" value="<?php echo htmlspecialchars($fname) ?>">
      <div class="red-text"><?php echo $errors['fname']; ?></div>
			<label>Last Name</label>
			<input type="text" name="lname" value="<?php echo htmlspecialchars($lname) ?>">
      <div class="red-text"><?php echo $errors['lname']; ?></div>
			<label>Email</label>
			<input type="email" name="email" value="<?php echo htmlspecialchars($email) ?>">
      <div class="red-text"><?php echo $errors['email']; ?></div>
      <label>Password</label>
			<input type="password" name="password" value="<?php echo htmlspecialchars($password) ?>">
      <div class="red-text"><?php echo $errors['password']; ?></div>
			<label>Confirm Password</label>
			<input type="password" name="confirm_password" value="<?php echo htmlspecialchars($confirm_password) ?>">
      <div class="red-text"><?php echo $errors['confirm_password']; ?></div>
			<div class="center">
				<input type="submit" name="submit" value="Submit" class="btn brand z-depth-0">
			</div>
		</form>
	</section>

	<?php include('templates/footer.php'); ?>

</html>
