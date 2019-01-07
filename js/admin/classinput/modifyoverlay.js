function modifyoverlay(degree,deptid,batch,year,sections)
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
	document.getElementById('batch').value=batch;
	document.getElementById('sections').value=sections;
	document.getElementById('pk1').value=degree;
	document.getElementById('pk2').value=deptid;
	document.getElementById('pk3').value=year;
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
	xmlhttp.open("POST","http://localhost/src/admin/classinput/getdeptlist.php",true);
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
	xmlhttp.open("POST","http://localhost/src/admin/classinput/getdeptlist.php",true);
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
        document.getElementById("year-list").innerHTML='<select id="year" name="year"><option value="year" disabled selected hidden>Year</option><option value=1>1st Year</option><option value=2>2nd Year</option><option value=3>3rd Year</option><option value=4>4th Year</option></select>';
    }
    else
    {
        document.getElementById("year-list").innerHTML='<select id="year" name="year"><option value="year" disabled selected hidden>Year</option><option value=1>1st Year</option><option value=2>2nd Year</option></select>';
    }

}