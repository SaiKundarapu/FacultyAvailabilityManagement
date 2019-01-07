function Validate()
{
    var fname = document.getElementById('fname').value;
    var mname = document.getElementById('mname').value;
    var lname = document.getElementById('lname').value;
    var title = document.getElementById('title').value;
    var id=document.getElementById('id').value;
    var degree=document.querySelector('input[name="degree"]:checked').value;
    var course=document.getElementsByName('course[]');
    var dept = document.getElementById('dept');
    var gender = document.getElementById('gender');
    var email=document.getElementById("email").value;
    var phno=document.getElementById("phno").value;
    var msg=document.getElementById('msg');
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    var phoneno = /^\d{10}$/;
    var courses="";
    if (!fname.match(/^[a-zA-Z\s\.]+$/)) 
    {
        msg.innerHTML="*Enter a valid FirstName(No numerics & special character)";
        return false;
    }
    else if(mname!=""&&!mname.match(/^[a-zA-Z\s\.]+$/))
    {
        msg.innerHTML="*Enter a valid Middle Name(No numerics & special character)";
        return false;
    }
    else if(lname!=""&&!lname.match(/^[a-zA-Z\s\.]+$/))
    {
        msg.innerHTML="*Enter a valid Last Name(No numerics & special character)";
        return false;
    }
    else if(gender.value=="gender")
    {
        msg.innerHTML="*Select Gender";
        return false;
    }
    else if(title=="title")
    {
        msg.innerHTML="*Select Designation";
        return false;
    }
    else if(!id.match(/^[a-zA-Z0-9\s_&'-]+$/))
    {
        msg.innerHTML ="*Invalid Id(No special character)";
        return false;
    }
    else if(!email.match(mailformat))
    {
        msg.innerHTML ="*Invalid EmailId";
        return false;
    }
    else if(!phno.match(phno))
    {
        msg.innerHTML ="*Invalid PhoneNumber";
        return false;
    }
    else if(dept.value=="dept")
    {
        msg.innerHTML="*Select Department";
        return false;
    }

    else
    {
        dept= dept.options[dept.selectedIndex].text;
        gender= gender.options[gender.selectedIndex].text;
        for (var i = 0; i < course.length; i++) {
          if (course[i].type=='checkbox' && course[i].checked) {
            courses = courses + course[i].nextElementSibling.innerHTML + ",";
            }
        }
        if(courses=="")
        {
            msg.innerHTML="*Select Courses";
            return false;
        }
        msg.innerHTML="";
        return confirm("confirm Details:\nFirstName:"+fname+"\nMiddleName:"+mname+"\nLastName:"+lname+"\nGender:"+gender+"\nTitle:"+title+"\nFacultyId:"+id+"\nEmail:"+email+"\nPhoneNumber:"+phno+"\nDegree:"+degree+"\nDepartment:"+dept+"\nCourses:"+courses);
    }
}