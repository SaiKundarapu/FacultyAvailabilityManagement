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
    yearlist(degree);
}
function yearlist(degree)
{
    if(degree.value=='BTech')
    {
        document.getElementById("year-list").innerHTML='<select id="year" name="year"><option value="year" disabled selected hidden>Year</option><option value=1>1st Year</option><option value=2>2nd Year</option><option value=3>3rd Year</option><option value=4>4th Year</option></select>';
    }
    else
    {
        document.getElementById("year-list").innerHTML='<select id="year" name="year"><option value="year" disabled selected hidden>Year</option><option value=1>1st Year</option><option value=2>2nd Year</option></select>';
    }

}