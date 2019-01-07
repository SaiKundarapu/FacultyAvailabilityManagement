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
    yearlist(degree);
}

function yearlist(degree)
{
    if(degree.value=='BTech')
    {
        document.getElementById("year-list").innerHTML='<select id="year" name="year"><option value="year" disabled selected hidden>Year</option><option value="1">1st Year</option><option value="2">2nd Year</option><option value="3">3rd Year</option><option value="4">4th Year</option></select>';
    }
    else
    {
        document.getElementById("year-list").innerHTML='<select id="year" name="year"><option value="year" disabled selected hidden>Year</option><option value="1">1st Year</option><option value="2">2nd Year</option></select>';
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