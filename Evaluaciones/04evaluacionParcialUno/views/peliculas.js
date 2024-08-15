var init = () => {
    $("#frm_peliculas").on("submit", (e) => {
      guardaryeditar(e);
    });
    $("#frm_peliculasac").on("submit", (e) => {
      actualizar(e);
    });
  };
  
  $().ready(() => {
    cargaTabla();
  });
  
  var cargaTabla = () => {
    $.get("../controllers/peliculas.controller.php?op=todos", (listaPeliculas) => {
      var html = "";
      var table = $("#tbl_peliculas");
      console.log(listaPeliculas);
      listaPeliculas = JSON.parse(listaPeliculas);
      console.log(listaPeliculas);
      $.each(listaPeliculas, (index, pelicula) => {
        html += `<tr>
                  <td>${pelicula.pelicula_id}</td>
                  <td>${pelicula.titulo}</td>
                  <td>${pelicula.genero}</td>
                  <td>${pelicula.anio}</td>
                  <td>${pelicula.director}</td>
                  <td>
                    <button class="btn btn-primary btn-edit">Editar</button> 
                    <button class="btn btn-danger btn-delete">Eliminar</button>
                  </td>
                  </tr>
                  `;
      });
      $("#cuerpopeliculas").html(html);
    });
    obtener_data_editar ('#cuerpopeliculas');
    eliminar ('#cuerpopeliculas');
  };

    var obtener_data_editar = function(tbody){
        $(tbody).on('click', 'button.btn-edit', function(){
          $("#modalAc").modal("show");
          var row = $(this).closest('tr');
          var data = {
              id: row.find('td:eq(0)').text(),
              titulo: row.find('td:eq(1)').text(),
              genero: row.find('td:eq(2)').text(),
              anio: row.find('td:eq(3)').text(),
              director: row.find('td:eq(4)').text()
          };
          
          var pelicula_id = $("#pelicula_idac").val(data.id);
          var titulo = $("#tituloac").val(data.titulo);
          var genero = $("#generoac").val(data.genero);
          var anio = $("#anioac").val(data.anio);
          var director = $("#directorac").val(data.director);

          
          
          console.log(data);
        });
    }

    var eliminar = function(tbody){
      $(tbody).on('click', 'button.btn-delete', function(){
        var row = $(this).closest('tr');
        var data = {
          pelicula_id: row.find('td:eq(0)').text()
        };
      var formData = new FormData();
      formData.append('pelicula_id', data.pelicula_id);

        $.ajax({
          url: "../controllers/peliculas.controller.php?op=eliminar",
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
    var formData = new FormData($("#frm_peliculas")[0]);
    $.ajax({
      url: "../controllers/peliculas.controller.php?op=insertar",
      type: "POST",
      data: formData,
      contentType: false,
      processData: false,
      success: function (datos) {
        console.log(datos);
        $("#frm_peliculas")[0].reset();
        $("#modal").modal("hide");
        cargaTabla();
      },
    });
  };

  var actualizar = (e) => {
    e.preventDefault();
    var formData = new FormData($("#frm_peliculasac")[0]);
    $.ajax({
      url: "../controllers/peliculas.controller.php?op=actualizar",
      type: "POST",
      data: formData,
      contentType: false,
      processData: false,
      success: function (datos) {
        console.log(datos);
        $("#frm_peliculasac")[0].reset();
        $("#modalAc").modal("hide");
        alert("Actualizado");
        cargaTabla();
      },
    });
  };
  
  init();
  