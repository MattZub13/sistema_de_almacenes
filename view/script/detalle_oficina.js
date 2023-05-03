
$(document).ready(function() {
    // Obtener el valor del parámetro "id_oficina_oficina" de la URL
    const urlParams = new URLSearchParams(window.location.search);
    
    id_oficina = urlParams.get('id_oficina');
    mostrar(id_oficina);
});




  function mostrar(id_oficina)
  {
      $.post("../ajax/oficina.php?op=4",{id_oficina : id_oficina}, function(data, status)
      {
          data = $.parseJSON(data);
          console.log(data);
          $("#titulo").val(data.nombre_oficina);
          $("#descripcion").val(data.descripcion_oficina);
       });
  }

