var ajax = new XMLHttpRequest();
function Get_wards(){
	if (!ajax) {
		alert("Ajax не инициализирован"); 
		return;
	}
	var selected_nurse = document.getElementById('nurse_name').value;
	ajax.onreadystatechange = wards_output;
	var params = 'select1=' + encodeURIComponent(selected_nurse);
	ajax.open("GET", "ward_enum.php?"+params, false);
	ajax.send(); 
}

function wards_output(){
	if (ajax.readyState == 4 && ajax.status == 200){
		var select = document.getElementById('tbody-wards');
		select.innerHTML = ajax.responseText;
	}
}

function Get_Nurses(){
	if (!ajax) {
		alert("Ajax не инициализирован"); 
		return;
	}
	var selecteddepart = document.getElementById('department_name').value;
	ajax.onreadystatechange = nurses_out;
	var params = 'depid=' + encodeURIComponent(selecteddepart);
	ajax.open("GET", "nurses_enum.php?"+params, false);
	ajax.send(null); 
}

function nurses_out(){
	if ( ajax.status == 200){
		var root = ajax.responseXML;
		var sname = root.getElementsByTagName("name")[0].firstChild.nodeValue; 
		var select = document.getElementById('tbody-nurses');
	 select.innerHTML = sname;
	}
}

function Get_Nurses_And_Wards_On_Shift(){
	if (!ajax) {
		alert("Ajax не инициализирован"); 
		return;
	}
	var selectedshift = document.getElementById('on_shift').value;
	ajax.onreadystatechange = info_out;
	var params = 'shift=' + encodeURIComponent(selectedshift);
	ajax.open("GET", "nurses_and_wards_on_shift.php?"+params, false);
	ajax.send(null); 	
}

function info_out(){
	if ( ajax.status == 200){
		var res = JSON.parse(ajax.responseText);	
		var select = document.getElementById('tbody-on-shift');
		for(var i = 0;i<res.name.length;i++) {
			select.innerHTML += "<tr><td>"+res.name[i]+"</td><td>"+res.ward[i]+"</td><td>"+res.date[i]+"</td></tr>";
		}
	}
}