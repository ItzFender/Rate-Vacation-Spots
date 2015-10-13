<?php
session_start();
require('../models/database.php');
require('../models/login_db.php');
require('../models/registration_db.php');
require('../models/vacation_spot_db.php');

if(isset($_POST['action'])){
	$action = $_POST['action'];
} else if(isset($_GET['action'])){
	$action = $_GET['action'];
}else{
	$action = 'log_reg';
}

if($action == 'log_reg'){
	$vacation_spots = get_vacation_spots();
	include('log_reg.php');
}else if($action == 'login'){
	if(isset($_POST['log_user_name'], $_POST['log_password'])){
		$log_user_name = $_POST['log_user_name'];
		$log_password = $_POST['log_password'];

		if(empty($log_user_name) or empty($log_password)){
			$error = 'All fields are required';
			header('Location: index.php?action=log_reg&error='.$error);
		}else{
			list($num, $id) = clarify($log_user_name, $log_password);
			if($num == 1){
				$_SESSION['logged_in'] = true;
				$_SESSION['user'] = $id['UserId'];

				header('Location: ../vacation_spots');
				exit();
				
			}else{
				$error = "Your information is incorrect!";
				header('Location: index.php?action=log_reg&error='.$error);
			}
		}	

	} else {
		$error = "All fields are required!";
		header('Location: index.php?action=log_reg&error='.$error);
	}
}else if($action == 'register'){
	
	$regEmail = $_POST['regEmail'];
	$regUserName = $_POST['regUserName'];
	$regPassword = $_POST['regPassword'];

	if(empty($regEmail) or empty($regUserName) or empty($regPassword)){
		$error = 'All fields are required';
		header('Location: index.php?action=log_reg&error='.$error);
	}else{
		$checkedName = check_user_name($regUserName);

		if($checkedName == 0){
			add_user($regUserName, $regPassword, $regEmail);
			$success = 'Congradulations you just made an accound, you can now use it to log in!';
			header('Location: index.php?action=log_reg&success='.$success);
		}else {
			$error ='User already exists';
			header('Location: index.php?action=log_reg&error='.$error);
		}
	}
	
}else if($action == 'logout'){
	session_start();
	session_destroy();
	header('Location: ../vacation_spots');
}