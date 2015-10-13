<?php

#Checks to see if userName is already in data base
		function check_user_name($userName){
			global $db;

			$query = $db->prepare('SELECT * FROM User WHERE UserName = ?');
			//bindValue(peram number, variable)
			$query->bindValue(1, $userName);

			$query->execute();

			$num = $query->rowCount();
			return $num;
		}
		
#Adds the user to the database with a hash password
		function add_user($userName, $userPassword, $userEmail){
			global $db;

			define("MAX_LENGTH", 6);

			$intermediateSalt = md5(uniqid(rand(), true));
			$salt = substr($intermediateSalt, 0, MAX_LENGTH);
			$cryptPassword = hash("sha256", $userPassword . $salt);

			$query = $db->prepare('INSERT INTO User (UserName, UserPassword, Salt, UserEmail) VALUES (?,?,?,?)');
			$query->bindValue(1, $userName);
			$query->bindValue(2, $cryptPassword);
			$query->bindValue(3, $salt);
			$query->bindValue(4, $userEmail);

			$query->execute();
		}

	

?>