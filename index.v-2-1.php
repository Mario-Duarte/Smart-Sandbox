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
.hero-gradient-light,.search-wrapper,.header{background:#74b9ff;background:-moz-linear-gradient(-90deg, #74b9ff 0%, #dff5f7 100%);background:-webkit-linear-gradient(-90deg, #74b9ff 0%, #dff5f7 100%);background:-webkit-gradient(linear, right top, left top, from(#74b9ff), to(#dff5f7));background:-o-linear-gradient(right, #74b9ff 0%, #dff5f7 100%);background:linear-gradient(-90deg, #74b9ff 0%, #dff5f7 100%);filter:progid:DXImageTransform.Microsoft.gradient( startColorstr="#74b9ff", endColorstr="#dff5f7",GradientType=1 )}.hero-gradient-dark,body.dark .search-wrapper,body.dark .header{background:#0652dd;background:-moz-linear-gradient(-90deg, #0652dd 0%, #12cbc4 100%);background:-webkit-linear-gradient(-90deg, #0652dd 0%, #12cbc4 100%);background:-webkit-gradient(linear, right top, left top, from(#0652dd), to(#12cbc4));background:-o-linear-gradient(right, #0652dd 0%, #12cbc4 100%);background:linear-gradient(-90deg, #0652dd 0%, #12cbc4 100%);filter:progid:DXImageTransform.Microsoft.gradient( startColorstr="#0652DD", endColorstr="#12CBC4",GradientType=1 )}html,body{background:#f9f9f9;font-family:helvetica,arial,sans-serif;margin:0;padding:0;-webkit-transition:all .4s ease-in-out;-o-transition:all .4s ease-in-out;transition:all .4s ease-in-out}a,p a{color:#63cdda;cursor:pointer;text-decoration:none;-webkit-transition:color .4s ease-in-out;-o-transition:color .4s ease-in-out;transition:color .4s ease-in-out}a:hover,a:focus{color:#ff7675}.theme{background-color:#212121;border-radius:50%;cursor:pointer;height:30px;padding:5px;position:absolute;right:20px;text-align:center;top:20px;-webkit-transition:background .2s ease-in-out;-o-transition:background .2s ease-in-out;transition:background .2s ease-in-out;width:30px;z-index:2}.theme svg{height:auto;width:20px}.theme svg #bulb{fill:#f5cd79;opacity:1;-webkit-transition:all .4s ease-in-out;-o-transition:all .4s ease-in-out;transition:all .4s ease-in-out}.theme svg #light{fill:#f5cd79;opacity:1;-webkit-transition:all .4s ease-in-out;-o-transition:all .4s ease-in-out;transition:all .4s ease-in-out}.header{height:auto;position:relative;-webkit-transition:all .4s ease-in-out;-o-transition:all .4s ease-in-out;transition:all .4s ease-in-out;width:100%}.header .inner{background-color:#eee;border-bottom-right-radius:50% 30%;-webkit-box-sizing:border-box;box-sizing:border-box;color:#333;height:auto;padding:80px 20px;position:relative;-webkit-transition:all .4s ease-in-out;-o-transition:all .4s ease-in-out;transition:all .4s ease-in-out;width:100%}.header .inner .content{margin:0 auto;max-width:960px;position:relative;width:100%}.list{display:inline-block;margin:0;position:relative;width:100%}.list .list-inner{-webkit-box-sizing:border-box;box-sizing:border-box;margin:0 auto;max-width:960px;padding:40px 20px;width:100%}.list .sort{-webkit-box-sizing:border-box;box-sizing:border-box;margin:0 auto;max-width:960px;padding:20px 20px 10px 20px;width:100%}#list{-webkit-box-align:stretch;-ms-flex-align:stretch;align-items:stretch;display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-orient:horizontal;-webkit-box-direction:normal;-ms-flex-direction:row;flex-direction:row;-ms-flex-wrap:wrap;flex-wrap:wrap;height:auto;-webkit-box-pack:start;-ms-flex-pack:start;justify-content:flex-start;margin:0 auto;max-width:960px;padding:0;width:100%}#list .single{display:inline-block;float:left;list-style:none;margin:5px 2.5%;position:relative;text-align:center;width:45%}@media screen and (min-width: 425px){#list .single{margin:5px;min-width:140px;width:auto}}#list .single a{background:#eee;border-radius:5px;-webkit-box-sizing:border-box;box-sizing:border-box;color:#999;display:inline-block;font-weight:lighter;padding:10px;text-decoration:none;-webkit-transition:all .2s ease-in-out;-o-transition:all .2s ease-in-out;transition:all .2s ease-in-out;width:100%}#list .single a:hover,#list .single a:focus{background:transparent;color:#555}#list .single a:hover .folder-icon path,#list .single a:focus .folder-icon path{fill:#ff7675}#list .single a:visited{background:transparent;color:#555}#list .single a .folder-icon path{fill:#63cdda;-webkit-transition:all .2s ease-in-out;-o-transition:all .2s ease-in-out;transition:all .2s ease-in-out}#list .row-divider{border-bottom:1px solid #eee;-webkit-box-sizing:border-box;box-sizing:border-box;color:#999;display:inline-block;font-size:18px;font-weight:lighter;margin:10px 0;padding:0 0 10px 0;text-transform:uppercase;width:100%}.search-wrapper{text-align:left;-webkit-transition:all .4s ease-in-out;-o-transition:all .4s ease-in-out;transition:all .4s ease-in-out;width:100%}.search-wrapper .inner{-webkit-box-sizing:border-box;box-sizing:border-box;color:#999;margin:0 auto;max-width:960px;padding:20px 20px;text-align:left;width:100%}#search{background-color:transparent;border:none;-webkit-box-sizing:border-box;box-sizing:border-box;color:#212121;display:inline-block;font-size:14px;min-width:320px;padding:5px 0px;text-transform:uppercase;width:100%}#search:focus{outline:0 !important}#search:placeholder{color:#212121;opacity:1}footer{background-color:#fff;-webkit-box-sizing:border-box;box-sizing:border-box;padding:20px;width:100%}footer .inner{margin:0 auto;max-width:960px;text-align:left;width:100%}footer .inner p{color:#999;font-size:14px}footer .inner p span{color:#ff7675}body.dark{background-color:#333}body.dark a,body.dark p a{color:#12cbc4}body.dark a:hover,body.dark p a:hover{color:#9980fa}body.dark .theme{background-color:#eee}body.dark .theme svg{height:auto;width:20px}body.dark .theme svg #bulb{fill:#212121;opacity:.8}body.dark .theme svg #light{opacity:0}body.dark .header .inner{background-color:#333;color:#eee}body.dark .list .sort{color:#eee}body.dark #list .single a{background:#555;color:#ddd}body.dark #list .single a:hover,body.dark #list .single a:focus{color:#999}body.dark #list .single a:hover .folder-icon path,body.dark #list .single a:focus .folder-icon path{fill:#9980fa}body.dark #list .single a:visited{background:transparent;color:#999}body.dark #list .single a .folder-icon path{fill:#12cbc4}body.dark #list .row-divider{border-bottom:1px solid #555;color:#555}
</style>
</head>

<body>

	<div id="theme-toggle" class="theme" onclick="toggleTheme()">
		<svg viewBox="0 0 30 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g id="light-bulb" fill="#000000" fill-rule="nonzero"><path d="M25,15 C25,20 20,24.921875 20,30 L10,30 C10,25.078125 5,20 5,15 C5,9.4775 9.47757813,5 15,5 C20.5225,5 25,9.47757813 25,15 Z M18.75,35 L11.25,35 C10.5590625,35 10,35.5590625 10,36.25 C10,36.9409375 10.5590625,37.5 11.25,37.5 L11.4795312,37.5 C11.9946875,38.9550781 13.3692187,40 15.0000781,40 C16.6309375,40 18.0055469,38.9550781 18.520625,37.5 L18.75,37.5 C19.4409375,37.5 20,36.9409375 20,36.25 C20,35.5590625 19.4409375,35 18.75,35 Z M18.75,31.25 L11.25,31.25 C10.5590625,31.25 10,31.8090625 10,32.5 C10,33.1909375 10.5590625,33.75 11.25,33.75 L18.75,33.75 C19.4409375,33.75 20,33.1909375 20,32.5 C20,31.8090625 19.4409375,31.25 18.75,31.25 Z" id="bulb"/><path d="M1.38429688,8.58398438 L2.63429688,6.41601562 L4.8853125,7.71734375 C4.39703125,8.39359375 3.9746875,9.11132812 3.62796875,9.87796875 L1.38429688,8.58398438 Z M16.25,2.62695312 C15.8325,2.58304687 15.4296875,2.5 15,2.5 C14.5703125,2.5 14.1675,2.58304687 13.75,2.62695312 L13.75,0 L16.25,0 L16.25,2.62695312 Z M9.87796875,3.62796875 C9.11132812,3.97460938 8.39359375,4.39695313 7.71726563,4.8853125 L6.41601562,2.63429688 L8.58398438,1.38429688 L9.87796875,3.62796875 Z M28.6157031,8.58398438 L26.3744531,9.87789062 C26.0278125,9.11132812 25.6029688,8.39351562 25.1146875,7.71726563 L27.3657031,6.41601562 L28.6157031,8.58398438 Z M23.5815625,2.63429688 L22.2826563,4.88289062 C21.6088281,4.39703125 20.8885938,3.9746875 20.1244531,3.62796875 L21.4184375,1.38429688 L23.5815625,2.63429688 Z M2.5,15 C2.5,15.4248437 2.58304687,15.835 2.631875,16.25 L0,16.25 L0,13.75 L2.62695312,13.75 C2.58304687,14.1675 2.5,14.5703125 2.5,15 Z M27.3730469,13.75 L30,13.75 L30,16.25 L27.368125,16.25 C27.4170312,15.835 27.5,15.4248437 27.5,15 C27.5,14.5703125 27.4169531,14.1675 27.3730469,13.75 Z M25.3198438,22.3999219 C25.6884375,21.6454688 26.0303125,20.88375 26.3452344,20.1074219 L28.6157813,21.4160156 L27.3657813,23.5815625 L25.3198438,22.3999219 Z M1.38429687,21.4160156 L3.64507812,20.1122656 C3.95507812,20.8886719 4.296875,21.6552344 4.663125,22.4121094 L2.63429687,23.5815625 L1.38429687,21.4160156 Z" id="light"/></g></g></svg>
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
			<p><a href="" target="_blank"></a></p><p>
		</p></div>
	</footer>

	<script charset="utf-8">
"use strict";var folderIcon="<svg class='folder-icon' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' width='48px' height='48px'><path d='M20,6h-8l-1.414-1.414C10.211,4.211,9.702,4,9.172,4H4C2.9,4,2,4.9,2,6v12c0,1.1,0.9,2,2,2h16c1.1,0,2-0.9,2-2V8 C22,6.9,21.1,6,20,6z'/></svg>";function setCookie(e,t,i){var n=new Date;n.setTime(n.getTime()+24*i*60*60*1e3);var a="expires="+n.toUTCString();document.cookie=e+"="+t+";"+a+";path=/"}function checkCookie(){""===getCookie("theme")&&setCookie("theme","light",30)}function getCookie(e){for(var t=e+"=",i=document.cookie.split(";"),n=0;n<i.length;n++){for(var a=i[n];" "==a.charAt(0);)a=a.substring(1);if(0==a.indexOf(t))return a.substring(t.length,a.length)}return""}function orderByName(){list.sort(function(e,t){return e.name<t.name?-1:e.name>t.name?1:0});var e=document.getElementById("list"),t=list.length,i=[];e.innerHTML="";for(var n=0;n<t;n++){var a=list[n].name.substring(0,1);a!=i[i.length-1]&&(e.innerHTML+="<li class='row-divider "+a+"-row'>"+a+"</li>"),i.push(a),e.innerHTML+="<li class='single' data-name='"+list[n].name+"' data-last-modified='"+list[n].date+"'><a href='"+list[n].name+"'>"+folderIcon+"<br/>"+list[n].name.replace(/-/g," ").replace(/_/g," ")+"</a></li>"}}function orderByDate(){list.sort(function(e,t){return e.date>t.date?-1:e.date<t.date?1:0});var e=document.getElementById("list"),t=list.length,i=[];e.innerHTML="";for(var n=0;n<t;n++){var a=i[i.length-1];list[n].datePreaty!=a&&(e.innerHTML+="<li class='row-divider'>"+list[n].datePreaty+"</li>"),i.push(list[n].datePreaty),e.innerHTML+="<li class='single' data-name='"+list[n].name+"' data-last-modified='"+list[n].date+"'><a href='"+list[n].name+"'>"+folderIcon+"<br/>"+list[n].name.replace(/-/g," ").replace(/_/g," ")+"</a></li>"}}function searchProjects(){var e=document.getElementById("search").value,t=document.getElementById("list"),i=list.length;t.innerHTML="";for(var n=[],a=0;a<i;a++){var s=list[a].name.substring(0,1),r=n[n.length-1];""!=e?(list[a].name==e||-1<list[a].name.indexOf(e))&&(t.innerHTML+="<li class='single "+s+"-row'><a href='"+list[a].name+"'>"+folderIcon+"</br>"+list[a].name.replace(/-/g," ").replace(/_/g," ")+"</a></li>"):(s!=r&&(t.innerHTML+="<li class='row-divider "+s+"-row'>"+s+"</li>"),t.innerHTML+="<li class='single "+s+"-row'><a href='"+list[a].name+"'>"+folderIcon+"</br>"+list[a].name.replace(/-/g," ").replace(/_/g," ")+"</a></li>"),n.push(s)}}function toggleTheme(){document.body.classList.contains("light")?(document.body.classList.remove("light"),document.body.classList.add("dark"),setCookie("theme","dark",30)):(document.body.classList.remove("dark"),document.body.classList.add("light"),setCookie("theme","light",30))}orderByName(),document.getElementById("search").onkeypress=function(e){searchProjects()},checkCookie(),document.body.classList.add(getCookie("theme"));
</script>

</body>
</html>
