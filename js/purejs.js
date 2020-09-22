if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
function isValid(){
	var day = document.form_3.day;
	var per = document.form_3.period;
	var end = document.form_3.periodto;
	var ident = document.form_3.identification;
	let numbers = /(\d{4})-(\d{2})-(\d{2})/;
	if(!day.value.match(numbers)) {
	 	var i = document.getElementById("day").innerHTML ="Please Enter the Date";
	 	day.focus();
	 	return false;
	 }
	let time = /^\d{1,2}:\d{2}([ap]m)?$/;
	if(!per.value.match(time)){
        var k = document.getElementById("per").innerHTML = "Please Enter Start Time";
	 	per.focus();
	 	return false;
	 }
	let time_2 = /^\d{1,2}:\d{2}([ap]m)?$/;
	if(!end.value.match(time_2)){
        var l = document.getElementById("end").innerHTML ="Please Enter End Time";
	 	end.focus();
	 	return false;
	 }
	let numbers_2 = /^[0-9a-zA-Z ]*$/;
	if(!ident.value.match(numbers_2)){
		var m = document.getElementById("ident").innerHTML ="Please Enter ID";
		ident.focus();
		return false;
	}else{
        return true;
    }
}


function validateAccount(){
	var sname = document.account.firstname;
    var lname = document.account.lastname;
    var cont = document.account.contact;
	var add = document.account.address;
	var uname = document.account.email;
	var pass = document.account.password;
	var conf = document.account.password_2;	
    	let fname= /^[a-zA-Z ]*$/;
	if (!sname.value.match(fname)) {
      var f = document.getElementById("sname").innerHTML = "Please Enetr Yor First Name";
		sname.focus();
		return false;
	}
    	let lreg = /^[a-zA-Z ]*$/;
	if (!lname.value.match(lreg)) {
      var f = document.getElementById("lname").innerHTML = "Please Enetr Your Last Name";
		lname.focus();
		return false;
	}
    
 let numbers = /^[0-9-+ ]*$/;
   if(!cont.value.match(numbers)){ 
   	var h = document.getElementById("cont").innerHTML = "Please enter your contact/ min length 13 max length 13";
   		cont.focus();
   		return false;
   	}
	let add_len = add.value;
	if(add_len.length == 0){
       var j = document.getElementById("add").innerHTML ="Please Enter Your Address";
         add.focus();
         return false;
	}  
    	let  mailformat = /^[a-z0-9-.]{1,30}@[a-z]{1,65}.(com|net|org|info|biz|([a-z]{2,3}.[a-z]{2}))+$/;
	if(!uname.value.match(mailformat)){
        var e = document.getElementById("name").innerHTML ='Please Enter Your Email';
		uname.focus();
		return false;
	}
    
     let alphernumeric = /^[0-9a-zA-Z-@*!#?/&$%]+$/;
if (!pass.value.match(alphernumeric)){
    var f = document.getElementById("pass").innerHTML ="Password should contain letters and numbers";
pass.focus();
return false;
 }
if(pass.value !== conf.value){
	var g = document.getElementById("conf").innerHTML ='password does not match';
        conf.focus();
	  return false;
	}else{
        return true;
    } 	
}

function ValidateEmail(){
    var email = document.messages.EmailAddress;
var mailformat = /^[a-z0-9-.]{1,30}@[a-z]{1,65}.(com|net|org|info|biz|([a-z]{2,3}.[a-z]{2}))+$/;
if(!email.value.match(mailformat)){
var em = document.getElementById("error").innerHTML ="Invalid email address!";
email.focus();
return false;
}else{
    return true;
}
}
function checked(){
if(document.getElementById("cas").checked){
    return true;
}else if(document.getElementById("mobile").checked){
    alert("This Payment Method Is Still Under development, Please select cash on delivery");
    return false;
}else{
     alert("Please Select a payment method and continue");
    return false;
}
}
function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
    function searchFunction() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myOrder");
  filter = input.value.toUpperCase();
  table = document.getElementById("myOrderTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}