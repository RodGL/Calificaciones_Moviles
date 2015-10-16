<!DOCTYPE html>
<html lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Cursos Online</title>
        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="<?php echo"$base/$css/bootstrap.min.css"; ?>">
        <!-- Bootstrap theme -->
        <link rel="stylesheet" href="<?php echo"$base/$css/bootstrap-theme.min.css"; ?>">
        <!-- Custom styles for this template -->
        <link rel="stylesheet" href="<?php echo"$base/$css/theme.css"; ?>">
        <link rel="stylesheet" href="<?php echo"$base/$css/fabs.css"; ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo"$base/$css/bootstrap-3.3.2/css/bootstrapValidator.min.css"; ?>">
        <script type="text/javascript" src="<?php echo"$base/bootstrap-3.3.2/js/jquery.min.js"; ?>"></script>
        <script  type="text/javascript"src="<?php echo"$base/bootstrap-3.3.2/js/bootstrap.min.js"; ?>"></script>
        <script  type="text/javascript" src="<?php echo"$base/bootstrap-3.3.2/js/bootstrapValidator.min.js"; ?>"></script>
        <script  type="text/javascript" src="<?php echo"$base/bootstrap-3.3.2/js/validator.js"; ?>">
            $(document).ready(function () {
                boostrapValidator();
            });

        </script>


    </head>
    <body>
        <div class="container">
            <div class="header clearfix" style="background-color: #1EA3DB;">
                <nav>

                    <ul class="nav nav-pills pull-right">
                        <li role="presentation" class="active"><?= anchor(base_url() . 'admin', 'Inicio') ?></li>
                        <li role="presentation"><?= anchor(base_url() . 'usuario', 'Usuarios') ?></li>
                        <li role="presentation"><?= anchor(base_url() . 'grupo', 'Grupos') ?></li>
                        <li role="presentation"><?= anchor(base_url() . 'curso', 'Cursos') ?></li>
                        <li role="presentation"><?= anchor(base_url() . 'plan', 'Planes de Aprendizaje') ?></li>
                        <li role="presentation"><?= anchor(base_url() . 'login/logout_ci', 'Cerrar sesión') ?></li>
                    </ul>
                </nav>
                <h1 class="text-muted"  style="color:#FFF;">Cursos Online</h1>
            </div>
            <div >  
                <form action='<?php echo $base ?>/depto/insert' method="post" >
                    <table class="table table-bordered">
                        <tr>
                            <td><label for="nombre">Nombre: </label></td>
                            <td><input type="text" id="nombre" name="nombre"
                                       required aria-required="true" maxlength="25"></td>
                        </tr>
                        <tr>
                            <td><label for="descripcion">Descripcion: </label></td>
                            <td><textarea name="descripcion" id="descripcion" maxlength="500" ></textarea></td>
                        </tr>

                    </table>
                    <input type="submit" name="guardar" value="Agregar " class="btn btn-sm btn-primary">
                    <a href='<?php echo $base ?>/depto/index'><button type="button" class="btn btn-sm btn-danger">Cancelar</button></a>
                </form>
            </div>
            <footer class="footer" style="background-color: #3EAEDE; text-align: center">
                <p>© Cursos Online 2015</p>
            </footer>

        </div> <!-- /container -->
    </body>
</html>


