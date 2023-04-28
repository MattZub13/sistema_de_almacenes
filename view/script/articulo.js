var tabla;

function init(){
    //Para validación
	listar();
    $("#formulario").on("submit",function(e){
		guardaryeditar(e);	
	});
    
}

//Función limpiar
function limpiar()
{
    $("#nombre").val("");
    $("#descripcion").val("");
    $("#precio").val("");
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
                        url: '../ajax/articulo.php?op=0',
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
		url: "../ajax/articulo.php?op=1",
	    type: "POST",
	    data: formData,
	    contentType: false,
	    processData: false,

	    success: function(datos)
	    {    
            console.log(datos);
            tabla.ajax.reload();
	    }

	});
    limpiar();
}

function mostrar(id_articulo)
{
	$.post("../ajax/articulo.php?op=2",{id_articulo : id_articulo}, function(data, status)
	{
		data = JSON.parse(data);		
		console.log('funciona');
		$("#nombre").val(data.nombre_articulo);
        $("#descripcion").val(data.descripcion_articulo);
        $("#precio").val(data.precio_unitario);;
        $('select[name=categoria]').val(data.id_categoria);
 		$("#id_articulo").val(data.id_articulo);
 	});
}


init();