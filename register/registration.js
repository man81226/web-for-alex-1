$(document).ready(function() {
$("#register").click(function() {
var username = $("#username").val();
var email = $("#email").val();
var password = $("#password").val();
var cpassword = $("#cpassword").val();
var gender = $("#gender").val();

if (username == '' || email == '' || password == '' || cpassword == '' || gender == '' ) {
alert("Please fill all fields...!!!!!!");

} else if ((password.length) < 5) {
alert("Password should atleast 8 character in length...!!!!!!");

} else if (!(password).match(cpassword)) {
alert("Your passwords don't match. Try again?");

} else {
	
$.post("register", {
username1: username,
email1: email,
password1: password,
gender: gender
}, function(data) {
if (data == 'You have Successfully Registered.....') {
					 window.location.href = '../information/information.html';					

//$("form")[0].reset();
}
alert(data);
});
}
});
});