<?php
function get_vacation_spots(){
	global $db;
	$query = 'SELECT * FROM VacationSpots';
	$vacation_spots = $db->query($query);
	
	return $vacation_spots;
}

function get_vacation_spot($vacation_spot_id){
	global $db;
	$query =  $db->prepare('SELECT * FROM VacationSpots WHERE VacationSpotId = ?');
	$query->bindValue(1, $vacation_spot_id);
	$query->execute();

	return $query->fetch();
}

?>