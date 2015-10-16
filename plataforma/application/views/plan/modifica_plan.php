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
                        <li role="presentation"><?= anchor(base_url() . 'depto', 'Departamentos') ?></li>
                        <li role="presentation"><?= anchor(base_url() . 'login/logout_ci', 'Cerrar sesión') ?></li>
                    </ul>
                </nav>
                <h1 class="text-muted"  style="color:#FFF;">Cursos Online</h1>
            </div>
            <div >
                <?php
foreach ($datos as $obj) {
    echo '<form action="' . $base . '/plan/modifica" method="post">
                <table class="table table-bordered">
                
                <tr>
                <td>Nombre</td>
                <td>
                <input type="text" id="idplan" name="idplan" value="' . $obj->getIdplan() . '" hidden="true"  />                
                <input type="text" maxlength="25"  id="nombre" name="nombre" value="' . $obj->getNombre() . '"/></td>
                </tr>
                <tr>
                <td>Descripcion</td>
                   <td> <textarea  name="descripcion" id="descripcion">' . $obj->getDescripcion() . ' </textarea>
                       </td>
                </tr>
                <tr>
                </table>
               <input type="submit" name="guardar" value="Guardar" class="btn btn-sm btn-primary"/>
                <a href="' . $base . '/plan/index"><button type="button" class="btn btn-sm btn-danger">Cancelar</button></a></form>';
}
?>
</div>
            <footer class="footer" style="background-color: #3EAEDE; text-align: center">
                <p>© Cursos Online 2015</p>
            </footer>

        </div> <!-- /container -->
    </body>
</html>