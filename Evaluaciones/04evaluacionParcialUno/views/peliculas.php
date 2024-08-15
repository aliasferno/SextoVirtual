<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Película</title>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>

    <div class="continer">
        <div class="row">
            <div class="col-md-2">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal">
                    Nueva Película
                </button>
            </div>
        </div>
    </div>
    <table class="table table-bordered table-responsive table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Título</th>
                <th>Género</th>
                <th>Año</th>
                <th>Director</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody id="cuerpopeliculas"></tbody>
    </table>
    <!-- Button trigger modal -->

    <!-- modal -->
    <div class="modal fade" id="modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Ingresar Película</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="frm_peliculas">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Título</label>
                            <input type="text" class="form-control" name="titulo" id="titulo">
                        </div>

                        <div class="form-group">
                            <label for="">Género</label>
                            <input type="text" class="form-control" name="genero" id="genero">
                        </div>

                        <div class="form-group">
                            <label for="">Año</label>
                            <input type="text" class="form-control" name="anio" id="anio">
                        </div>

                        <div class="form-group">
                            <label for="">Director</label>
                            <input type="text" class="form-control" name="director" id="director">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- modal -->

    <!-- modal -->
    <div class="modal fade" id="modalAc" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Actualizar Película</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="frm_peliculasac">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Id Pelicula</label>
                            <input type="text" class="form-control" name="pelicula_id" id="pelicula_idac" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Título</label>
                            <input type="text" class="form-control" name="titulo" id="tituloac">
                        </div>

                        <div class="form-group">
                            <label for="">Género</label>
                            <input type="text" class="form-control" name="genero" id="generoac">
                        </div>

                        <div class="form-group">
                            <label for="">Año</label>
                            <input type="text" class="form-control" name="anio" id="anioac">
                        </div>

                        <div class="form-group">
                            <label for="">Director</label>
                            <input type="text" class="form-control" name="director" id="directorac">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- modal -->

</body>





<script src="./peliculas.js"></script>




</html>