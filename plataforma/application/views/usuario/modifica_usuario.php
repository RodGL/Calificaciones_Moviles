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
                        <li role="presentation"><?= anchor(base_url() . 'usuario', 'Alumno') ?></li>
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
    echo '<form action="' . $base . '/usuario/modifica" method="post">

                <table class="table table-bordered">
                <tr>
                    <td> Usuario:</td>
                    <td><input type="text" maxlength="25"  id="user" name="user" value="' . $obj->getUser() . '"/>
                        <input type="hidden" maxlength="25"  id="iduser" name="iduser" value="' . $obj->getIduser() . '"/>
</td>
                </tr>
                <tr>
                    <td> Contraseña;</td>
                    <td><input type="password" maxlength="25"  id="password" name="password" value="' . $obj->getPassword() . '"/></td>
                </tr>
                <tr>
                    <td> Perfil</td>
                    <td><input type="text" maxlength="25"  id="perfil" name="perfil" value="' . $obj->getPerfil() . '"/></td>
                </tr>
                <tr>
                    <td> Nombre:</td>
                    <td><input type="text" maxlength="25"  id="nombre" name="nombre" value="' . $obj->getNombre() . '"/></td>
                </tr>
                <tr>
                    <td> Apellido paterno:</td>
                    <td><input type="text" maxlength="25"  id="appaterno" name="appaterno" value="' . $obj->getAppaterno() . '"/></td>
                </tr>
                <tr>
                    <td> Apellido materno:</td>
                    <td><input type="text" maxlength="25"  id="apmaterno" name="apmaterno" value="' . $obj->getApmaterno() . '"/></td>
                </tr>
                <tr>
                    <td> Fecha de nacimiento:</td>
                    <td><input type="text" maxlength="10"  id="fechanac" name="fechanac" value="' . $obj->getFechanac() . '"/></td>
                </tr>
                <tr>
                <td>Sexo</td>
                <td>';
                 if ('Mujer' == $obj->getSexo()) {
                            echo " <input type='radio' name='sexo' value='Mujer' checked>Mujer";
                            echo "<input type='radio' name='sexo' value='Hombre'>Hombre";
                        } else {
                            echo " <input type='radio' name='sexo' value='Mujer' >Mujer";
                            echo "<input type='radio' name='sexo' value='Hombre' checked>Hombre";
                        } echo '</td>
    
                <tr>
                    <td> Curp:</td>
                    <td><input type="text" maxlength="25"  id="curp" name="curp" value="' . $obj->getCurp() . '"/></td>
                </tr>
                
                        <tr>
                    <td> IMSS:</td>
                    <td><input type="text" maxlength="25"  id="imss" name="imss" value="' . $obj->getImss() . '"/></td>
                </tr>';


                /*
    if ('masculino' == $obj->getSexo()) {
        echo " <input type='radio' name='sexo' value='Femenino' checked>Femenino";
        echo "<input type='radio' name='sexo' value='Masculino'>Masculino";
    } else {
        echo " <input type='radio' name='sexo' value='Femenino' >Femenino";
        echo "<input type='radio' name='sexo' value='Masculino' checked>Masculino";
    } echo '</td>*/
                echo '  
                    <tr>
                <td>Estado Civil</td>
                <td> <select name="edocivil">;';
    foreach ($edoscivil as $fila) {
        
            if ($fila->idedocivil == $obj->getEdocivil()){
            echo '<option value=' . $fila->idedocivil . ' selected>' . $fila->nombre . '</option>';
            }else{ 
            echo '<option value=' . $fila->idedocivil . '>' . $fila->nombre . '</option>';
            }
         
    }
    echo ' </select> </td>
                </tr>                

                <tr>
                <td> Descripcion:</td>
                <td><input type="text" maxlength="25"  id="descripcion" name="descripcion" value="' . $obj->getDescripcion() . '"/></td></tr>
                ';
    /*
                <td> Departamento:</td>
                <td> <select name="depto">;';
    foreach ($deptos as $fila) {
        if($fila->status ==1 ){
            if ($fila->iddepto == $obj->getDepto()){
                echo '<option value=' . $fila->iddepto . ' selected>' . $fila->nombre . '</option>';
            }else{
                echo '<option value=' . $fila->iddepto . '>' . $fila->nombre . '</option>';
            }   
        }else{
            if ($fila->iddepto == $obj->getDepto()){
                echo '<option  disabled="true" value=' . $fila->iddepto . ' selected>' . $fila->nombre . '</option>';
            }else{
                echo '<option disabled="true" value=' . $fila->iddepto . '>' . $fila->nombre . '</option>';
            } 
        }
    }
    ' </select> </td>
                </tr>
                 
                
                 <tr>
                <td> Telefono:</td>
                <td><input type="text" maxlength="25"  id="curp" name="curp" value="' . $obj->getTelefono() . '"/></td>
                </tr>*/
    echo '  
                </table>


               <input type="submit" name="guardar" value="Guardar" class="btn btn-sm btn-primary"/>
                <a href="' . $base . '/usuario/index"><button type="button" class="btn btn-sm btn-danger">Cancelar</button></a></form>';
}
?>
</div>
            <footer class="footer" style="background-color: #3EAEDE; text-align: center">
                <p>© Calificaciones moviles 2015</p>
            </footer>

        </div> <!-- /container -->
    </body>
</html>