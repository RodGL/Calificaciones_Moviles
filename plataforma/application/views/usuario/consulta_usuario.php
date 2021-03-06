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
                    echo '<form >
        
                <table class="table">
                <tr>
                <td> Id del usuario:</td>
                <td>' . $obj->getIduser() . '</td>
                </tr>
                <tr>
                
                    <td> Username:</td>
                <td>' . $obj->getUser() . '</td></tr>
                  <tr>  <td> Perfil:</td>
                <td>' . $obj->getPerfil() . '</td>
                </tr>
                
                <tr>
                
                    <td> Nombre:</td>
                <td>' . $obj->getNombre() . '</td>
                </tr>
                <tr>
                <td> Apellido paterno:</td>
                <td>' . $obj->getAppaterno() . '</td></tr>
                   </tr>  <td> Apellido materno:</td>
                <td>' . $obj->getApmaterno() . '</td>
                </tr>
                 <td> Fecha de nacimiento:</td>
                <td>' . $obj->getFechanac() . '</td>
                </tr>
<tr>   <td> Sexo:</td>
                <td>' . $obj->getSexo() . '</td>
                </tr>                

               <tr>
                <td> Curp:</td>
                <td>' . $obj->getCurp() . '</td> </tr>
               
                <tr>
                <td> IMSS:</td>
                <td>' . $obj->getImss() . '</td>
                   </tr>
                 <tr>
                <td> Estado civil:</td>
                     <TD> <p name="edocivil">';
                    foreach ($edoscivil as $fila) {
                        if ($fila->idedocivil == $obj->getEdocivil()) {
                            echo $fila->nombre;
                        }
                    }
                    echo '</p></TD><TD>



                   </tr>
                <tr>
                <td> Descripcion:</td>
                <td>' . $obj->getDescripcion() . '</td>
                   </tr>
                                     
                 
                
                </table></form>';
                    echo "<a href='$base/usuario/index'><button type='button' class='btn btn-sm btn-danger'>Regresar</button></a>";
                    echo"&nbsp;&nbsp;&nbsp;";
                    echo "<a href='$base/usuario/extrae/" . $obj->getIdUser() . "'><button type='button' class='btn btn-sm btn-info'>Modificar</button></a>";
                }
                ?>

            </div>
            <footer class="footer" style="background-color: #3EAEDE; text-align: center">
                <p>© Cursos Online 2015</p>
            </footer>

        </div> <!-- /container -->
    </body>
</html>