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

<body>

	<div id="theme-toggle" class="theme" onclick="toggleTheme()">
		<svg viewBox="0 0 30 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g id="light-bulb" fill="#000000" fill-rule="nonzero"><path d="M25,15 C25,20 20,24.921875 20,30 L10,30 C10,25.078125 5,20 5,15 C5,9.4775 9.47757813,5 15,5 C20.5225,5 25,9.47757813 25,15 Z M18.75,35 L11.25,35 C10.5590625,35 10,35.5590625 10,36.25 C10,36.9409375 10.5590625,37.5 11.25,37.5 L11.4795312,37.5 C11.9946875,38.9550781 13.3692187,40 15.0000781,40 C16.6309375,40 18.0055469,38.9550781 18.520625,37.5 L18.75,37.5 C19.4409375,37.5 20,36.9409375 20,36.25 C20,35.5590625 19.4409375,35 18.75,35 Z M18.75,31.25 L11.25,31.25 C10.5590625,31.25 10,31.8090625 10,32.5 C10,33.1909375 10.5590625,33.75 11.25,33.75 L18.75,33.75 C19.4409375,33.75 20,33.1909375 20,32.5 C20,31.8090625 19.4409375,31.25 18.75,31.25 Z" id="bulb"></path><path d="M1.38429688,8.58398438 L2.63429688,6.41601562 L4.8853125,7.71734375 C4.39703125,8.39359375 3.9746875,9.11132812 3.62796875,9.87796875 L1.38429688,8.58398438 Z M16.25,2.62695312 C15.8325,2.58304687 15.4296875,2.5 15,2.5 C14.5703125,2.5 14.1675,2.58304687 13.75,2.62695312 L13.75,0 L16.25,0 L16.25,2.62695312 Z M9.87796875,3.62796875 C9.11132812,3.97460938 8.39359375,4.39695313 7.71726563,4.8853125 L6.41601562,2.63429688 L8.58398438,1.38429688 L9.87796875,3.62796875 Z M28.6157031,8.58398438 L26.3744531,9.87789062 C26.0278125,9.11132812 25.6029688,8.39351562 25.1146875,7.71726563 L27.3657031,6.41601562 L28.6157031,8.58398438 Z M23.5815625,2.63429688 L22.2826563,4.88289062 C21.6088281,4.39703125 20.8885938,3.9746875 20.1244531,3.62796875 L21.4184375,1.38429688 L23.5815625,2.63429688 Z M2.5,15 C2.5,15.4248437 2.58304687,15.835 2.631875,16.25 L0,16.25 L0,13.75 L2.62695312,13.75 C2.58304687,14.1675 2.5,14.5703125 2.5,15 Z M27.3730469,13.75 L30,13.75 L30,16.25 L27.368125,16.25 C27.4170312,15.835 27.5,15.4248437 27.5,15 C27.5,14.5703125 27.4169531,14.1675 27.3730469,13.75 Z M25.3198438,22.3999219 C25.6884375,21.6454688 26.0303125,20.88375 26.3452344,20.1074219 L28.6157813,21.4160156 L27.3657813,23.5815625 L25.3198438,22.3999219 Z M1.38429687,21.4160156 L3.64507812,20.1122656 C3.95507812,20.8886719 4.296875,21.6552344 4.663125,22.4121094 L2.63429687,23.5815625 L1.38429687,21.4160156 Z" id="light"></path></g></g></svg>
	</div>

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
