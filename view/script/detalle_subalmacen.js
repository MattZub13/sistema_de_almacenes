var tabla;
var tablas;


$(document).ready(function() {
    // Obtener el valor del parámetro "id_oficina_oficina" de la URL
    const urlParams = new URLSearchParams(window.location.search);

    id_sub_almacen = urlParams.get('id_sub_almacen');
    listar_articulos(id_sub_almacen);
	listar_solicitudes(id_sub_almacen);
	$("#id_sub_almacen").val(id_sub_almacen);
	$.post("../ajax/articulo.php?op=5", function(r){
	    $("#articulo_solicitud").html(r);
		$('#articulo_solicitud').trigger('change.select2');
	});
	
});
function init(){
	mostrarform(true);
    $("#formulario").on("submit",function(e){
		guardaryeditar(e);	
	});

	$("#form_solicitud").on("submit",function(e){
		guardar_solicitud(e);	
	});
    
	$("#detalle_form").on("submit",function(e){
		guardar_detalle(e);	
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

function listar_solicitudes(){
    tablas=$('#tbsolicitud').DataTable(
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
                        
                        url: "../ajax/detalle_subalmacen.php?op=0&id_sub_almacen="+parseInt(id_sub_almacen),
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

function guardar_solicitud(e)
{
    
	e.preventDefault(); //No se activará la acción predeterminada del evento
	$("#btnGuardarSolicitud").prop("disabled",true);
	var formData = new FormData($("#formulario_solicitud")[0]);
	$.ajax({
		url: "../ajax/detalle_subalmacen.php?op=1",
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
					tablas.ajax.reload();
					mostrarform(false);
					obtener_id();
				});
			}
			else{
				Swal.fire({
					type: 'error',
					title: 'Error',
					text: mensaje[1],
					footer: 'Verifique la información de Surtidor, en especial que la información no fué ingresada previamente a la Base de Datos.'
				});
				console.log(datos);
			}
	    }

	});
}

function guardar_detalle(e)
{
    
	e.preventDefault(); //No se activará la acción predeterminada del evento
	$("#btnGuardarDetalle").prop("disabled",true);
	var formData = new FormData($("#detalle_form")[0]);
	$.ajax({
		url: "../ajax/detalle_subalmacen.php?op=2",
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

function obtener_id(){
	$.post("../ajax/detalle_subalmacen.php?op=6", function(data, status)
      {
		$("#id_solicitud").val(data);
	});
}

function listar_articulos(id_sub_almacen)
{
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
                        
                        url: '../ajax/detalle_subalmacen.php?op=4&id_sub_almacen='+parseInt(id_sub_almacen),
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

function detalle_solicitud(id_solicitud){
	$.post("../ajax/detalle_subalmacen.php?op=7&id_solicitud="+parseInt(id_solicitud), function(r)
	{
		$("#detalles").html(r);
 	});
}

function completar(id_solicitud)
{
	swal.fire({
		title: 'Mensaje de Confirmación',
		text: "¿La solicitud fue completada?",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: 'Cancelar',
		confirmButtonText: 'Completada'
	}).then((result) => {
		if (result.value) {
			$.post("../ajax/detalle_subalmacen.php?op=8", {id_solicitud : id_solicitud}, function(e){
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
