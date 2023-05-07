var tabla;

document.addEventListener('DOMContentLoaded', function() {
    var fechaInput = document.getElementById('fecha');
    var fechaHoy = new Date().toISOString().split('T')[0];
    fechaInput.value = fechaHoy;
});

function init(){
    //Para validación
	$.post("../ajax/surtidor.php?op=5", function(r){
	    $("#ubicacion").html(r);
		$('#ubicacion').trigger('change.select2');
	});
    $.post("../ajax/vehiculo.php?op=5", function(r){
	    $("#tipo").html(r);
		$('#tipo').trigger('change.select2');
	});
	listar();
    $("#formulario").on("submit",function(e){
		guardaryeditar(e);	
	});
   
    
}

//Función limpiar
function limpiar()
{
    $("#placa").val("");

}





function listar(){
    tabla=$('#tableLista').DataTable(
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
                        url: '../ajax/vehiculo_surtidor.php?op=0',
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
		url: "../ajax/vehiculo_surtidor.php?op=1",
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
    limpiar();
}

function mostrar(id_vs)
{
	$.post("../ajax/vehiculo_surtidor.php?op=2",{id_vs : id_vs}, function(data, status)
	{
		data = $.parseJSON(data);
        $.post("../ajax/surtidor.php?op=5", function(r){
			$("#ubicacion").html(r);
			$('#ubicacion').trigger('change.select2');
		});
        $.post("../ajax/vehiculo.php?op=5", function(r){
			$("#tipo").html(r);
			$('#tipo').trigger('change.select2');
		});
 		
         $("#id_vs").val(data.id_vs);
		$("#fecha").val(data.fecha_limite);
 	});
}


init();