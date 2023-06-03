var tabla;
function init(){
	$.post("../ajax/oficina.php?op=0", function(r){
	    $("#oficina_row").html(r);
		$('#oficina_row').trigger('change.select2');
	});
    $("#formulario").on("submit",function(e){
		guardaryeditar(e);	
	});

	listar();
    
}

$(document).ready(function() {
	$("#oficina_detalle").click(function(event) {
	  // Prevenir que se siga la URL por defecto de la etiqueta "a"
	  event.preventDefault();
	  // Obtener el valor del atributo "value" de la etiqueta "a"
	  const valor = $(this).attr("value");
	  console.log(valor);
	  // Redirigir a la siguiente página y pasar el valor como parámetro de la URL
	  window.location.href = "../view/detalle_oficina.php?id_oficina=" + valor;
	});
  });

//Función limpiar
function limpiar()
{
    $("#nombre").val("");
    $("#descripcion").val("");
    $("#ubicacion").val("");
	$("#telefono").val("");
	$("id_oficina").val("");
	
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
                        url: '../ajax/oficina.php?op=8',
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

function guardaryeditar(e)
{
    
	e.preventDefault(); //No se activará la acción predeterminada del evento
	$("#btnGuardar").prop("disabled",true);
	var formData = new FormData($("#formulario")[0]);
	$.ajax({
		url: "../ajax/oficina.php?op=1",
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
					limpiar();
					location.reload(); // Recargar la página
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

function mostrar(id_oficina)
{
	$.post("../ajax/oficina.php?op=9",{id_oficina : id_oficina}, function(data, status)
	{
		data = $.parseJSON(data);
		$("#nombre").val(data.nombre_oficina);
        $("#descripcion").val(data.descripcion_oficina);
        $("#ubicacion").val(data.ubicacion_oficina);
		$("#telefono").val(data.telefono_oficina);
        
 		$("#id_oficina").val(data.id_oficina);
 	});
}

//Función para desactivar registros
function desactivar(id_oficina)
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
			$.post("../ajax/oficina.php?op=2", {id_oficina : id_oficina}, function(e){
				mensaje=e.split(":");
					if(mensaje[0]=="1"){  
						swal.fire(
							'Mensaje de Confirmación',
							mensaje[1],
							'success'
						);  
						tabla.ajax.reload();
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
function activar(id_oficina)
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
			$.post("../ajax/oficina.php?op=3", {id_oficina : id_oficina}, function(e){
				mensaje=e.split(":");
					if(mensaje[0]=="1"){  
						swal.fire(
							'Mensaje de Confirmación',
							mensaje[1],
							'success'
						);  
						tabla.ajax.reload();
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