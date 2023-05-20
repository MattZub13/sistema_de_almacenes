var tabla;

var barData = [
	{y: '2009', a: 100, b: 90},
	{y: '2010', a: 75, b: 65},
	{y: '2011', a: 50, b: 40},
	{y: '2012', a: 75, b: 65},
	{y: '2013', a: 50, b: 40},
	{y: '2014', a: 75, b: 65},
	{y: '2015', a: 100, b: 90},
	{y: '2016', a: 90, b: 75}
  ];
  
  function init() {
	new Morris.Bar({
	  element: 'donut-example',
	  data: barData,
	  xkey: 'y',
	  ykeys: ['a', 'b'],
	  labels: ['Series A', 'Series B']
	});
  }

//Función limpiar
function limpiar()
{
    $("#nombre").val("");
    $("#direccion").val("");
    $("#telefono").val("");
    $("#responsable").val("");
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
                        url: '../ajax/almacen.php?op=0',
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
		url: "../ajax/almacen.php?op=1",
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
    limpiar();
}

function mostrar(id_almacen) {
    $.post("../ajax/almacen.php?op=4", { id_almacen: id_almacen }, function (data, status) {
        data = JSON.parse(data);
        console.log(data);
        $("#id_almacen").val(data.id_almacen);
        $("#nombre").val(data.nombre_almacen)
        $("#direccion").val(data.direccion_almacen);
        $("#telefono").val(data.telefono);
		$("#responsable").val(data.responsable);
		$("#capacidad").val(data.capacidad);

    });
}

//Función para desactivar registros
function desactivar(id_almacen)
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
			$.post("../ajax/almacen.php?op=2", {id_almacen : id_almacen}, function(e){
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
function activar(id_almacen)
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
			$.post("../ajax/almacen.php?op=3", {id_almacen : id_almacen}, function(e){
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