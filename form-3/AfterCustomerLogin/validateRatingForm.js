function validate()
{
	var error="";
	var name = document.getElementById("name");
	if(name.value == "")
	{
		error = "Enter movie id";
  		document.getElementById( "error_para" ).innerHTML = error;
  		return false;
 	}
 	
 	
 	var regid=document.getElementById("regid");
 	if(regid.value == "") 
 	{
 		error = "Enter your registration ID";
 		document.getElementById("error_para").innerHTML = error;
  		return false;
 	}

 	var rating = document.getElementById("ratingValue");
 	if(rating.value == "") 
 	{
 		error = "Enter a rating between 1 and 5";
 		document.getElementById("error_para").innerHTML = error;
  		return false;
 	}
 	
}
