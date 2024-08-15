var init = () => {
    $("#frm_actores").on("submit", (e) => {
      guardaryeditar(e);
    });
    $("#frm_actoresac").on("submit", (e) => {
      actualizar(e);
    });
  };
  
  $().ready(() => {
    cargaTabla();
  });
  
  var cargaTabla = () => {
    $.get("../controllers/actores.controller.php?op=todos", (listaActores) => {
      var html = "";
      console.log(listaActores);
      listaActores = JSON.parse(listaActores);
      console.log(listaActores);
      $.each(listaActores, (index, actor) => {
        html += `<tr>
                  <td>${actor.actor_id}</td>
                  <td>${actor.nombre}</td>
                  <td>${actor.apellido}</td>
                  <td>${actor.fecha_nacimiento}</td>
                  <td>${actor.nacionalidad}</td>
                  <td>
                    <button class="btn btn-primary btn-edit">Editar</button> 
                    <button class="btn btn-danger btn-delete">Eliminar</button>
                  </td>
                  </tr>
                  `;
      });
      $("#cuerpoactores").html(html);
    });
    obtener_data_editar ('#cuerpoactores');
    eliminar ('#cuerpoactores');
  };

  var obtener_data_editar = function(tbody){
    $(tbody).on('click', 'button.btn-edit', function(){
      $("#modalAc").modal("show");
      var row = $(this).closest('tr');
      var data = {
          id: row.find('td:eq(0)').text(),
          nombre: (row.find('td:eq(1)').text()),
          apellido: row.find('td:eq(2)').text(),
          fecha_nacimiento: row.find('td:eq(3)').text(),
          nacionalidad: row.find('td:eq(4)').text()
      };
      
      var actor_id = $("#actor_idac").val(data.id);
      var nombre = $("#nombreac").val(data.nombre);
      var apellido = $("#apellidoac").val(data.apellido);
      var fecha_nacimiento = $("#fecha_nacimientoac").val(data.fecha_nacimiento);
      var nacionalidad = $("#nacionalidadac").val(data.nacionalidad);

      
      
      console.log(data);
    });
}

var eliminar = function(tbody){
  $(tbody).on('click', 'button.btn-delete', function(){
    var row = $(this).closest('tr');
    var data = {
      actor_id: row.find('td:eq(0)').text()
    };
  var formData = new FormData();
  formData.append('actor_id', data.actor_id);

    $.ajax({
      url: "../controllers/actores.controller.php?op=eliminar",
      type: "POST",
      data: formData,
      contentType: false,
      processData: false,
      success: function (datos) {
        alert("Eliminado");
        cargaTabla();
      },
    });
  });
}

  
  var guardaryeditar = (e) => {
    e.preventDefault();
    var formData = new FormData($("#frm_actores")[0]);
    $.ajax({
      url: "../controllers/actores.controller.php?op=insertar",
      type: "POST",
      data: formData,
      contentType: false,
      processData: false,
      success: function (datos) {
        console.log(datos);
        $("#frm_actores")[0].reset();
        $("#modal").modal("hide");
        cargaTabla();
      },
    });
  };

  var actualizar = (e) => {
    e.preventDefault();
    var formData = new FormData($("#frm_actoresac")[0]);
    $.ajax({
      url: "../controllers/actores.controller.php?op=actualizar",
      type: "POST",
      data: formData,
      contentType: false,
      processData: false,
      success: function (datos) {
        console.log(datos);
        $("#frm_actoresac")[0].reset();
        $("#modalAc").modal("hide");
        alert("Actualizado");
        cargaTabla();
      },
    });
  };
  
  init();
  