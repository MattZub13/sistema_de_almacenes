function init(){
	$.post("../ajax/dashboard.php?op=0", function(r){
	    $("#solicitud_donut").html(r);
		$('#solicitud_donut').trigger('change.select2');
	});

    $.post("../ajax/dashboard.php?op=3", function(r){
	    $("#proveedores").html(r);
		$('#proveedores').trigger('change.select2');
	});

    $.post("../ajax/dashboard.php?op=4", function(r){
	    $("#oficinas").html(r);
		$('#oficinas').trigger('change.select2');
	});
    contar_empleado();
    contar_solicitud();
    contar_articulos();
}

function contar_empleado()
{
	$.post("../ajax/dashboard.php?op=1", function(data, status)
	{
		data = $.parseJSON(data);
		var empleado = document.querySelector("#empleados");	 
        empleado.innerText = data.total;
 	});
}

function contar_solicitud()
{
	$.post("../ajax/dashboard.php?op=2", function(data, status)
	{
		data = $.parseJSON(data);
		var solicitud = document.querySelector("#solicitudes");	 
        solicitud.innerText = data.total;
 	});
}

function contar_articulos()
{
	$.post("../ajax/dashboard.php?op=5", function(data, status)
	{
		data = $.parseJSON(data);
		var articulo = document.querySelector("#articulos");	 
        articulo.innerText = data.total;
 	});
}

init();