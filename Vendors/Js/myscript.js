//Check for the equality of re-entered password
function validatePassword()
{
	if (document.getElementById("pwd").value != document.getElementById("rpwd").value)
	{
		alert("ERROR : Passwords are mismatched!!!");
		return false;
	}
	else
	{
		alert("Passwords matched!!!");
		return true;
	}
}

function enableSubButton()
{
	if (document.getElementById("policy").checked) 
	{
		document.getElementById("btn1").disabled=false;
	}
	else
	{
		document.getElementById("btn1").disabled=true;
	}
}


function comparePassword()
{
	if (document.getElementById("epwd").value != document.getElementById("erpwd").value)
	{
		alert("ERROR : Passwords are mismatched!!!");
		return false;
	}
	else
	{
		alert("Passwords matched!!!");
		return true;
	}
}

var navbar = document.getElementById("navbar");
var sticky = navbar.offsetTop;

function stickyNavbar() {
	if (window.pageYOffset >= sticky) {
		navbar.classList.add("sticky");
	} else {
		navbar.classList.remove("sticky");
	}

	console.log("hi");
}

function openForm() {
	document.getElementById("myForm").style.display = "block";
}

function closeForm() {
	document.getElementById("myForm").style.display = "none";
}

//Get the button:
mybutton = document.getElementById("topBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function () {
	scrollFunction();
	stickyNavbar();
};

function scrollFunction() {
	if (document.body.scrollTop > 40 || document.documentElement.scrollTop > 20) {
		mybutton.style.display = "block";
	} else {
		mybutton.style.display = "none";
	}
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
	document.body.scrollTop = 0; // For Safari
	document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}
