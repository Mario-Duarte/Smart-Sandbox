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
		<style>
.hero-gradient-light,.search-wrapper,.header{background:#74b9ff;background:-moz-linear-gradient(-90deg, #74b9ff 0%, #dff5f7 100%);background:-webkit-linear-gradient(-90deg, #74b9ff 0%, #dff5f7 100%);background:-webkit-gradient(linear, right top, left top, from(#74b9ff), to(#dff5f7));background:-o-linear-gradient(right, #74b9ff 0%, #dff5f7 100%);background:linear-gradient(-90deg, #74b9ff 0%, #dff5f7 100%);filter:progid:DXImageTransform.Microsoft.gradient( startColorstr="#74b9ff", endColorstr="#dff5f7",GradientType=1 )}.hero-gradient-dark{background:#fab1a0;background:-moz-linear-gradient(-90deg, #fab1a0 0%, #74b9ff 100%);background:-webkit-linear-gradient(-90deg, #fab1a0 0%, #74b9ff 100%);background:-webkit-gradient(linear, right top, left top, from(#fab1a0), to(#74b9ff));background:-o-linear-gradient(right, #fab1a0 0%, #74b9ff 100%);background:linear-gradient(-90deg, #fab1a0 0%, #74b9ff 100%);filter:progid:DXImageTransform.Microsoft.gradient( startColorstr="#fab1a0", endColorstr="#74b9ff",GradientType=1 )}html,body{background:#f9f9f9;font-family:helvetica,arial,sans-serif;margin:0;padding:0}a,p a{color:#63cdda;cursor:pointer;text-decoration:none;-webkit-transition:color .4s ease-in-out;-o-transition:color .4s ease-in-out;transition:color .4s ease-in-out}a:hover,a:focus{color:#ff7675}.header{height:auto;position:relative;width:100%}.header .inner{background-color:#eee;border-bottom-right-radius:50% 30%;-webkit-box-sizing:border-box;box-sizing:border-box;color:#333;height:auto;padding:80px 20px;position:relative;width:100%}.header .inner .content{margin:0 auto;max-width:960px;position:relative;width:100%}.list{display:inline-block;margin:0;position:relative;width:100%}.list .list-inner{-webkit-box-sizing:border-box;box-sizing:border-box;margin:0 auto;max-width:960px;padding:40px 20px;width:100%}.list .sort{-webkit-box-sizing:border-box;box-sizing:border-box;margin:0 auto;max-width:960px;padding:20px 20px 10px 20px;width:100%}#list{-webkit-box-align:stretch;-ms-flex-align:stretch;align-items:stretch;display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-orient:horizontal;-webkit-box-direction:normal;-ms-flex-direction:row;flex-direction:row;-ms-flex-wrap:wrap;flex-wrap:wrap;height:auto;-webkit-box-pack:start;-ms-flex-pack:start;justify-content:flex-start;margin:0 auto;max-width:960px;padding:0;width:100%}#list .single{display:inline-block;float:left;list-style:none;margin:5px;min-width:140px;position:relative;text-align:center}#list .single a{background:#eee;border-radius:5px;-webkit-box-sizing:border-box;box-sizing:border-box;color:#999;display:inline-block;font-weight:lighter;padding:10px;text-decoration:none;-webkit-transition:all .2s ease-in-out;-o-transition:all .2s ease-in-out;transition:all .2s ease-in-out;width:100%}#list .single a:hover,#list .single a:focus{background:transparent;color:#555}#list .single a:hover .folder-icon path,#list .single a:focus .folder-icon path{fill:#b5e7ee}#list .single a:visited{background:transparent;color:#555}#list .single a .folder-icon path{fill:#63cdda;-webkit-transition:all .2s ease-in-out;-o-transition:all .2s ease-in-out;transition:all .2s ease-in-out}#list .row-divider{border-bottom:1px solid #eee;-webkit-box-sizing:border-box;box-sizing:border-box;color:#999;display:inline-block;font-size:18px;font-weight:lighter;margin:10px 0;padding:0 0 10px 0;text-transform:uppercase;width:100%}.search-wrapper{text-align:left;width:100%}.search-wrapper .inner{-webkit-box-sizing:border-box;box-sizing:border-box;color:#999;margin:0 auto;max-width:960px;padding:20px 20px;text-align:left;width:100%}#search{background-color:transparent;border:none;-webkit-box-sizing:border-box;box-sizing:border-box;color:#212121;display:inline-block;font-size:14px;min-width:320px;padding:5px 0px;text-transform:uppercase;width:100%}#search:focus{outline:0 !important}#search:placeholder{color:#212121;opacity:1}footer{background-color:#fff;-webkit-box-sizing:border-box;box-sizing:border-box;padding:20px;width:100%}footer .inner{margin:0 auto;max-width:960px;text-align:left;width:100%}footer .inner p{color:#999;font-size:10px}footer .inner p span{color:#ff7675}@media all and (min-width: 320px)and (max-width: 424px){#list .single{margin:5px 0;width:100%}.search-wrapper{text-align:center}#search{width:100%}}@media all and (min-width: 425px)and (max-width: 767px){#list .single{min-width:calc( 50% - 13px )}#search{width:80%}.search-wrapper{text-align:center}}@media all and (min-width: 768px)and (max-width: 960px){#list .single{min-width:calc( 33.333333% - 13px )}}
</style>
</head>

<body>

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
					<input id="search" type="text" name="search" placeholder="Search your Projects..." onchange="searchProjects()">
			</div>
	</div>

	<div class="list">
		<div class="sort">sort: <a href="#0" onclick="orderByName()">a-z</a> <a href="#0" onclick="orderByDate()">date</a></div>
		<div class="list-inner">
			<ul id="list"></ul>
		</div>
	</div>

	<footer>
		<div class="inner">
			<p>&copy; <?php echo date("Y"); ?>, created with <span>&hearts;</span> by <a href="http://marioduarte.co.uk" target="_blank">Mario Duarte</a> to the dev comunity.</p>
		</div>
	</footer>

	<script charset="utf-8">
"use strict";var folderIcon="<svg class='folder-icon' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' width='48px' height='48px'><path d='M20,6h-8l-1.414-1.414C10.211,4.211,9.702,4,9.172,4H4C2.9,4,2,4.9,2,6v12c0,1.1,0.9,2,2,2h16c1.1,0,2-0.9,2-2V8 C22,6.9,21.1,6,20,6z'/></svg>";function orderByName(){list.sort(function(e,t){return e.name<t.name?-1:e.name>t.name?1:0});var e=document.getElementById("list"),t=list.length,a=[];e.innerHTML="";for(var n=0;n<t;n++){var l=list[n].name.substring(0,1);l!=a[a.length-1]&&(e.innerHTML+="<li class='row-divider "+l+"-row'>"+l+"</li>"),a.push(l),e.innerHTML+="<li class='single' data-name='"+list[n].name+"' data-last-modified='"+list[n].date+"'><a href='"+list[n].name+"'>"+folderIcon+"<br/>"+list[n].name.replace(/-/g," ").replace(/_/g," ")+"</a></li>"}}function orderByDate(){list.sort(function(e,t){return e.date>t.date?-1:e.date<t.date?1:0});var e=document.getElementById("list"),t=list.length,a=[];e.innerHTML="";for(var n=0;n<t;n++){var l=a[a.length-1];list[n].datePreaty!=l&&(e.innerHTML+="<li class='row-divider'>"+list[n].datePreaty+"</li>"),a.push(list[n].datePreaty),e.innerHTML+="<li class='single' data-name='"+list[n].name+"' data-last-modified='"+list[n].date+"'><a href='"+list[n].name+"'>"+folderIcon+"<br/>"+list[n].name.replace(/-/g," ").replace(/_/g," ")+"</a></li>"}}function searchProjects(){var e=document.getElementById("search").value,t=document.getElementById("list"),a=list.length;t.innerHTML="";for(var n=[],l=0;l<a;l++){var r=list[l].name.substring(0,1),i=n[n.length-1];""!=e?(list[l].name==e||-1<list[l].name.indexOf(e))&&(t.innerHTML+="<li class='single "+r+"-row'><a href='"+list[l].name.replace(/-/g," ").replace(/_/g," ")+"'>"+folderIcon+"</br>"+list[l].name+"</a></li>"):(r!=i&&(t.innerHTML+="<li class='row-divider "+r+"-row'>"+r+"</li>"),t.innerHTML+="<li class='single "+r+"-row'><a href='"+list[l].name+"'>"+folderIcon+"</br>"+list[l].name.replace(/-/g," ").replace(/_/g," ")+"</a></li>"),n.push(r)}}orderByName(),document.getElementById("search").onkeypress=function(e){searchProjects()};
</script>

</body>
</html>
