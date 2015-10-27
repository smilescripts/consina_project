

function addField(){
	var div = document.createElement('div');
	div.innerHTML = "<input type='text' name='item_price[]' style='width:250px; margin-left:7px; margin-right:7px;'><input type='text' name='item_name[]' style='width:250px; margin-left:7px; margin-right:7px;'><input type='button' id='add_field()' onClick='addField()' value='+'><input type='button' onClick='removeField(this)' value='-'>";
	document.getElementById('children').appendChild(div);
}

function removeField(div){
	document.getElementById('children').removeChild(div.parentNode);
	i--;
}