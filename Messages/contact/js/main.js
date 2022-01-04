
function ebutton(){

if (document.getElementById("acc").checked){

document.getElementById("sub").disabled = false;

}
else {


document.getElementById("sub").disabled = true;

}



}

function myFunction() {
var greeting;  
var d = new Date();
var time = d.getHours();
if (time<12)
{
	greeting = "Good morning!";
}
else if (time>=10 && time<18)
{
	greeting = "Good afternoon!";
}
else
{
	greeting = "Good night!";
    
}
  return greeting;
}



