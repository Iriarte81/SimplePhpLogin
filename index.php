<?php require_once("./includes/session.php"); ?>
<?php require_once("./includes/db_connection.php"); ?>
<?php require_once("./includes/functions.php"); ?>
<?php require_once("./includes/validation_functions.php"); ?>

<?php $username="";

if (isset($_POST['submit'])) {

	$required_fields = array("username", "password");
	validate_presences($required_fields);

	if (empty($errors))  {

		$username = $_POST["username"];
		$password = $_POST["password"];

		$found_admin = attempt_login($username, $password);

		if ($found_admin) {

			$_SESSION["username"] = $found_admin["username"];

			redirect_to("admin.php");
		} else {

			echo "Username/password not found. Please try again.";
		}
	}
}


?>
<div id="main">
<div id="page">

<?php echo message(); ?>
<?php echo form_errors(); ?>

<h2>Login</h2>
<p> Login with Username: LoginSystem </p>
<p> Login with password: secret </p>

<form action="index.php" method="post">
	<p>Username:
		<input type="text" name="username" value="<?php echo htmlentities($username); ?>" />
	</p>
	<p>Passowrd:
		<input type="password" name="password" value="" />
	</p>
		<input type="submit" name="submit" value="Submit" />
	</form>
</div>
</div>

