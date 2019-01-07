function Validate()
{
    var degree=document.querySelector('input[name="degree"]:checked').value;
    var year = document.getElementById('year').value;
    var sem=document.querySelector('input[name="sem"]:checked').value;
    var ele=document.querySelector('input[name="ele"]:checked').value;
    var courseid= document.getElementById('courseid').value;
    var subfull=document.getElementById('subfull').value;
    var subshort=document.getElementById('subshort').value;
    var dept = document.getElementById('dept');
    var year = document.getElementById('year').value;
    var type = document.getElementById('type');
    if(dept.value=="dept")
    {
        document.getElementById('msg').innerHTML="*Select Department";
        return false;
    }
    else if(year=="year")
    {
        document.getElementById('msg').innerHTML="*Select Year";
        return false;
    }
    else if (!courseid.match(/^[a-zA-Z0-9\s_&'-]+$/)) 
    {
        document.getElementById('msg').innerHTML="*Enter a valid Id(No special character)";
        return false;
    }
    else if (!subfull.match(/^[a-zA-Z0-9\s_&'-]+$/)||!subshort.match(/^[a-zA-Z0-9\s_&'-]+$/)) 
    {
        document.getElementById('msg').innerHTML="*Enter a valid Name(no special character)";
        return false;
    }
    else if(type.value=="0")
    {
        document.getElementById('msg').innerHTML="*Select type of the course";
        return false;
    }
    else
    {
    	document.getElementById('msg').innerHTML="";
        dept= dept.options[dept.selectedIndex].text;
        type= type.options[type.selectedIndex].text;
        if(ele=="2")
        {
            var eletype=document.querySelector('input[name="eletype"]:checked').value;
            if(eletype=="1")
            {
                eletype="OpenElective";
            }
            else
            {
                eletype="ProfessionalElective";
            }
            var eleno=document.getElementById('eleno').value;
            ele="YES\nElectiveType:"+eletype+"\nElectiveNumber:"+eleno;
        }
        else
        {
            ele="NO";
        }
        return confirm("confirm Details:\nDegree:"+degree+"\nDepartment:"+dept+"\nYear:"+year+"\nSem:"+sem+"\nElective:"+ele+"\nCourseId:"+courseid+"\nCourseFullName:"+subfull+"\nCourseShortName:"+subshort+"\nCourseType:"+type);
    }

}