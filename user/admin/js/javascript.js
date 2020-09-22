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
window.onload = function() {
  var count = 60;
var timer =  setInterval(function() {
    if(count == 0){
      clearInterval(timer);
    }else{
      count--;
      document.getElementById('timer').innerHTML = count;
      document.getElementById('timer2').innerHTML = count;
      document.getElementById('timer3').innerHTML = count;
      document.getElementById('timer4').innerHTML = count;
    }
  }, 1000)
}
//get sales table
 setTimeout( function() {
      var request = new XMLHttpRequest();
      request.open("GET", 'get?q=sales');
      request.onreadystatechange = function() {
        if(this.readyState === 4 && this.status === 200){
          document.getElementById('sales_table').innerHTML = this.responseText;
        }
      }
      request.send();

   }, 3000)
      function getInput() {
      var input1 = document.getElementById('input1').value;
      document.getElementById('value1').innerHTML = input1;
     }
     function operator() {
      var option = document.getElementById('option').value;
      document.getElementById('optionValue').innerHTML = option;
     }
     function getNum() {
    var  input1 = document.getElementById('input1').value;
     var  input2  = document.getElementById('input2').value;
      var option = document.getElementById('option').value;
      document.getElementById('value2').innerHTML = input2;
      var ans = 0;
      if(input1 === ""){
        document.getElementById('error').innerHTML = "Field 1 is required";
        document.getElementById('error').style.color = 'red';
        return false;
      }
      if(input2 === "") {
        document.getElementById('error').innerHTML = "Field 2 is required";
        document.getElementById('error').style.color = 'red';
        return false;
      }
      if(option === "+") {
        ans = Number(input1) + Number(input2);
        document.getElementById("asgin").innerHTML = "=";
        document.getElementById('answer').innerHTML = ans.toLocaleString();
        document.getElementById('answer').style.color = 'green';
      }
      if(option === "-") {
        ans = input1 - input2;
        document.getElementById("asgin").innerHTML = "=";
        document.getElementById('answer').innerHTML = ans.toLocaleString();
        document.getElementById('answer').style.color = 'green';
      }
        if(option === "*") {
        ans = input1 * input2;
        document.getElementById("asgin").innerHTML = "=";
        document.getElementById('answer').innerHTML = ans.toLocaleString();
        document.getElementById('answer').style.color = 'green';
      }
        if(option === "/") {
        ans = input1 / input2;
        document.getElementById("asgin").innerHTML = "=";
        document.getElementById('answer').innerHTML = ans.toLocaleString();
        document.getElementById('answer').style.color = 'green';
      }
        if(option === "select") {
        document.getElementById('error').innerHTML = "Please choose an operator";
        document.getElementById('error').style.color = 'red';
      }

     }
function resetButton() {
      document.getElementById('value1').innerHTML = '';
      document.getElementById('value2').innerHTML = '';
      document.getElementById('optionValue').innerHTML = '';
      document.getElementById('asgin').innerHTML = '';
      document.getElementById('error').innerHTML = '';
      document.getElementById('answer').innerHTML = '';
     }

    function statOfYear() {
      var year = document.getElementById('year').value;
      var request = new XMLHttpRequest();
      request.open("GET", 'get?year='+year, true);
      request.onreadystatechange = function(){
        if(this.readyState === 4 && this.status === 200) {
          document.getElementById('sales_table').innerHTML = this.responseText;
         document.getElementById('selectedYear').innerHTML = year;
         document.getElementById('load-stat').style.display = 'none';
        }
      }
      document.getElementById('load-stat').style.display = 'inline-flex';
      request.send();
     }
 