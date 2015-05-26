<?php require_once ("./includes/session.php"); ?>
<?php require_once ("./includes/functions.php"); ?>

<div id="main">
	<div id="navigation">
		&nbsp;
	</div>
	<div id="page">
		<h2>Admin Menu</h2>
		<p>Welcome to the admin area, <?php echo htmlentities($_SESSION["username"]); ?>.</p>
	</div>
</div>
