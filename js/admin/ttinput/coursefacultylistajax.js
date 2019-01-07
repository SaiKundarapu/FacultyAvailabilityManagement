function coursefacultylist(classtype){
    var degree=document.querySelector('input[name="degree"]:checked');
    var dept=document.getElementById("dept");
    var year=document.getElementById("year");
    var sem=document.querySelector('input[name="sem"]:checked');
    var week=document.getElementById('week').innerHTML;
    var period=document.getElementById('period').innerHTML;
	var data = new FormData();
    if(classtype.value=="1")
    {
       var lab="lab=\'YES\'";
	   data.append('lab', lab);
    }
    else
    {
        var lab="lecture=\'YES\'";
        data.append('lab',lab);
    }
    data.append('degree',degree.value);
    data.append('dept',dept.value);
    data.append('year',year.value);
    data.append('sem',sem.value);
   
	xmlhttp = new XMLHttpRequest();
	xmlhttp.open("POST","http://localhost/src/admin/ttinput/getcoursefacultylist.php",true);
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("course-list").innerHTML = this.responseText;
        }
    };
    xmlhttp.send(data);
    document.getElementById("overlay-msg").innerHTML="";
}

function seclist(year){
    var degree=document.querySelector('input[name="degree"]:checked');
    var dept=document.getElementById("dept");
    var data = new FormData();
    data.append('degree',degree.value);
    data.append('dept',dept.value);
    data.append('year', year.value);
    xmlhttp = new XMLHttpRequest();
    xmlhttp.open("POST","http://localhost/src/admin/ttinput/getseclist.php",true);
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("sec-list").innerHTML = this.responseText;
        }
    };
    xmlhttp.send(data);
    document.getElementById("msg").innerHTML="";
}