var tabla;

function init() {
    //Para validación
    listar();

}



function listar() {
    tabla = $('#tableLista').DataTable(
        {
            "lengthMenu": [10, 25, 50, 75, 100],//mostramos el menú de registros a revisar
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

                url: '../ajax/proveedor.php?op=0',
                type: "get",
                dataType: "json",
                error: function (e) {
                    console.log(e.responseText);
                }
            },
            "Destroy": true,
            "iDisplayLength": 10,//Paginación
            "order": [[0, "desc"]]//Ordenar (columna,orden)
        }
    );
}

function mostrar(id_proveedor) {
    $.post("../ajax/proveedor.php?op=4", { id_proveedor: id_proveedor }, function (data, status) {
        data = JSON.parse(data);
        console.log(data);
        $("#id_proveedor").val(data.id_proveedor);
        $("#nombre").val(data.nombre_proveedor);
        $("#direccion").val(data.direccion_proveedor);
        $("#correo").val(data.correo_proveedor);
        $("#id_almacen").val(data.id_almacen);

    });
}


init();
