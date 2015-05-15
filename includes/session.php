<?php 

session_start();

function errors() {
	if (isset($_SESSION["errors"])) {
		$errors = $_SESSION["errors"];

		$_SESSION["errors"] = NULL;

		return $errors;
	}
}