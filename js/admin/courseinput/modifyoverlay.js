function modifyoverlay(degree,deptid,year,sem,ele,eletype,eleno,courseid,coursefn,coursesn,lab,lecture)
{
	if(degree=="BTECH")
	{
		document.querySelector("input[name='degree'][value='BTech']").checked=true;
		selecteddeptlist(degree,deptid,year);
	}
	else
	{
		document.querySelector("input[name='degree'][value='MTech']").checked=true;
		selecteddeptlist(degree,deptid,year);
	}
	document.querySelector("input[name='sem'][value='"+sem+"']").checked=true;
    setele(ele,eletype,eleno,lab,lecture);
    document.getElementById('courseid').value=courseid;
    document.getElementById('subfull').value=coursefn;
	document.getElementById('subshort').value=coursesn;
    document.getElementById('pk1').value=degree;
	document.getElementById('pk2').value=deptid;
	document.getElementById('pk3').value=year;
    document.getElementById('pk4').value=courseid;
	document.getElementById('overlay1').classList.add("is-open");
}

function removeoverlay()
{
	document.getElementById('overlay1').classList.remove("is-open");
}

function selecteddeptlist(degree,deptid,year){
	var data = new FormData();
	data.append('degree', degree);
	xmlhttp = new XMLHttpRequest();
	xmlhttp.open("POST","http://localhost/src/admin/courseinput/getdeptlist.php",true);
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("dept-list").innerHTML = this.responseText;
            document.getElementById("dept").value=deptid;
            document.getElementById("year").value=year;
        }
    };
    xmlhttp.send(data);
    document.getElementById("msg").innerHTML="";
    yearlist(degree);
}

function deptlist(degree){
	var data = new FormData();
	data.append('degree', degree.value);
	xmlhttp = new XMLHttpRequest();
	xmlhttp.open("POST","http://localhost/src/admin/courseinput/getdeptlist.php",true);
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("dept-list").innerHTML = this.responseText;
        }
    };
    xmlhttp.send(data);
    document.getElementById("msg").innerHTML="";
    yearlist(degree.value);
}

function yearlist(degree)
{
    if(degree.toUpperCase()=='BTECH')
    {
        document.getElementById("year-list").innerHTML='<select id="year" name="year"><option value="year" disabled selected hidden>Year</option><option value="1">1st Year</option><option value="2">2nd Year</option><option value="3">3rd Year</option><option value="4">4th Year</option></select>';
    }
    else
    {
        document.getElementById("year-list").innerHTML='<select id="year" name="year"><option value="year" disabled selected hidden>Year</option><option value="1">1st Year</option><option value="2">2nd Year</option></select>';
    }

}

function setele(ele,eletype,eleno,lab,lecture)
{
    if(ele=="NO")
    {
        document.querySelector("input[name='ele'][value='1']").checked=true;
        document.getElementById("ele-type-data").innerHTML="";
        document.getElementById("ele-no-data").innerHTML="";
        if(lab=="YES")
        {
            document.getElementById("type").innerHTML='<option value="1" selected>Lab</option> <option value="2">Lecture</option>';
        }
        else
        {
            document.getElementById("type").innerHTML='<option value="1">Lab</option> <option value="2" selected>Lecture</option>';
        }
    }
    else
    {
        document.querySelector("input[name='ele'][value='2']").checked=true;
        if(eletype=="1")
        {
            document.getElementById("ele-type-data").innerHTML='<input type="radio" name="eletype" value="1" checked>Open Elective <input type="radio" name="eletype" value="2">Professional Elective';
        }
        else
        {
            document.getElementById("ele-type-data").innerHTML='<input type="radio" name="eletype" value="1">Open Elective <input type="radio" name="eletype" value="2" checked>Professional Elective';
        }        
        document.getElementById("ele-no-data").innerHTML='<input type="number" name="eleno" id="eleno" min="1" placeholder="Elective Number"  onfocus="document.getElementById("msg").innerHTML="'+"''"+'" required>';
        document.getElementById("type").innerHTML='<option value="2" selected>Lecture</option>';
        document.getElementById("eleno").value=eleno;
    }
}

function hide(ele)
{
    if(ele.value=="1")
    {
        document.getElementById("ele-type-data").innerHTML="";
        document.getElementById("ele-no-data").innerHTML="";
        document.getElementById("type").innerHTML='<option value="0" disabled selected hidden>Lab/Lecture</option> <option value="1">Lab</option> <option value="2">Lecture</option>';
    }
    else
    {
        document.getElementById("ele-type-data").innerHTML='<input type="radio" name="eletype" value="1" required>Open Elective <input type="radio" name="eletype" value="2" required>Professional Elective';
        document.getElementById("ele-no-data").innerHTML='<input type="number" name="eleno" id="eleno" min="1" placeholder="Elective Number"  onfocus="document.getElementById("msg").innerHTML="'+"''"+'" required>';
        document.getElementById("type").innerHTML='<option value="2" selected>Lecture</option>';
    }
}