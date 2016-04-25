function signin()
{
	var xhttp;
	var usn= document.getElementById("signin-usn").value.toUpperCase();
	var pass = document.getElementById("signin-password").value;
	
	xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (xhttp.readyState == 4 && xhttp.status == 200) {
			if(xhttp.responseText=='2')
				alert("Invalid USN or Password");
			else
			{
				window.location="home.php?usn="+xhttp.responseText;
			}
		}
	};
	
	xhttp.open("POST","php/signin.php",true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send("usn="+usn+"&password="+pass);
	console.log("TEST");
	
}


function register()
{
	
	var usn = document.getElementById("register-usn").value.toUpperCase();
	var cpass = document.getElementById("confirm-password").value;
	var pass = document.getElementById("register-password").value;
	if(pass!=cpass)
	{
		alert("Passwords do not match");	
		return;
	}
	var xhttp;
	xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (xhttp.readyState == 4 && xhttp.status == 200) {
			if(xhttp.responseText=='1')
				alert("Successfully registered");
			else
			{
				alert("Woops: "+ xhttp.responseText)
			}
		}
	};
	
	xhttp.open("POST","php/register.php",true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send("usn="+usn+"&password="+pass);

}

document.getElementById("signin-btn").onclick=signin;
document.getElementById("register-btn").onclick=register;

