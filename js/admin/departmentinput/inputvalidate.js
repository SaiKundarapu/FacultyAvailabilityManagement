function Validate()
{
    var degree=document.querySelector('input[name="degree"]:checked').value;
    var deptid= document.getElementById('deptid').value;
	var fname = document.getElementById('fname').value;
	var sname = document.getElementById('sname').value;
    var type=document.getElementById('type');

    if(!deptid.match(/^[a-zA-Z0-9\s_&'-]+$/))
    {
        document.getElementById('msg').innerHTML="*Enter a valid Id(No special character)";
        return false;
    }
    else if (!fname.match(/^[a-zA-Z\s_'&-]+$/)||!sname.match(/^[a-zA-Z\s_'&-]+$/)) 
    {
        document.getElementById('msg').innerHTML="*Enter a valid Name(No numerics & special character)";
        return false;
    }
    else
    {
        if(type.checked)
        {
            type="Foundational Course Department";
        }
        else
        {
            type="";
        }
    	document.getElementById('msg').innerHTML="";
        return confirm("Confirm Details:\nDegree:"+degree+"\nDepartmentId:"+deptid+"\nDepartment FullName:"+fname+"\nDepartment ShortName:"+sname+"\n"+type);
    }
}