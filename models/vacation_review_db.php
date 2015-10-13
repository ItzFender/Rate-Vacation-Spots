<?php
function get_reviews($vacation_spot_id){
	global $db;

	$query = $db->prepare('SELECT * FROM VacationReview WHERE VacationSpotId = ?');
	$query->bindValue(1, $vacation_spot_id);
	$query->execute();
	$reviews = $query->fetchAll();

	return $reviews;
}

function add_review($review, $vacation_spot_id, $user_id){
	global $db;

	$query = $db->prepare('INSERT INTO VacationReview (Review, PostDate, VacationSpotId, UserID) VALUES (?, ?, ?, ?)');

	$query->bindValue(1, $review);
	$query->bindValue(2, time());
	$query->bindValue(3, $vacation_spot_id);
	$query->bindValue(4, $user_id);

	$query->execute();
}

function delete_review($review_id){
	global $db;
	$query = $db->prepare('DELETE FROM VacationReview WHERE ReviewId = ?');
	$query->bindValue(1, $review_id);

	$query->execute();
}

function update_review($review_id, $review){
	global $db;

	$query = $db->prepare('UPDATE VacationReview SET Review = ? WHERE ReviewId = ?');
	$query->bindValue(1, $review);
	$query->bindValue(2, $review_id);
	$query->execute();
}

function get_user($user_id){
	global $db;

	$query = $db->prepare("SELECT UserName FROM User WHERE UserId = ?");
	$query->bindValue(1, $user_id);
	$query->execute();
	$query = $query->fetch();
	$user = $query['UserName'];

	return $user;
}

function get_review($review_id){
	global $db;

	$query = $db->prepare('SELECT * FROM VacationReview WHERE ReviewId = ?');
	$query->bindValue(1, $review_id);
	$query->execute();
	$review = $query->fetch();

	return $review;
}

?>