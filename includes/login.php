

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <link rel="stylesheet" type="text/css" href="./librerias/fontawesome/css/all.css">
    <link rel="stylesheet" href="../css/fontawesome-all.min.css">
	

</head>

<style>
    body {
      background-image: url('../img/FondoMulti.svg');
      margin-top: 5rem;
    }
  </style>
<body>
<form  action="_functions.php" method="POST">
<div id="login" >
        <div class="container p-3 my-3 bg-dark text-white">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-8">
                    <div id="login-box" class="col-md-12">
                        <br>
           
                   <br>
                                    <h3 class="text-center">Iniciar Sesión</h3>
                       <br>
                            <div class="form-group">
                                <label for="correo">Usuario:</label><br>
                                <input type="text" name="nombre" id="nombre" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Contraseña:</label><br>
                                <input type="password" name="password" id="password" class="form-control" required>
                                <input type="hidden" name="accion" value="acceso_user">
                            </div>
                            <div class="form-group">
                             <br>
                                <center>
                                <input type="submit"class="btn btn-success" value="Ingresar">   
                                </center>
                            <div class="my-2">
                            <a href="../recuperacion/recovery.php">¿Olvidaste tu contraseña?</a>
                            </div>
                            <?php 
                            if(isset($_GET['message'])){
                            
                            ?>
                            <div class="alert alert-primary" role="alert">
                                <?php 
                                switch ($_GET['message']) {
                                case 'ok':
                                    echo 'Por favor, revisa tu correo';
                                    break;
                                case 'success_password':
                                    echo 'Inicia sesión con tu nueva contraseña';
                                    break;
                                    
                                default:
                                    echo 'Algo salió mal, intenta de nuevo';
                                    break;
                                }
                                ?>
                            </div>
                            <?php
    }
    ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
</body>
</html>