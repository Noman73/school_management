
//javaScript form validation with noman
function validate(){  
var name=document.wForm.name.value;
var email=document.wForm.email.value;
  
if (name==null || name==""){  
   document.getElementById("getName").innerHTML="Ener valid Name"; 
  return false;  
} else{
	document.getElementById("getName").innerHTML="success";
	return true;
}
if (email==null || email==""){  
   document.getElementById("getEmail").innerHTML="Ener valid Email"; 
  return false;  
}else{
	 document.getElementById("getEmail").innerHTML="success"; 
	 return true;
}

} 