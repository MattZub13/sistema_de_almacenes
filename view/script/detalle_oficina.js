$(document).ready(function() {
    // Obtener el valor del parámetro "id_oficina_oficina" de la URL
    const urlParams = new URLSearchParams(window.location.search);

function init(){
	listar();
    $("#formulario").on("submit",function(e){
		guardaryeditar(e);	
	});
   
    
}

//Función limpiar
function limpiar()
{
    $("#placa").val("");
    $("#fecha").val("");
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
                        url: '../ajax/detalle_oficina.php?op=0',
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

function mostrar(id_solicitud)
{
	$.post("../ajax/detalle_oficina.php?op=4",{id_solicitud : id_solicitud}, function(data, status)
	{
		data = $.parseJSON(data);
        $.post("../ajax/vehiculo.php?op=5", function(r){
			$("#placa_vehiculo").html(r);
			$('#placa_vehiculo').trigger('change.select2');
        $("#fecha").val(data.fecha_solicitud)

		  var tituloElemento = document.querySelector("#titulo h1");
		  var descripcionElemento = document.querySelector("#descripcion");

			tituloElemento.innerText = data.nombre_oficina;
			descripcionElemento.innerText = data.descripcion_oficina+data.ubicacion_oficina;
    	});
}

function empleados(id_oficina){
	$.post("../ajax/oficina.php?op=6&id_oficina="+parseInt(id_oficina),function(r){
		console.log(r);
	    $("#empleados").html(r);
	});
}