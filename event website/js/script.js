function addEvent() {
  alert("This will add event.. naturally");
}

// Asynchronously load a page into the element with id "dest".
// A custom callback may be called after onreadystatechange.
function AJAX_Load(page, dest, callback)
{
	var xmlhttp = new XMLHttpRequest();

	var obj_dest = document.getElementById(dest);
	if (obj_dest)
		obj_dest.innerHTML = "Loading...";

	xmlhttp.open("GET", page, true);
	xmlhttp.send();

	xmlhttp.onreadystatechange = function()
	{
		if (obj_dest)
			obj_dest.innerHTML = xmlhttp.responseText;

		if (callback)
			callback();
	}
}



// Asynchronously load a page into the element with id "dest".
// "data" is passed to the page with POST method.
function AJAX_POST(page, dest, data, callback)
{
	var xmlhttp = new XMLHttpRequest();

	var obj_dest = document.getElementById(dest);
	if (obj_dest)
		obj_dest.innerHTML = "Loading...";

	xmlhttp.open("POST", page, true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.send(data);

	xmlhttp.onreadystatechange = function()
	{
		if (obj_dest)
			obj_dest.innerHTML = xmlhttp.responseText;

		if (callback)
			callback();
	}
}

function user_add(name){
  AJAX_POST("user_add.php", "user_details", "n=" + encodeURIComponent(name), callback);
}
