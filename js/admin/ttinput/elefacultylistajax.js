function getelefacultylist() {
	var degree=document.querySelector('input[name="degree"]:checked');
	var dept=document.getElementById("dept");
	var year=document.getElementById("year");
	var sem=document.querySelector('input[name="sem"]:checked');
	var eletype=document.querySelector('input[name="eletype"]:checked');
	var eleno=document.getElementById("eleno");
	var data = new FormData();
	data.append('degree',degree.value);
	data.append('dept',dept.value);
	data.append('year',year.value);
	data.append('sem',sem.value);
	data.append('eletype',eletype.value);
	data.append('eleno',eleno.value);
	xmlhttp = new XMLHttpRequest();
	xmlhttp.open("POST","http://localhost/src/admin/ttinput/getelefacultylist.php",true);
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("course-list").innerHTML = this.responseText;
        }
    };
    xmlhttp.send(data);
    document.getElementById("overlay-msg").innerHTML="";
}