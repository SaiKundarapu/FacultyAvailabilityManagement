function Validate()
{
    var degree=document.querySelector('input[name="degree"]:checked').value;
    var dept = document.getElementById('dept');
	var batch = document.getElementById('batch').value;   
    var year = document.getElementById('year').value;
    var sections=document.getElementById('sections').value;
    if(dept.value=="dept")
    {
        document.getElementById('msg').innerHTML="*Select Department";
        return false;
    }
    else if (!batch.match(/^\d{4}-\d{4}$/)) 
    {
        document.getElementById('msg').innerHTML="*Enter a valid Batch(Eg:2015-2019)";
        return false;
    }
    else if(year=="year")
    {
        document.getElementById('msg').innerHTML="*Select Year";
        return false;
    }
    else
    {
    	document.getElementById('msg').innerHTML="";
        dept= dept.options[dept.selectedIndex].text;
        return  confirm("confirm Details: Class\nDegree:"+degree+"\nDepartment:"+dept+"\nYear:"+year+"\nBatch:"+batch+"\nNo.of Sections:"+sections);
    }

}