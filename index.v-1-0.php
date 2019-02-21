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
					background: #f9f9f9;
				}

				a, p a {
					text-decoration: none;
					color: #0984e3;
					transition: color 0.4s ease-in-out;
					cursor: pointer;
				}

				a:hover , a:focus {
					color: #ff7675;
				}

				.header {
					width: 100%;
					height: auto;
					position: relative;
					background: rgba(250, 177, 160,1.0);
					background: -moz-linear-gradient(-45deg,  rgba(250, 177, 160,1.0) 0%, rgba(116, 185, 255,1.0) 100%);
					background: -webkit-linear-gradient(-45deg,  rgba(250, 177, 160,1.0) 0%,rgba(116, 185, 255,1.0) 100%);
					background: linear-gradient(135deg,  rgba(250, 177, 160,1.0) 0%,rgba(116, 185, 255,1.0) 100%);
					filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#fab1a0', endColorstr='#74b9ff',GradientType=1 );
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
					padding: 40px 20px;
				}

				.list>.sort {
					width: 100%;
					max-width: 960px;
					margin: 0 auto;
					box-sizing: border-box;
					padding: 20px 20px 10px 20px;
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
					background: #74b9ff;
					border-radius: 5px;
					display: inline-block;
					padding: 15px 20px;
					box-sizing: border-box;
					text-decoration: none;
					font-weight: lighter;
					color: #EEEEEE;
					transition: all 0.4s ease-in-out;
				}

				#list .single a:hover,
				#list .single a:focus {
					background: #0984e3;
					color: #FFFFFF;
				}

				#list .single a:visited {
					background: #a29bfe;
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
					border-bottom: 1px dashed #0984e3;
					padding: 0 0 10px 0;
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
					width: auto;
					min-width: 320px;
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
				<p>There's no place like 127.0.0.1</p>
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
	</div>
</footer>

<script>
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
		list.push(obj);
		<?php }} ?>

		orderByName();

		// On every key press while writing on the search field, it performs a new search and updates
		// the displayed list without the alphabetical dividers
		document.getElementById('search').onkeypress = function (e) {
		searchProjects();
		};

		//function to order list by name
		function orderByName() {
			list.sort(compare);
			console.table(list);

			// sorting function for the object created above
			function compare(a,b) {
				if (a.name < b.name)
					return -1;
				if (a.name > b.name)
					return 1;
				return 0;
			}

			var listWrapper = document.getElementById('list');
			var arrayLength = list.length;
			// this array is used to store the first character of the last looped folder name to be used
			// to create the alphabetical dividers
			var arraySub = [];

			listWrapper.innerHTML= "";

			// Loop through the array and add the item to the list
			for (var i = 0; i < arrayLength; i++) {
				var listSubString = list[i]["name"].substring(0, 1);
				var lastSub = arraySub[arraySub.length-1];

				if ( listSubString != lastSub ) {
					listWrapper.innerHTML += "<li class='row-divider " + listSubString + "-row'>" + listSubString + "</li>";
				}

				arraySub.push(listSubString);
				listWrapper.innerHTML += "<li class='single' data-name='" + list[i]["name"] + "' data-last-modified='" + list[i]["date"] + "'><a href='" + list[i]["name"] + "'>" + list[i]["name"].replace(/-/g, " ").replace(/_/g, " ") + "</a></li>";
			}
		}

		// Function to order by date
		function orderByDate() {
			list.sort(compare);
			console.table(list);

			// sorting function for the object created above
			function compare(a,b) {
				if (a.date > b.date)
					return -1;
				if (a.date < b.date)
					return 1;
				return 0;
			}

			var listWrapper = document.getElementById('list');
			var arrayLength = list.length;
			// this array is used to store the first character of the last looped folder name to be used
			// to create the alphabetical dividers
			var arraySub = [];

			listWrapper.innerHTML= "";

			// Loop through the array and add the item to the list
			for (var i = 0; i < arrayLength; i++) {
				var listSubString = list[i]["name"].substring(0, 1);
				var lastSub = arraySub[arraySub.length-1];

				// if ( listSubString != lastSub ) {
				// 	listWrapper.innerHTML += "<li class='row-divider " + listSubString + "-row'>" + listSubString + "</li>";
				// }

				arraySub.push(listSubString);
				listWrapper.innerHTML += "<li class='single' data-name='" + list[i]["name"] + "' data-last-modified='" + list[i]["date"] + "'><a href='" + list[i]["name"] + "'>" + list[i]["name"].replace(/-/g, " ").replace(/_/g, " ") + "</a></li>";
			}
		}

		// Function to perform a search on the folder list
		function searchProjects() {

				var query = document.getElementById('search').value;
				var listWrapper = document.getElementById('list');
				var arrayLength = list.length;
				listWrapper.innerHTML = '';
				arraySub = [];

				for (var i = 0; i < arrayLength; i++) {
					var listSubString = list[i]["name"].substring(0, 1);
					var lastSub = arraySub[arraySub.length-1];

					// If search field is not empty perform the search, if it's empty show all folders by alphabetical
					// order by default
					if ( query != '' ) {
							if ( list[i]["name"] == query || list[i]["name"].indexOf(query) > -1 ) {
									listWrapper.innerHTML += "<li class='single " + listSubString + "-row'><a href='" + list[i]["name"].replace(/-/g, " ").replace(/_/g, " ") + "'>" + list[i]["name"] + "</a></li>";
							}
					} else {
						if ( listSubString != lastSub ) {
							listWrapper.innerHTML += "<li class='row-divider " + listSubString + "-row'>" + listSubString + "</li>";
						}
						listWrapper.innerHTML += "<li class='single " + listSubString + "-row'><a href='" + list[i]["name"] + "'>" + list[i]["name"].replace(/-/g, " ").replace(/_/g, " ") + "</a></li>";
					}
					arraySub.push(listSubString);
				}

		}
</script>

</body>
</html>
