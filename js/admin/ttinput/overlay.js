function periodoverlay(activeEle)
{
	var week=activeEle.id.slice(0,-1);
	var period=activeEle.id.slice(-1);
	document.getElementById('week').innerHTML=week;
	document.getElementById('period').innerHTML=period;
	document.getElementById('overlay1').classList.add("is-open");
	document.getElementById('period-overlay').classList.add("is-open");
	var classtype=document.querySelector('input[name="lab"]:checked');
	coursefacultylist(classtype);
}

function removeoverlay()
{
	document.getElementById("overlaydata").reset();
	document.getElementById('overlay1').classList.remove("is-open");
	document.getElementById('period-overlay').classList.remove("is-open");
	document.getElementById("ele-data").innerHTML='<input type="radio" name="ele" value="1" checked onclick="hide(this)">Non-Elective <input type="radio" name="ele" value="2" onclick="hide(this)">Elective <input type="radio" name="ele" value="3" onclick="hide(this)">Free Period';
	document.getElementById("class-type").innerHTML='<input type="radio" name="lab" value="1" checked onclick="coursefacultylist(this)">Lab <input type="radio" name="lab" value="2" onclick="coursefacultylist(this)">Lecture';
	document.getElementById("ele-type-data").innerHTML="";
	document.getElementById("ele-no-data").innerHTML="";
	document.getElementById("course-data").innerHTML='<div id="course-heading">Course-Faculty List</div> <div id="course-list"></div>';
}

function showtimetable()
{
	var degree=document.querySelector('input[name="degree"]:checked');
	var dept=document.getElementById("dept");
	var year=document.getElementById("year");
	var sec=document.getElementById("sec");
	var sem=document.querySelector('input[name="sem"]:checked');
	if(degree==null)
	{
		document.getElementById("msg").innerHTML="*Select the Degree";
	}
	else if(dept.value=="dept")
	{
		document.getElementById("msg").innerHTML="*Select the Department";
	}
	else if(year.value=="year")
	{
		document.getElementById("msg").innerHTML="*Select the Year";
	}
	else if(sec.value=='sec')
	{
		document.getElementById("msg").innerHTML="*Select the Section";
	}
	else if(sem==null)
	{
		document.getElementById("msg").innerHTML="*Select the Semister";
	}
	else
	{
		degree=degree.value;
		sem=sem.value;
		if(degree=="BTech")
		{
			document.querySelector('input[name="degree"]').readOnly=true;
			document.getElementById('mtech').style.display="none";
			document.getElementById('mt').style.display="none";
		}
		else
		{
			document.querySelector('input[name="degree"]').readOnly=true;
			document.getElementById('btech').style.display="none";
			document.getElementById('bt').style.display="none";
		}
		dept.readOnly=true;
		year.readOnly=true;
		sec.readOnly=true;
		if(sem=="1")
		{
			document.querySelector('input[name="sem"]').readOnly=true;
			document.getElementById('sem2').style.display="none";
			document.getElementById('2').style.display="none";
		}
		else
		{
			document.querySelector('input[name="sem"]').readOnly=true;
			document.getElementById('sem1').style.display="none";
			document.getElementById('1').style.display="none";
		}
		document.getElementById("button1").style.display="none";
		document.getElementById("tt-data-table").style.display="table";
		document.getElementById("msg").innerHTML="";
	}
}

function hide(ele)
{
    if(ele.value=="1")
    {
    	document.getElementById("class-type").innerHTML='<input type="radio" name="lab" value="1" checked onclick="coursefacultylist(this)">Lab <input type="radio" name="lab" value="2" onclick="coursefacultylist(this)">Lecture';
        document.getElementById("ele-type-data").innerHTML="";
        document.getElementById("ele-no-data").innerHTML="";
        document.getElementById("course-data").innerHTML='<div id="course-heading">Course-Faculty List</div> <div id="course-list"></div>';
        var classtype=document.querySelector('input[name="lab"]:checked');
        coursefacultylist(classtype);
    }
    else if(ele.value=="2")
    {
    	document.getElementById("class-type").innerHTML="";
        document.getElementById("ele-type-data").innerHTML='<input type="radio" name="eletype" value="OE" checked onclick="getelenolist()">Open Elective <input type="radio" name="eletype" value="PE" onclick="getelenolist()">Professional Elective';
        document.getElementById("course-data").innerHTML='<div id="course-heading">Course-Faculty List</div> <div id="course-list"></div>';
    	getelenolist();
    }
    else
    {
    	document.getElementById("class-type").innerHTML="";
        document.getElementById("ele-type-data").innerHTML="";
        document.getElementById("ele-no-data").innerHTML="";
        document.getElementById("course-data").innerHTML="";
    }
}