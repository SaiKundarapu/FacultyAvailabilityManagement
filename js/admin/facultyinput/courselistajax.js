function courselist(dept){
	var data = new FormData();
	data.append('dept', dept.value);
	xmlhttp = new XMLHttpRequest();
	xmlhttp.open("POST","http://localhost/src/admin/facultyinput/getcourselist.php",true);
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("course-list").innerHTML = this.responseText;
        }
    };
    xmlhttp.send(data);
    document.getElementById("msg").innerHTML="";
}