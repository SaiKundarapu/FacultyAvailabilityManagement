function Validate() 
{
	var username=document.getElementById("username");
	var msg=document.getElementById('msg');
	var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	var phoneno = /^\d{10}$/;
	if(username.value!="")
	{
		if(username.value.match(mailformat)||username.value.match(phoneno))
		{
			msg.innerHTML ="";
			var submit=document.getElementById("submit");
			submit.disabled=false;
			submit.style.backgroundColor="#595088";
			submit.style.cursor="pointer";
			return true;
		}
		else
		{
			msg.innerHTML ="*Invalid PhoneNumber or EmailId";
			return false;
		}
	}
	else
	{
		return false;
	}
}