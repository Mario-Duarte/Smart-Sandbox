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

		<style>
				html, body {
					margin: 0;
					padding: 0;
					font-family: helvetica, arial, sans-serif;
					background: rgb(249,249,249);
					background: -moz-linear-gradient(top,  rgba(249,249,249,1) 0%, rgba(221,221,221,1) 100%);
					background: -webkit-linear-gradient(top,  rgba(249,249,249,1) 0%,rgba(221,221,221,1) 100%);
					background: linear-gradient(to bottom,  rgba(249,249,249,1) 0%,rgba(221,221,221,1) 100%);
					filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f9f9f9', endColorstr='#dddddd',GradientType=0 );
				}

				a, p a {
					text-decoration: none;
					color: #3498db;
					transition: color 0.4s ease-in-out;
				}

				a:hover , a:focus {
					color: #2ecc71;
				}

				.header {
					width: 100%;
					height: auto;
					position: relative;
					background: rgb(52,152,219);
					background: -moz-linear-gradient(-45deg,  rgba(52,152,219,1) 0%, rgba(39,174,96,1) 100%);
					background: -webkit-linear-gradient(-45deg,  rgba(52,152,219,1) 0%,rgba(39,174,96,1) 100%);
					background: linear-gradient(135deg,  rgba(52,152,219,1) 0%,rgba(39,174,96,1) 100%);
					filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#3498db', endColorstr='#27ae60',GradientType=1 );
				}

				.header >.inner {
					position: relative;
					width: 100%;
					max-width: 960px;
					height: auto;
					text-align: center;
					padding: 80px 20px;
					margin: 0 auto;
					box-sizing: border-box;
					color: #EEEEEE;
				}

				.list {
					position: relative;
					width: 100%;
					margin: 0;
					display: inline-block;
				}

				.list >.list-inner {
					width: 100%;
					max-width: 960px;
					margin: 0 auto;
					box-sizing: border-box;
					padding: 60px 20px;
				}

				#list {
					width: 100%;
					max-width: 960px;
					height: auto;
					margin: 0 auto;
					padding: 0;
					display: flex;
					flex-direction: row;
					flex-wrap: wrap;
					justify-content: flex-start;
					align-items: stretch;
				}

				#list .single {
					position: relative;
					min-width: calc( 20% - 13px );
					list-style: none;
					float: left;
					margin: 5px;
					text-align: center;
					display: inline-block;
				}

				#list .single a {
					width: 100%;
					background: rgba(52,152,219,0.5);
					border-radius: 5px;
					border: 1px white dashed;
					display: inline-block;
					padding: 20px;
					box-sizing: border-box;
					text-decoration: none;
					font-weight: lighter;
					color: #EEEEEE;
					transition: all 0.4s ease-in-out;
				}

				#list .single a:hover,
				#list .single a:focus,
				#list .single a:visited {
					background: rgba(52,152,219,0.8);
					border: 1px white solid;
					color: #FFFFFF;
				}

				#list .row-divider {
					width: 100%;
					box-sizing: border-box;
					display: inline-block;
					text-transform: uppercase;
					font-size: 18px;
					font-weight: lighter;
					color: #999999;
					border-bottom: 1px dashed #CCCCCC;
					margin: 10px 0;
				}

				.search-wrapper {
					width: 100%;
					text-align: left;
					background-color: white;
				}

				.search-wrapper >.inner {
					max-width: 960px;
					padding: 20px 20px;
					width: 100%;
					margin: 0 auto;
					box-sizing: border-box;
					color: #999999;
					text-align: left;
				}

				#search {
					border: none;
					background-color: #FFFFFF;
					padding: 5px 10px;
					font-size: 14px;
					text-transform: uppercase;
					display: inline-block;
					box-sizing: border-box;
				}

				#search:focus {outline:0 !important;}

				footer {
					width: 100%;
					background-color: white;
					padding: 20px;
					box-sizing: border-box;
				}

				footer >.inner {
					width: 100%;
					max-width: 960px;
					margin: 0 auto;
					text-align: left;
				}

				footer >.inner p {
					font-size: 10px;
					color: #999999;
				}

				footer >.inner p span {
					color: #e74c3c;
				}

				@media all and (min-width: 320px) and (max-width: 424px) {

						#list .single {
								width: 100%;
								margin: 5px 0;
						}

						.search-wrapper {
								text-align: center;
						}

						#search {
								width: 100%;
						}

				}

				@media all and (min-width: 425px) and (max-width: 767px) {

						#list .single {
								min-width: calc( 50% - 13px );
						}

						#search {
								width: 80%;
						}

						.search-wrapper {
								text-align: center;
						}

				}

				@media all and (min-width: 768px) and (max-width: 960px) {

					#list .single {
							min-width: calc( 33.333333% - 13px );
					}

				}

		</style>

</head>
<body>

<div class="header">
		<div class="inner">
				<h1>Smart Sandbox</h1>
				<p>No place like 127.0.0.1</br>Here is a list of all your folders, cannot find your project? Try searching for it bellow.</p>
		</div>
</div>

<div class="search-wrapper">
		<div class="inner">
				<input id="search" type="text" name="search" placeholder="Search Projects..." onchange="searchProjects()" />
		</div>
</div>

<div class="list">
	<div class="list-inner">
		<ul id="list"></ul>
	</div>
</div>

<footer>
	<div class="inner">
		<p>&copy; <?php echo date("Y"); ?>, created with <span>&hearts;</span> by <a href="http://mariodesigns.co.uk" target="_blank">Mario Duarte</a> to all the dev's out there.</p>
	</div>
</footer>

<script>
		// creates a holding array for the list folders
		var list = [];

		// ========================================================
		// Search at root level for any folder and loops through each folder converting all characters
		// to lower case before pushing to the list array - if you get errors here make sure that apache
		// has the right file permitions
		// ========================================================
		<?php $folders = glob("*"); foreach ($folders as $folder){ if(is_dir($folder)){$folder = strtolower($folder); ?>
		list.push('<?php echo $folder ?>');
		list.sort();
		<?php }} ?>

		var listWrapper = document.getElementById('list');
		var arrayLength = list.length;
		// this array is used to store the first character of the last looped folder name to be used
		// to create the alphabetical dividers
		var arraySub = [];

		// Loop through the array and add the item to the list
		for (var i = 0; i < arrayLength; i++) {
			var listSubString = list[i].substring(0, 1);
			var lastSub = arraySub[arraySub.length-1];

			if ( listSubString != lastSub ) {
				listWrapper.innerHTML += "<li class='row-divider " + listSubString + "-row'>" + listSubString + "</li>";
			}

			arraySub.push(listSubString);
			listWrapper.innerHTML += "<li class='single'><a href='" + list[i] + "'>" + list[i] + "</a></li>";
		}

		// On every key press while writing on the search field, it performs a new search and updates
		// the displayed list without the alphabetical dividers
		document.getElementById('search').onkeypress = function (e) {
		searchProjects();
		};

		// Function to perform a search on the folder list
		function searchProjects() {

				var query = document.getElementById('search').value;
				var listWrapper = document.getElementById('list');
				var arrayLength = list.length;
				listWrapper.innerHTML = '';
				arraySub = [];

				for (var i = 0; i < arrayLength; i++) {
					var listSubString = list[i].substring(0, 1);
					var lastSub = arraySub[arraySub.length-1];

					// If search field is not empty perform the search, if it's empty show all folders by alphabetical
					// order by default
					if ( query != '' ) {
							if ( list[i] == query || list[i].indexOf(query) > -1 ) {
									listWrapper.innerHTML += "<li class='single " + listSubString + "-row'><a href='" + list[i] + "'>" + list[i] + "</a></li>";
							}
					} else {
						if ( listSubString != lastSub ) {
							listWrapper.innerHTML += "<li class='row-divider " + listSubString + "-row'>" + listSubString + "</li>";
						}
						listWrapper.innerHTML += "<li class='single " + listSubString + "-row'><a href='" + list[i] + "'>" + list[i]+ "</a></li>";
					}
					arraySub.push(listSubString);
				}

		}
</script>

</body>
</html>
