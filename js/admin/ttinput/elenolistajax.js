function getelenolist() {
	var degree=document.querySelector('input[name="degree"]:checked');
	var dept=document.getElementById("dept");
	var year=document.getElementById("year");
	var sem=document.querySelector('input[name="sem"]:checked');
	var eletype=document.querySelector('input[name="eletype"]:checked');
	var data = new FormData();
	data.append('degree',degree.value);
	data.append('dept',dept.value);
	data.append('year',year.value);
	data.append('sem',sem.value);
	data.append('eletype',eletype.value)
	xmlhttp = new XMLHttpRequest();
	xmlhttp.open("POST","http://localhost/src/admin/ttinput/getelenolist.php",true);
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("ele-no-data").innerHTML = this.responseText;
            getelefacultylist();
        }
    };
    xmlhttp.send(data);	
}