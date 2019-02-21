<?php
// ========================================================
// Set The default timezone to GTM London - change this acording your own timezone
// ========================================================
$timeZone = 'Europe/London';
date_default_timezone_set($timeZone);
?>
<!DOCTYPE html>
<html lang="en">

<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Smart SandBox</title>
		<script type="text/javascript">
				// creates a holding array for the list folders
				var list = [];

				// ========================================================
				// Search at root level for any folder and loops through each folder converting all characters
				// to lower case before pushing to the list array - if you get errors here make sure that apache
				// has the right access permitions to the root folder
				// ========================================================
				<?php $folders = glob("*"); foreach ($folders as $folder){ if(is_dir($folder)){$folder = strtolower($folder); ?>
					var obj = {};
					obj.name = "<?php echo $folder ?>";
					obj.date = "<?php echo date ("ymd", filemtime($folder)); ?>";
					obj.datePreaty = "<?php echo date ("d-m-y", filemtime($folder)); ?>";
					list.push(obj);
				<?php }} ?>
		</script>
		<link rel="stylesheet" href="css/style.css">
</head>

<body class="light">

	<div class="theme"></div>

	<div class="header">
			<div class="inner">
					<div class="content">
						<h1>Smart Sandbox</h1>
						<p>Smart way of organizing your sandbox/root folder with dynamic search capabilities.</p>
					</div>
			</div>
	</div>

	<div class="search-wrapper">
			<div class="inner">
					<input id="search" type="text" name="search" placeholder="Search your Projects..." onchange="searchProjects()" />
			</div>
	</div>

	<div class="list">
		<div class="sort">sort: <a href="#0" onclick="orderByName()">a-z</a> <a href="#0" onclick="orderByDate()">date</div></a>
		<div class="list-inner">
			<ul id="list"></ul>
		</div>
	</div>

	<footer>
		<div class="inner">
			<p>&copy; <?php echo date("Y"); ?>, created with <span>&hearts;</span> by <a href="http://marioduarte.co.uk" target="_blank">Mario Duarte</a> to the dev comunity.</p>
			<p><a href="" target="_blank"></a><p>
		</div>
	</footer>

	<script src="js/app.js" charset="utf-8"></script>

</body>
</html>
