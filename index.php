<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
        <link rel="stylesheet" href="css/styles.css">
    </head>
        <body>
            <div id = "login">
                <h3 class= "text-center text-white display-4">Login</h3>
                <div class="container">
                    <div id= "login-row" class="row justify-content-center align-items-center">
                        <div id="login-colum" class="col-md-6">
                        <div id="login-box" class="col-md-12 bg-light text-dark">
                            <form id="formlogin" class="form" action="includes/_functions.php" method="POST">
                                <h3 class="text-center text-dark">Inicia Sesión</h3>
                                <div class="form-group">
                                    <label for="correo" class="text-dark">Correo</label>
                                    <input type="email" name="correo" id="correo" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="password" class="text-dark">Password</label>
                                    <input type="password" name="password" id="password" class="form-control">
                                    <input type="hidden" name="accion" value="login_usuarios">
                                </div>
                                <div class="form-group text-center">
                                    <input type="submit" name="submit" class="btn btn-dark btn-lg btn-block" value="Ingresar">
                                </div>
                            </form>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <script src="js/bootstrap/bootstrap.min.js"></script>
            <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
        </body>
</html>