<?php
session_start();
require('../models/database.php');
require('../models/vacation_spot_db.php');
require('../models/vacation_review_db.php');
require('../models/sanitize.php');

if(isset($_POST['action'])){
	$action = $_POST['action'];
} else if(isset($_GET['action'])){
	$action = $_GET['action'];
}else{
	$action = 'list_vacation_spots';
}


if($action == 'list_vacation_spots'){

	$vacation_spots = get_vacation_spots();
	include('main.php');

} else if($action == 'view_vacation_spot'){

	$vacation_spots = get_vacation_spots();
	$vacation_spot_id = $_GET['vacation_spot_id'];
	$vacation_spot = get_vacation_spot($vacation_spot_id);
	$reviews = get_reviews($vacation_spot_id);

	foreach ($reviews as &$review) {
		$name = get_user($review['UserId']);
		$review['User'] = $name;
	}
	unset($review);

	$vacation_spot_name = $vacation_spot['VacationSpot'];
	$vacation_description = $vacation_spot['VacationDescription'];
	$vacation_spot_reviews = get_reviews($vacation_spot_id);

	include('vacation_spot_view.php');

} else if($action == 'show_add_review_form'){

	$vacation_spots = get_vacation_spots();
	$vacation_spot = get_vacation_spot($_POST['vacation_spot_id']);
	
	include('review_add_form.php');

}else if($action == 'add_review'){

	$vacation_spots = get_vacation_spots();

	$review = nl2br($_POST['review']);
	$cleanHTML = sanitize_html_string($review);
	$vacation_spot_id = $_POST['vacation_spot_id'];
	$user_adding = $_SESSION['user'];

	if (empty($cleanHTML)){
		$error = 'You must type a Review first.';
	}
	else {
		add_review($cleanHTML, $vacation_spot_id, $user_adding);
		
		header('Location: index.php?action=view_vacation_spot&vacation_spot_id='.$vacation_spot_id);
	}
	
} else if($action == 'delete_review'){

	$review_id = $_POST['review_id'];
	$vacation_spot_id = $_POST['vacation_spot_id'];
	delete_review($review_id);


	header('Location: index.php?action=view_vacation_spot&vacation_spot_id='.$vacation_spot_id);

} else if($action == 'show_edit_review_form'){

	$vacation_spots = get_vacation_spots();
	$vacation_spot = get_vacation_spot($_POST['vacation_spot_id']);
	$review = get_review($_POST['review_id']);
	include('review_edit_form.php');

} else if($action == 'edit_review'){
	$review = nl2br($_POST['review']);
	$cleanHTML = sanitize_html_string($review);
	$review_id = $_POST['review_id'];
	$vacation_spot_id = $_POST['vacation_spot_id'];

	update_review($review_id, $review);
	header('Location: index.php?action=view_vacation_spot&vacation_spot_id='.$vacation_spot_id);
}

?>