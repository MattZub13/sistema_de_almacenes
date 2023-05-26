$(document).ready(function() {
    // Obtener el valor del parámetro "id_oficina_oficina" de la URL
    const urlParams = new URLSearchParams(window.location.search);

    id_oficina = urlParams.get('id_oficina');
	
    //mostrar(id_oficina);
	info_oficina(id_oficina);
	empleados(id_oficina);
	listar(id_oficina);
	$.post("../ajax/oficina.php?op=7&id_oficina="+parseInt(id_oficina), function(r){
		$("#id_empleado").html(r);
		$('#id_empleado').trigger('change.select2');
		
	});

	$.post("../ajax/sub_almacen.php?op=6", function(r){
		$("#id_sub_almacen").html(r);
		$('#id_sub_almacen').trigger('change.select2');
		
	});

	$.post("../ajax/articulo.php?op=5", function(r){
		$("#id_articulo").html(r);
		$('#id_articulo').trigger('change.select2');
		
	});
});
function init(){
	mostrarform(true);
    $("#formulario").on("submit",function(e){
		guardaryeditar(e);	
	});

	$("#detalle_form").on("submit",function(e){
		guardaryeditarform(e);	
	});
  
}


//Función mostrar formulario
function mostrarform(flag)
{
	if (flag)
	{
		$("#form_detalle").hide();
		$("#form_solicitud").show();
	}
	else
	{
		$("#form_detalle").show();
		$("#form_solicitud").hide();
	}
}

//Función limpiar






function listar(id_oficina){
    tabla=$('#tbllistado').DataTable(
        {
            "lengthMenu": [ 10, 25, 50, 75, 100 ],//mostramos el menú de registros a revisar
            "Processing": true,//Activamos el procesamiento del datatables
            "ServerSide": true,//Paginación y filtrado realizados por el servidor
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
            },
            dom: 'Bfrtip',//Definimos los elementos del control de tabla
            buttons: [		          
                        'copyHtml5',
                        'excelHtml5',
                        'csvHtml5',
                        'pdf'
                    ],
            "ajax":
                    {
                        url: "../ajax/detalle_oficina.php?op=0&id_oficina="+parseInt(id_oficina),
                        type : "get",
                        dataType : "json",						
                        error: function(e){
                            console.log(e.responseText);	
                        }
                    },
            "Destroy": true,
            "iDisplayLength": 10,//Paginación
            "order": [[ 0, "desc" ]]//Ordenar (columna,orden)
        }
    );
}

//Función para guardar o editar

function guardaryeditarform(e)
{
    
	e.preventDefault(); //No se activará la acción predeterminada del evento
	$("#btnGuardar").prop("disabled",true);
	var formData = new FormData($("#detalle_form")[0]);
	$.ajax({
		url: "../ajax/detalle_oficina.php?op=2",
	    type: "POST",
	    data: formData,
	    contentType: false,
	    processData: false,

	    success: function(datos)
	    {    
            mensaje=datos.split(":");
			if(mensaje[0]=="1"){               
			swal.fire(
				'Mensaje de Confirmación',
				mensaje[1],
				'success'

				).then(function() {
					console.log("piola");
				});
			}
			else{
				Swal.fire({
					type: 'error',
					title: 'Error',
					text: mensaje[1],
					footer: 'Verifique la información de Registro, en especial que la información no fué ingresada previamente a la Base de Datos.'
				});
				console.log(datos);
			}
	    }

	});

}

function guardaryeditar(e)
{
    
	e.preventDefault(); //No se activará la acción predeterminada del evento
	$("#btnGuardarDetalle").prop("disabled",true);
	var formData = new FormData($("#formulario")[0]);
	$.ajax({
		url: "../ajax/detalle_oficina.php?op=1",
	    type: "POST",
	    data: formData,
	    contentType: false,
	    processData: false,

	    success: function(datos)
	    {    
            mensaje=datos.split(":");
			if(mensaje[0]=="1"){               
			swal.fire(
				'Mensaje de Confirmación',
				mensaje[1],
				'success'

				).then(function() {
					tabla.ajax.reload();
					mostrarform(false);

					obtener_id();
				});
			}
			else{
				Swal.fire({
					type: 'error',
					title: 'Error',
					text: mensaje[1],
					footer: 'Verifique la información de Registro, en especial que la información no fué ingresada previamente a la Base de Datos.'
				});
				console.log(datos);
			}
	    }

	});

}

function obtener_id(){
	$.post("../ajax/detalle_oficina.php?op=5", function(data, status)
      {
		$("#id_solicitud").val(data);
	});
}




function info_oficina(id_oficina)
  {
      $.post("../ajax/oficina.php?op=4&id_oficina="+parseInt(id_oficina), function(data, status)
      {
          data = $.parseJSON(data);

		  var tituloElemento = document.querySelector("#titulo h1");
		  var descripcionElemento = document.querySelector("#descripcion");
		 
			tituloElemento.innerText = data.nombre_oficina;
			descripcionElemento.innerText = data.descripcion_oficina+data.ubicacion_oficina;
			$("#id_oficina").val(data.id_oficina);
	});

}

function mostrar(id_solicitud)
{
	$.post("../ajax/detalle_oficina.php?op=4",{id_solicitud : id_solicitud}, function(data, status)
	{
		data = $.parseJSON(data);
		console.log(data);
		$("#fecha").val(data.fecha_solicitud)
 		$("#id_solicitud").val(data.id_solicitud);
 	});
}


function detalle_solicitud(id_solicitud){
	$.post("../ajax/detalle_oficina.php?op=3&id_solicitud="+parseInt(id_solicitud), function(r)
	{
		$("#detalles").html(r);
 	});
}

function empleados(id_oficina){
	$.post("../ajax/oficina.php?op=6&id_oficina="+parseInt(id_oficina),function(r){
	    $("#empleados").html(r);
	});
}

init();