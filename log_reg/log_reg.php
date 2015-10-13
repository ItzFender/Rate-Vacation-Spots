<?php 
if(isset($_GET['error'])){
	$error = $_GET['error'];
}
if(isset($_GET['success'])){
	$success = $_GET['success'];
}
include '../view/header.php'; ?>
<div id="main">	
	<?php include '../view/sidebar.php'; ?>
	<div id="content">
	<?php if (isset($error)) { ?>
		<small style="color:#aa0000;"><?php echo $error; ?></small>
		<br />
	<?php } ?>
	<?php if (isset($success)) { ?>
		<small style="color:#00aa00;"><?php echo $success; ?></small>
		<br />
	<?php } ?>

		<form class="form-container" action="index.php" method="post">
			<div class="form-title"> <h4>Log In</h4> </div>
			<div class="form-title">User Name </div>
			<input class="form-field" type="text" name="log_user_name" placeholder="UserName" /><br />
			<div class="form-title">Password </div>
			<input class="form-field" type="password" name="log_password" placeholder="Password" /><br />
			<input type="hidden" name="action" value="login" />
			<input class="submit-button" type="submit" id="log_submit" value="Login" />
		</form>
		<br />
		
		<form class="form-container" action="index.php" method="post">
			<div class="form-title"><h4>Register</h4></div>
			<div class="form-title">E-mail </div>
			<input class="form-field" type="email" name="regEmail" placeholder="user@domain.com" /><br />
			<div class="form-title">User Name </div>
			<input class="form-field" type="text" name="regUserName" placeholder="UserName" /><br />
			<div class="form-title">Password </div>
			<input class="form-field" type="password" name="regPassword" placeholder="Password" /><br />
			<input type="hidden" name="action" value="register" />
			<input class="submit-button" type="submit" id="regSubmit" value="Register" />
		</form>
		<br />
	<a href="javascript:javascript:history.go(-1)">back</a>
</div>
</div>
<?php include '../view/footer.php'; ?>