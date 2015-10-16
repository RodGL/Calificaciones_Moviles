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
                        <!--<li role="presentation" class="active"><?= anchor(base_url() . 'admin', 'Inicio') ?></li>-->
                        <li role="presentation"><?= anchor(base_url() . 'alumno', 'Alumno') ?></li>
                        <li role="presentation"><?= anchor(base_url() . 'usuario', 'Usuario') ?></li>
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
                echo '<TABLE class="table table-striped">';
                echo '<TR><TD colspan=9>';
                echo '<a  href="' . $base . '/alumno/nuevo"><button type="button" class="btn btn-sm btn-info">Agregar</button></a>';
                echo '</TD></TR>';
                echo '<TR><TD>fabs</TD><TD>Nombre</TD><TD>Apellido paterno</TD>'
                . '<TD>Apellido materno</TD><TD>Curp</TD><TD>Departamento</TD><TD colspan=3>Acciones</TD></TR>';
                foreach ($datos as $obj) {
                    echo '</TR><TD>';
                    echo $obj->getNocontrol();
                    echo '</TD><TD>';
                    echo $obj->getNombre();
                    echo '</TD><TD>';
                    echo $obj->getAppaterno();
                    echo '</TD><TD>';
                    echo $obj->getApmaterno();
                    echo '</TD><TD>';
                    echo $obj->getCurp();
                    echo '</TD><TD> <p name="depto">';
                    foreach ($deptos as $fila) {
                        if ($fila->iddepto == $obj->getDepto()) {
                            echo $fila->nombre;
                        }
                    }
                    echo '</p></TD><TD>';
                    echo "<a href='$base/usuario/consulta/" . $obj->getIdusuario() .
                    "'> <img src='$base/assets/images/consulta.png' alt='Consultar'/> </a>";
                    echo '</TD><TD>';
                    echo "<a href='$base/usuario/extrae/" . $obj->getIdusuario() .
                    "'><img src='$base/assets/images/actualiza.png' alt='Modificar'/></a>";
                    echo '</TD><TD>';
                    echo '';
                    if ($obj->getStatus() == 1) {
                        echo "<a href='$base/usuario/desactiva/" . $obj->getIdusuario() .
                        "'><img src='$base/assets/images/desactiva.jpg' alt='Desactivar'/></a>";
                    } else {
                        echo "<a href='$base/usuario/activa/" . $obj->getIdusuario() .
                        "'><img src='$base/assets/images/activa.png' title='Activar' alt='Activar'/></a>";
                    }
                    echo '</TD></TR>';
                }
                echo '</TABLE>';
                ?>
            </div>
            <footer class="footer" style="background-color: #3EAEDE; text-align: center">
                <p>© Cursos Online 2015</p>
            </footer>

        </div> <!-- /container -->
    </body>
</html>