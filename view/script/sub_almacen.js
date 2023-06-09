var tabla;

function init(){
    
	$.post("../ajax/sub_almacen.php?op=5", function(r){
	    $("#subalmacen_row").html(r);
		$('#subalmacen_row').trigger('change.select2');
	});

	$.post("../ajax/oficina.php?op=5", function(r){
	    $("#oficina").html(r);
		$('#oficina').trigger('change.select2');
	});
	listar();
    $("#formulario").on("submit",function(e){
		guardaryeditar(e);	
	});  
}
$(document).ready(function() {
	$("#subalmacen_detalle").click(function(event) {	
	  // Prevenir que se siga la URL por defecto de la etiqueta "a"
	  event.preventDefault();
	  // Obtener el valor del atributo "value" de la etiqueta "a"
	  const valor = $(this).attr("value");
	  console.log(valor);
	  // Redirigir a la siguiente página y pasar el valor como parámetro de la URL
	  window.location.href = "../view/detalle_subalmacen.php?id_sub_almacen=" + valor;
	});
});
//Función limpiar
function limpiar()
{
    $("#direccion").val("");
    $("#capacidad").val("");
}


function listar(){
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
                        url: '../ajax/sub_almacen.php?op=0',
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

function guardaryeditar(e) {
	e.preventDefault(); // No se activará la acción predeterminada del evento
	$("#btnGuardar").prop("disabled", true);
	var formData = new FormData($("#formulario")[0]);
	$.ajax({
		url: "../ajax/sub_almacen.php?op=1",
		type: "POST",
		data: formData,
		contentType: false,
		processData: false,
		success: function(datos) {
			mensaje = datos.split(":");
			if (mensaje[0] == "1") {
				swal.fire(
					'Mensaje de Confirmación',
					mensaje[1],
					'success'
				).then(function() {
					tabla.ajax.reload();
					limpiar();
					location.reload(); // Recargar la página
				});
			} else {
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


function mostrar(id_sub_almacen)
{
	$.post("../ajax/sub_almacen.php?op=4",{id_sub_almacen : id_sub_almacen}, function(data, status)
	{
		data = $.parseJSON(data);
		$("#direccion").val(data.direccion_sub_almacen);
        $("#capacidad").val(data.capacidad_sub_almacen);
        $.post("../ajax/oficina.php?op=5", function(r){
			$("#oficina").html(r);
			$('#oficina').trigger('change.select2');
		});
 		$("#id_sub_almacen").val(data.id_sub_almacen);
 	});
}

//Función para desactivar registros
function desactivar(id_sub_almacen)
{
	swal.fire({
		title: 'Mensaje de Confirmación',
		text: "¿Desea desactivar el Registro?",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: 'Cancelar',
		confirmButtonText: 'Desactivar'
	}).then((result) => {
		if (result.value) {
			$.post("../ajax/sub_almacen.php?op=2", {id_sub_almacen : id_sub_almacen}, function(e){
				mensaje=e.split(":");
					if(mensaje[0]=="1"){  
						swal.fire(
							'Mensaje de Confirmación',
							mensaje[1],
							'success'
						);  
						tabla.ajax.reload();
						location.reload(); // Recargar la página
					}	
					else{
						Swal.fire({
							type: 'error',
							title: 'Error',
							text: mensaje[1],
							footer: 'Verifique la información de Registro, en especial que la información no fué ingresada previamente a la Base de Datos.'
						});
					}			
        	});	
		}
	});   
}

//Función para activar registros
function activar(id_sub_almacen)
{
	swal.fire({
		title: 'Mensaje de Confirmación',
		text: "¿Desea activar el Registro?",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: 'Cancelar',
		confirmButtonText: 'Activar'
	}).then((result) => {
		if (result.value) {
			$.post("../ajax/sub_almacen.php?op=3", {id_sub_almacen : id_sub_almacen}, function(e){
				mensaje=e.split(":");
					if(mensaje[0]=="1"){  
						swal.fire(
							'Mensaje de Confirmación',
							mensaje[1],
							'success'
						);  
						tabla.ajax.reload();
						location.reload(); // Recargar la página
					}	
					else{
						Swal.fire({
							type: 'error',
							title: 'Error',
							text: mensaje[1],
							footer: 'Verifique la información de Registro, en especial que la información no fué ingresada previamente a la Base de Datos.'
						});
					}			
        	});	
		}
	}); 
}


init();