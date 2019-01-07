function modifyoverlay(fname,mname,lname,gender,title,facultyid,emailid,phno,degree,deptid,courses)
{
	document.getElementById('fname').value=fname;
	document.getElementById('mname').value=mname;
	document.getElementById('lname').value=lname;
	document.getElementById('gender').value=gender;
	document.getElementById('title').value=title;
	document.getElementById('id').value=facultyid;
	document.getElementById('email').value=emailid;
	document.getElementById('phno').value=phno;
	if(degree=="BTECH")
	{
		document.querySelector("input[name='degree'][value='BTech']").checked=true;
		selecteddeptlist(degree,deptid);
	}
	else
	{
		document.querySelector("input[name='degree'][value='MTech']").checked=true;
		selecteddeptlist(degree,deptid);
	}
	selectedcourselist(courses,deptid);
	document.getElementById('pk1').value=degree;
	document.getElementById('pk2').value=deptid;
    document.getElementById('pk3').value=facultyid;
	document.getElementById('overlay1').classList.add("is-open");
}

function removeoverlay()
{
	document.getElementById('overlay1').classList.remove("is-open");
}

function selecteddeptlist(degree,deptid){
	var data = new FormData();
	data.append('degree', degree);
	xmlhttp = new XMLHttpRequest();
	xmlhttp.open("POST","http://localhost/src/admin/facultyinput/getdeptlist.php",true);
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("dept-list").innerHTML = this.responseText;
			document.getElementById("dept").value=deptid;
		}
	};
	xmlhttp.send(data);
	document.getElementById("msg").innerHTML="";
}

function selectedcourselist(courses,deptid)
{
	var data = new FormData();
	data.append('dept', deptid);
	xmlhttp = new XMLHttpRequest();
	xmlhttp.open("POST","http://localhost/src/admin/facultyinput/getcourselist.php",true);
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("course-list").innerHTML = this.responseText;
            for(var i=0;i<courses.length;i++)
            {
            	document.querySelector("input[name='course[]'][value='"+courses[i]+"']").checked=true;
            }
        }
    };
    xmlhttp.send(data);
    document.getElementById("msg").innerHTML="";
}

function deptlist(degree){
	var data = new FormData();
	data.append('degree', degree.value);
	xmlhttp = new XMLHttpRequest();
	xmlhttp.open("POST","http://localhost/src/admin/facultyinput/getdeptlist.php",true);
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("dept-list").innerHTML = this.responseText;
		}
	};
	xmlhttp.send(data);
	document.getElementById("msg").innerHTML="";
}