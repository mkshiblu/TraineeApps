/*
	the purpose of this script is to visible the whole signup form to the user when user click on the signup button
*/
window.onload = init; //call init fuction after the page is fully loaded

fuction init(){
	//place initialization codes
	var signbtn = document.getElementById("signup");
	//signup.onclick = onSignupClick;
	alert("ld");
}
/*
//called when sign up button is clicked by the user
//after click a signup form should be visible and the login form will be hidden
function onSignupClick(){
	//first find the element of having "signupdiv" id
	//var signupform = document.getElementById("signupdiv")
	alert("hidden");
	hideElement("signupdiv");

}

///hides an html element by setting it's display attribute to "none" so it wouldn't take up any space after removed

function hideElement(elementId){
	document.getElementById(elementId).style.display = "none";
}

function showElement(elementId){
	document.getElementById(elementId).style.display = "block";//or the element's own display property
}*/