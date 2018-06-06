<?php include('server.php'); ?>
<!DOCTYPE html>
<html>
<head>
   <title>User register</title>
   <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
      <h2> Register</h2>
  </div> 
  <form method="post" action="register.php">
  <!-- display validation errors here -->
  <?php include('errors.php');?>
  	<div class="input-group">
  	   <label>userName</label>
  	   <input type="text" name="username" value="<?php echo $username;?>">
  	</div>
  	<div class="input-group">
  	   <label>Email</label>
  	   <input type="text" name="email" value="<?php echo $email;?>">
  	</div>
  	<div class="input-group">
  	   <label>password</label>
  	   <input type="password" name="password_1">
  	</div>
  	<div class="input-group">
  	   <label>confirm password</label>
  	   <input type="password" name="password_2">
  	</div>
  	<div class="input-group">
  	   <button type="submit" name="register" class="btn">Register</button>
  	</div>
  	<p>
  		Already amember ?<a href="login.php">Sign in</a>
  	</p>
  </form>
</body>   
</html>