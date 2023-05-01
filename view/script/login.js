var tabla;

function init(){
    //Para validación
	
    $("#login").on("submit",function(e){
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


//Función para guardar o editar

function guardaryeditar(e)
{
	e.preventDefault(); //No se activará la acción predeterminada del evento
	$("#btnGuardar").prop("disabled",true);
	var formData = new FormData($("#login")[0]);
	$.ajax({
		url: "../ajax/empleado.php?op=5",
	    type: "POST",
	    data: formData,
	    contentType: false,
	    processData: false,

	    success: function(datos)
	    {    
            console.log(datos);
                if (datos==1)
                {
                    $(location).attr("href","articulo.php");            
                }
                else
                {
                    Swal.fire({
                        type: 'error',
						title: 'Error',
                        text: 'Usuario y/o Password incorrectos.',
                        footer: 'Cualquier información consulte con el administrador.'
                    });
                }
	    }

	});
    limpiar();
}

function mostrar(id_articulo)
{
	$.post("../ajax/articulo.php?op=4",{id_articulo : id_articulo}, function(data, status)
	{
		data = $.parseJSON(data);
		$("input[name=nombre]").val(data.nombre_articulo);
        $("#descripcion").val(data.descripcion_articulo);
        $("#precio").val(data.precio_unitario);
        $.post("../ajax/categoria.php?op=5", function(r){
			$("#categoria").html(r);
			$('#categoria').trigger('change.select2');
		});
 		$("#id_articulo").val(data.id_articulo);
 	});
}




init();