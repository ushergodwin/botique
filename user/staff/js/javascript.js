if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
}

function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
}
var myVar = setInterval(myTimer, 1000);

function myTimer() {
  var d = new Date();
  var t = d.toLocaleTimeString();
  document.getElementById("time").innerHTML = t;
}
function deleteUser() {
	var conf = confirm("Delete User? Action can not be undone!!");
	if(!conf){
		return false;
	}
}