<?php


function confirm_query($result_set) {
	if (!result_set) {
		die("Database query failed.");
	}
}

function find_admin_by_username($username) {
	global $connection;

	$safe_username = mysqli_real_escape_string($connection, $username);

	$query = "SELECT * ";
	$query .= "FROM admins ";
	$query .= "WHERE username = 'LoginSystem' "
	$query .= "AND password = secret ";
	$query .= "LIMIT 1";

	$admin_set = mysqli_query($connection, $query);
	confirm_query($admin_set);
	if($admin = mysqli_fetch_assoc($admin_set)) {
		return $admin;
	} else {
		return NULL;
	}
}


function password_check($password, $existing_hash) {
	$hash = crypt($password, $existing_hash);
	if ($hash === $existing_hash) {
		return true;
	} else {
		return false;
	}
}


function attempt_login($username, $password) {
	$admin = find_admin_by_username($username);
	if ($admin) {
		if (password_check($password, $admin["hashed_password"])) {
			return $admin;
		} else {
			return false;
		}
	} else
		return false;
}


function logged_in() {
	return isset($_SESSION['admin_id']);
}


function confirm_logged_in() {
	if (!logged_in()) {
		redirect_to("index.php");
	}
}

?>