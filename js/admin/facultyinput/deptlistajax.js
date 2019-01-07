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