function modifyoverlay(degree,deptid,fullname,shortname,iscoursedept)
{
	if(degree=="BTECH")
	{
		document.querySelector("input[name='degree'][value='BTech']").checked=true;
	}
	else
	{
		document.querySelector("input[name='degree'][value='MTech']").checked=true;
	}
	document.getElementById('deptid').value=deptid;
	document.getElementById('fname').value=fullname;
	document.getElementById('sname').value=shortname;
	if(iscoursedept=="YES")
	{
		document.querySelector("input[name='type'][value='Yes']").checked=true;
	}
	document.getElementById('pk1').value=degree;
	document.getElementById('pk2').value=deptid;
	document.getElementById('overlay1').classList.add("is-open");
}

function removeoverlay()
{
	document.getElementById('overlay1').classList.remove("is-open");
}