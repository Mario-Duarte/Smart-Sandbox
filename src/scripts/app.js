var folderIcon = "<svg class='folder-icon' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' width='48px' height='48px'><path d='M20,6h-8l-1.414-1.414C10.211,4.211,9.702,4,9.172,4H4C2.9,4,2,4.9,2,6v12c0,1.1,0.9,2,2,2h16c1.1,0,2-0.9,2-2V8 C22,6.9,21.1,6,20,6z'/></svg>";

function setCookie(cname, cvalue, exdays) {
  var d = new Date();
  d.setTime(d.getTime() + (exdays*24*60*60*1000));
  var expires = "expires="+ d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function checkCookie() {
  var theme = getCookie("theme");
  if (theme === "") {
    setCookie("theme", "light", 30);
  }
}

function getCookie(cname) {
  var name = cname + "=";
  var ca = document.cookie.split(';');
  for(var i = 0; i < ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}

orderByName();

// On every key press while writing on the search field, it performs a new search and updates
// the displayed list without the alphabetical dividers
document.getElementById('search').onkeypress = function (e) {
searchProjects();
};

//function to order list by name
function orderByName() {
	list.sort(compare);

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
		listWrapper.innerHTML += "<li class='single' data-name='" + list[i]["name"] + "' data-last-modified='" + list[i]["date"] + "'><a href='" + list[i]["name"] + "'>" + folderIcon + "<br/>" + list[i]["name"].replace(/-/g, " ").replace(/_/g, " ") + "</a></li>";
	}
}

// Function to order by date
function orderByDate() {
	list.sort(compare);

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
	var arrayDate = [];

	listWrapper.innerHTML= "";

	// Loop through the array and add the item to the list
	for (var i = 0; i < arrayLength; i++) {
		var lastDate = arrayDate[arrayDate.length-1];

		if ( list[i]["datePreaty"] != lastDate ) {
			listWrapper.innerHTML += "<li class='row-divider'>" + list[i]['datePreaty'] + "</li>";
		}

		arrayDate.push(list[i]["datePreaty"]);
		listWrapper.innerHTML += "<li class='single' data-name='" + list[i]["name"] + "' data-last-modified='" + list[i]["date"] + "'><a href='" + list[i]["name"] + "'>" + folderIcon + "<br/>" + list[i]["name"].replace(/-/g, " ").replace(/_/g, " ") + "</a></li>";
	}
}

// Function to perform a search on the folder list
function searchProjects() {

		var query = document.getElementById('search').value;
		var listWrapper = document.getElementById('list');
		var arrayLength = list.length;
		listWrapper.innerHTML = '';
		var arraySub = [];

		for (var i = 0; i < arrayLength; i++) {
			var listSubString = list[i]["name"].substring(0, 1);
			var lastSub = arraySub[arraySub.length-1];

			// If search field is not empty perform the search, if it's empty show all folders by alphabetical
			// order by default
			if ( query != '' ) {
					if ( list[i]["name"] == query || list[i]["name"].indexOf(query) > -1 ) {
							listWrapper.innerHTML += "<li class='single " + listSubString + "-row'><a href='" + list[i]["name"].replace(/-/g, " ").replace(/_/g, " ") + "'>" + folderIcon + "</br>" + list[i]["name"] + "</a></li>";
					}
			} else {
				if ( listSubString != lastSub ) {
					listWrapper.innerHTML += "<li class='row-divider " + listSubString + "-row'>" + listSubString + "</li>";
				}
				listWrapper.innerHTML += "<li class='single " + listSubString + "-row'><a href='" + list[i]["name"] + "'>" + folderIcon + "</br>" + list[i]["name"].replace(/-/g, " ").replace(/_/g, " ") + "</a></li>";
			}
			arraySub.push(listSubString);
		}

}

function toggleTheme() {
	if (document.body.classList.contains('light')) {
		document.body.classList.remove('light');
		document.body.classList.add('dark');
		setCookie("theme", "dark", 30);
	} else {
		document.body.classList.remove('dark');
		document.body.classList.add('light');
		setCookie("theme", "light", 30);
	}
}

checkCookie();
document.body.classList.add(getCookie("theme"));
