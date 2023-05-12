var tabla;
var detalle;
function init(){
    //Para validación
	$.post("../ajax/proveedor.php?op=5", function(r){
	    $("#id_proveedor").html(r);
		$('#id_proveedor').trigger('change.select2');
	});

	$.post("../ajax/articulo.php?op=5", function(r){
	    $("#id_articulo").html(r);
		$('#id_articulo').trigger('change.select2');
	});
	listar();
    $("#formulario").on("submit",function(e){
		guardaryeditar(e);	
	});
   
    
}

//Función limpia





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
                        url: '../ajax/ingreso.php?op=0',
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

function detalle(id_ingreso){
	console.log(id_ingreso);
	$.post("../ajax/ingreso.php?op=5&id_ingreso="+parseInt(id_ingreso),function(r){
		console.log(r.id_ingreso);
	    $("#detalles").html(r);
	});
}

//Función para guardar o editar

function guardaryeditar(e)
{
    
	e.preventDefault(); //No se activará la acción predeterminada del evento
	$("#btnGuardar").prop("disabled",true);
	var formData = new FormData($("#formulario")[0]);
	$.ajax({
		url: "../ajax/ingreso.php?op=1",
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
				console.log(datos);
			}
	    }

	});

}

function mostrar(id_ingreso)
{
	
	$.post("../ajax/ingreso.php?op=4",{id_ingreso : id_ingreso}, function(data, status)
	{
		data = $.parseJSON(data);
        $.post("../ajax/proveedor.php?op=5", function(r){
			$("#proveedor").html(r);
			$('#proveedor').trigger('change.select2');
		});
 		$("#id_ingreso").val(data.id_ingreso);
 	});
}


init();