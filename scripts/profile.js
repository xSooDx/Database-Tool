function changePassword()
{
	
	var curr=document.getElementById("current-password").value;
	var newp=document.getElementById("new-password").value;
	var conp=document.getElementById("confirm-password").value;	
	var xhttp = new XMLHttpRequest();
	
	xhttp.onreadystatechange = function(){
		if (xhttp.readyState == 4 && xhttp.status == 200)
		{
			if(xhttp.responseText=="success")
				alert("Password successfuly changed")
		}
	}
	if(newp==conp)
	{
		xhttp.open("POST","php/changepassword.php",true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		
		xhttp.send("curr="+curr+"&newp="+newp+"&conp="+conp);
	}
	else{
	}	
	
}

function editDetails()
{
	var ph=document.getElementById("n_ph_no").value;
	var email=document.getElementById("n_email").value;
	
	var xhttp = new XMLHttpRequest();
	
	xhttp.onreadystatechange=function() {
		if (xhttp.readyState == 4 && xhttp.status == 200)
		{
			alert(xhttp.responseText);
		}
	}
	
	xhttp.open("POST","php/editdetails.php",true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send("ph="+ph+"&email="+email);
	
}

function createProject()
{
	var id=document.getElementById("np_id").value;
	var title=document.getElementById("np_title").value;
	var desc=document.getElementById("np_desc").value;
	var dep=document.getElementById("np_dep").value;
	var leader=document.getElementById("np_usn").value;
	
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange=function() 
	{
		
		if (xhttp.readyState == 4 && xhttp.status == 200)
		{
			alert(xhttp.responseText);
		}
	}
	xhttp.open("POST","php/createproject.php",true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send("id="+id+"&title="+title+"&desc="+desc+"&dep="+dep+"&lead="+leader);
}

function createEvent()
{

	var id = document.getElementById("ne_id").value;
	var title = document.getElementById("ne_title").value;
	var desc = document.getElementById("ne_desc").value;
	var dep = document.getElementById("ne_dep").value;
	var time = document.getElementById("ne_time").value;
	var date = document.getElementById("ne_date").value;
	var venue = document.getElementById("ne_venue").value;
	var tag = document.getElementById("ne_tag").value;
	
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange=function() 
	{
		
		if (xhttp.readyState == 4 && xhttp.status == 200)
		{
			alert(xhttp.responseText);
		}
	}
	xhttp.open("POST","php/createevent.php",true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send("id="+id+"&title="+title+"&desc="+desc+"&dep="+dep+"&time="+time+"&date="+date+"&venue="+venue+"&tag="+tag);
	
	
	
}

document.getElementById("change-p-btn").onclick=changePassword;
document.getElementById("update-d-btn").onclick=editDetails;
document.getElementById("create-p-btn").onclick=createProject;
document.getElementById("create-e-btn").onclick=createEvent;
