function insertcourse()
{
	var week=document.getElementById('week').innerHTML;
	var period=document.getElementById('period').innerHTML;
	var coursefacultylist=document.getElementsByName('coursefaculty');
	var ele=document.querySelector('input[name="ele"]:checked');
	var lab=document.querySelector('input[name="lab"]:checked');
	var count=0;
	if(ele.value=="3")
	{
		var data = new FormData();
		data.append('day',week);
		data.append('period',period);
		data.append('count',count);
		xmlhttp = new XMLHttpRequest();
		xmlhttp.open("POST","http://localhost/src/admin/ttinput/storetimetable.php",true);
	    xmlhttp.onreadystatechange = function() {
	        if (this.readyState == 4 && this.status == 200) {
	            document.getElementById(week+period).innerHTML="Free Period";
	            document.getElementById("overlay-msg").innerHTML="";
	            document.getElementById("ele-data").innerHTML='<input type="radio" name="ele" value="1" checked onclick="hide(this)">Non-Elective <input type="radio" name="ele" value="2" onclick="hide(this)">Elective <input type="radio" name="ele" value="3" onclick="hide(this)">Free Period';
	            document.getElementById("class-type").innerHTML='<input type="radio" name="lab" value="1" checked onclick="coursefacultylist(this)">Lab <input type="radio" name="lab" value="2" onclick="coursefacultylist(this)">Lecture';
	            document.getElementById("ele-type-data").innerHTML="";
	            document.getElementById("ele-no-data").innerHTML="";
	            document.getElementById("course-data").innerHTML='<div id="course-heading">Course-Faculty List</div> <div id="course-list"></div>';
	            document.getElementById("overlaydata").reset();
	            document.getElementById('overlay1').classList.remove("is-open");
	            document.getElementById('period-overlay').classList.remove("is-open");
	        }
	    };
	    xmlhttp.send(data);
	}
	else
	{
		if(lab==null)
		{
	        var selectedcoursefaculty="";
		}
		else if(lab.value==1)
	    {
			var selectedcoursefaculty="LAB<hr>";
	    }
	    else
	    {
	        var selectedcoursefaculty="";
	    }
		var coursefaculty=new Object();
		for(var i=0; i<coursefacultylist.length; i++)
		{
			if(coursefacultylist[i].type=='checkbox' && coursefacultylist[i].checked==true)
			{
				coursefaculty[count]=coursefacultylist[i].value;
				selectedcoursefaculty+=coursefacultylist[i].nextSibling.innerHTML+"<br>";
				count++;
			}
		}

		if(count==0)
		{
			document.getElementById("overlay-msg").innerHTML="*Select the Course";
			return;
		}

		var data = new FormData();
		data.append('day',week);
		data.append('period',period);
		data.append('count',count);
		data.append('coursefacultylist',JSON.stringify(coursefaculty));
		xmlhttp = new XMLHttpRequest();
		xmlhttp.open("POST","http://localhost/src/admin/ttinput/storetimetable.php",true);
	    xmlhttp.onreadystatechange = function() {
	        if (this.readyState == 4 && this.status == 200) {
	            document.getElementById(week+period).innerHTML=selectedcoursefaculty;
	            document.getElementById("overlay-msg").innerHTML="";
	            document.getElementById("ele-data").innerHTML='<input type="radio" name="ele" value="1" checked onclick="hide(this)">Non-Elective <input type="radio" name="ele" value="2" onclick="hide(this)">Elective <input type="radio" name="ele" value="3" onclick="hide(this)">Free Period';
	            document.getElementById("class-type").innerHTML='<input type="radio" name="lab" value="1" checked onclick="coursefacultylist(this)">Lab <input type="radio" name="lab" value="2" onclick="coursefacultylist(this)">Lecture';
	            document.getElementById("ele-type-data").innerHTML="";
	            document.getElementById("ele-no-data").innerHTML="";
	            document.getElementById("course-data").innerHTML='<div id="course-heading">Course-Faculty List</div> <div id="course-list"></div>';
	            document.getElementById("overlaydata").reset();
	            document.getElementById('overlay1').classList.remove("is-open");
	            document.getElementById('period-overlay').classList.remove("is-open");
	        }
	    };
	    xmlhttp.send(data);
	}
}