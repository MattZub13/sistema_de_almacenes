var tabla;
var tablas;

function init(){
    //Para validación
	listar();
	listar_solicitud();
	mostrarform(true);
	$.post("../ajax/articulo.php?op=5", function(r){
	    $("#articulo").html(r);
		$('#articulo').trigger('change.select2');
	});

	$.post("../ajax/articulo.php?op=5", function(r){
	    $("#articulo_solicitud").html(r);
		$('#articulo_solicitud').trigger('change.select2');
	});

	$.post("../ajax/proveedor.php?op=5", function(r){
	    $("#proveedor_solicitud").html(r);
		$('#proveedor_solicitud').trigger('change.select2');
	});

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

//Función limpiar
function limpiar()
{
    $("#cantidad").val("");
}


function listar_solicitud(){
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
                        
                        url: "../ajax/detalle_almacen.php?op=2",
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
                        
                        url: '../ajax/detalle_almacen.php?op=0',
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
		url: "../ajax/detalle_almacen.php?op=1",
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
					footer: 'Verifique la información de Surtidor, en especial que la información no fué ingresada previamente a la Base de Datos.'
				});
				console.log(datos);
			}
	    }

	});
}


function guardar_solicitud(e)
{
    
	e.preventDefault(); //No se activará la acción predeterminada del evento
	$("#btnGuardarSolicitud").prop("disabled",true);
	var formData = new FormData($("#formulario_solicitud")[0]);
	$.ajax({
		url: "../ajax/detalle_almacen.php?op=3",
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
		url: "../ajax/detalle_subalmacen.php?op=3",
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
	$.post("../ajax/detalle_subalmacen.php?op=7", function(data, status)
      {
		$("#id_solicitud").val(data);
	});
}

function detalle_solicitud(id_solicitud){
	$.post("../ajax/detalle_almacen.php?op=6&id_solicitud="+parseInt(id_solicitud), function(r)
	{
		$("#detalles").html(r);
 	});
}

function mostrar(id_detalle)
{
	$.post("../ajax/detalle_almacen.php?op=4",{id_detalle : id_detalle}, function(data, status)
	{
		data = JSON.parse(data);
        $("#cantidad").val(data.cantidad);
        $.post("../ajax/articulo.php?op=5", function(r){
			$("#articulo").html(r);
			$('#articulo').trigger('change.select2');
		});
        
 		$("#id_detalle").val(data.id_detalle);
 	});
}

function desactivar(id_detalle)
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
			$.post("../ajax/detalle_almacen.php?op=2", {id_detalle : id_detalle}, function(e){
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


function activar(id_detalle)
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
			$.post("../ajax/detalle_almacen.php?op=3", {id_detalle : id_detalle}, function(e){
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
