<?php
#Makes sure their is a user with this name and password
		function clarify($userName, $userPassword){
			global $db;

			$confirmQuery = $db->prepare('SELECT Salt FROM User WHERE UserName = ?');
			$confirmQuery->bindValue(1, $userName);

			$confirmQuery->execute();
			$confirmQuery = $confirmQuery->fetch();

			$hash = hash("sha256", $userPassword . $confirmQuery['Salt']);
			$query = $db->prepare('SELECT UserId FROM User WHERE UserName = ? AND UserPassword = ?');
			$query->bindValue(1, $userName);
			$query->bindValue(2, $hash);

			$query->execute();

			$num = $query->rowCount();
			$id = $query->fetch();

			return array($num, $id);
		}

?>