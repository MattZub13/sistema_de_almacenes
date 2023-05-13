$(document).ready(function() {
    // Obtener el valor del parámetro "id_oficina_oficina" de la URL
    const urlParams = new URLSearchParams(window.location.search);

    id_oficina = urlParams.get('id_oficina');
    mostrar(id_oficina);
	empleados(id_oficina);
});




  function mostrar(id_oficina)
  {
      $.post("../ajax/oficina.php?op=4&id_oficina="+parseInt(id_oficina), function(data, status)
      {
          data = $.parseJSON(data);
          console.log(data);

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