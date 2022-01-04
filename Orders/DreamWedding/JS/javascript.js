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

mybutton = document.getElementById("topBtn");
window.onscroll = function () {
	scrollFunction();
	stickyNavbar();
};

function scrollFunction() {
	if (document.body.scrollTop > 40 || document.documentElement.scrollTop > 40) {
		mybutton.style.display = "block";
	} else {
		mybutton.style.display = "none";
	}
}
function topFunction() {
	document.body.scrollTop = 0; 
	document.documentElement.scrollTop = 0; 
}

var modal = document.getElementById('id01');
window.onclick = function (event) {
	if (event.target == modal) {
		modal.style.display = "none";
	}
}

function loadData(status) {
	if (status==1){
		document.getElementById("001") = element.classList.add("cart-item-grid2");
		document.getElementById("006").style.display = none;
	}
}