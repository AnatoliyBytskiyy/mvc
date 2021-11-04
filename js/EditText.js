function editText(e, txt, id)
{
  e.preventDefault();

  var form = document.querySelector('#link' + id);
  	form.firstChild.remove()

  var div_row = document.createElement("div");
  	div_row.className = "row";
  	form.appendChild(div_row);

  var div_col_1 = document.createElement("div");
  	div_col_1.className = "col";
  	div_row.appendChild(div_col_1);

  var input_id = document.createElement("input");
	input_id.type = "hidden";
	input_id.value = id;
	input_id.setAttribute('name', 'edit[id]');
	input_id.className = "form-control"; 
	div_col_1.appendChild(input_id);

  var input_txt = document.createElement("input");
	input_txt.type = "text";
	input_txt.setAttribute('name', 'edit[txt]');
	input_txt.className = "form-control";
	div_col_1.appendChild(input_txt);

  var btn = "<div class='row'><div class='col'><button type='submit' class='btn btn-outline-primary w-100'>Редактировать</button><button type='button' class='btn btn-outline-primary w-100' onclick='exit(" + id + ", " + "\"" + txt + "\"" + ");'>x</button></div></div>";
	form.innerHTML += btn;
}

function exit(id, txt)
{
	var form = document.querySelector('#link' + id);
 	var link = "<a href='#' onclick='editText(event, " + "\"" + txt + "\"" + ", " + id + ")'>" + txt + "</a>";
  form.innerHTML = link;
}