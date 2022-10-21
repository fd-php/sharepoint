
<?php 
	
    include("conex2.php");
?>
			

<?php 
    
    

    $accion=(isset($_POST['accion']))?$_POST['accion']:"";
    $usuario=(isset($_POST['usuario']))?$_POST['usuario']:"";
    $nombre=(isset($_POST['nombre']))?$_POST['nombre']:"";
    $pwd=(isset($_POST['pwd']))?$_POST['pwd']:"";
    $repass=(isset($_POST['repass']))?$_POST['repass']:"";
    $tipo= 2;
    $existe = false;
    
    if($accion=="crearCuenta") {
        
        if($pwd == $repass){

            if($usuario != "" && $nombre != "" && $pwd != ""){
             $pass=  sha1($pwd);
                   $query =  "INSERT INTO usuarios (usuario, nombre, password, tipo_usuario) VALUES ('$usuario', '$nombre', '$pass', '$tipo')";
                 $result = mysqli_query($conn, $query);
               
                 $_SESSION["usuario"] = $usuario;
                 header('Location:principal.php');
                } 
             else {

                ?>
                    <p style="color: white;"><?php echo "Los campos están incompletos.";?></p> 
                <?php
            }
        } else {

            ?>
                <p style="color: white;"><?php echo "Las contraseñas son distintas";?></p> 
            <?php
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Share Point  - Registro</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                <form method="POST">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Crear una Cuenta</h3></div>
                                    <div class="card-body">
                                        <form>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="small mb-1" for="inputFirstName">Nombre de Usuario</label><input class="form-control py-4" id="inputFirstName" type="text" name="usuario" id="usuario" value="<?php echo  $usuario; ?>" placeholder="Ingrese Nombre de Usuario" /></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="small mb-1" for="inputLastName">Nombre Completo</label><input class="form-control py-4" id="inputLastName" type="text" name="nombre" id="nombre" value="<?php echo  $nombre; ?>" placeholder="Ingrese Nombre Completo" /></div>
                                                </div>
                                            </div>
                                            <!-- <div class="form-group"><label class="small mb-1" for="inputEmailAddress">Email</label><input class="form-control py-4" id="inputEmailAddress" type="email" aria-describedby="emailHelp" placeholder="Enter email address" /></div> -->
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="small mb-1" for="inputPassword">Password</label><input class="form-control py-4" id="inputPassword" type="password" name="pwd" placeholder="Enter password" /></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="small mb-1" for="inputConfirmPassword">Confirmar Password</label><input class="form-control py-4" id="inputConfirmPassword" type="password" name="repass" placeholder="Confirmar password" /></div>
                                                </div>
                                            </div>
                                            <div class="form-group mt-4 mb-0">  <button type="submit" class="btn btn-primary" name="accion" value="crearCuenta">Crear cuenta</button></div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small"><a href="index.php">Tienes una cuenta? Vamos al Inicio</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Seminarios Colaborativos 2022</div>
                            <div>
                                <a href="#">Share Point S21</a>
                                &middot;
                                
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>