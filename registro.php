<!doctype html>
<html lang="en">
    <head>
        <title>Registro</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="css/login.css">
        <link rel="stylesheet" href="librerias/jquery-ui-1.12.1/jquery-ui.theme.css">
        <link rel="stylesheet" href="librerias/jquery-ui-1.12.1/jquery-ui.css">
        
        
    </head>
    <body>
        
        <div class="container">
            <br>
            <h1 style="text-align: center;">Registro de usuario</h1>
            <hr>
            <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-4">
                    
                    <form id="frmRegistro" method="POST" onsubmit="return agregarUsuarioNuevo()" autocomplete="off">
                        <label for="">Nombre de persona</label>
                        <input type="text"  class="form-control"  name="nombre"  id="nombre" required>
                        <label for="">Fecha de nacimiento</label>
                        <input type="text"  class="form-control" name="fechaNacimiento"  id="fechaNacimiento" required readonly>
                        <label for="">Email o correo</label>
                        <input type="email"  class="form-control"name="email"  id="email"  required >
                        <label for="">Nombre de usuario</label>
                        <input type="text"  class="form-control"name="usuario"  id="usuario"  required>
                        <label for="">Password o contraseña</label>
                        <input type="password"  class="form-control" name="password" id="password"  required>
                        <br>
                        <div class="row">
                            <div class="col-sm-6 text-left">
                                <button class=" btn btn-primary">Registrar</button>
                            </div>
                            <div class="col-sm-6 text-right">
                                <a href="index.php" class="btn btn-warning">Login</a>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-sm-4"></div>
            </div>
        </div>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        
        
        <script src="librerias/jquery-3.6.0.min.js"></script>
        <script src="librerias/jquery-ui-1.12.1/jquery-ui.js"></script>
        <script src="librerias/sweetalert.min.js"></script>

        <script type="text/javascript">

        $(function(){
            var fechaA = new Date();
            var yyyy = fechaA.getFullYear();

            $("#fechaNacimiento").datepicker({

                changeMonth: true,
                changeYear: true,
                yearRange: '1900:'+ yyyy,
                dateFormat: "dd-mm-yy"
            });
        });
            function agregarUsuarioNuevo(){
                $.ajax({
                    method: "POST",
                    data: $('#frmRegistro').serialize(),
                    url: "procesos/usuario/registro/agregarUsuario.php",
                    success: function(respuesta){

                        respuesta = respuesta.trim();

                        if(respuesta == 1){
                            $('#frmRegistro')[0].reset();
                            swal(":D","Agregado con exito","success");
                        }
                        else if(respuesta == 2){
                            swal("Este usuario ya existe");
                        }
                        else{
                            swal(":C","Fallo al agregar","error");
                        }
                    }
                });

                return false;
            }
        </script>
    </body> 
</html>