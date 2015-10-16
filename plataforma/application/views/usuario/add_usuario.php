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
                        <li role="presentation"><?= anchor(base_url() . 'usuario', 'Alumnos') ?></li>
                        <li role="presentation"><?= anchor(base_url() . 'grupo', 'Grupos') ?></li>
                        <li role="presentation"><?= anchor(base_url() . 'curso', 'Cursos') ?></li>
                        <li role="presentation"><?= anchor(base_url() . 'plan', 'Planes de Aprendizaje') ?></li>
                        <li role="presentation"><?= anchor(base_url() . 'depto', 'Departamentos') ?></li>
                        <li role="presentation"><?= anchor(base_url() . 'login/logout_ci', 'Cerrar sesión') ?></li>
                    </ul>
                </nav>
                <h1 class="text-muted"  style="color:#FFF;">Calificaciones moviles </h1>
            </div>
            <div >
                <form action='<?php echo $base ?>/usuario/insert' method="post" id="adduser">
                    <table class="table table-bordered">
                        <tr class="form-group">
                            <td><label for="user">Nombre de usuario: </label></td>
                            <td><input class="form-control" type="text" id="user" name="user" title="Solo letras"
                                       required aria-required="true" maxlength="50"></td>
                            <td><label for="username">Contraseña: </label></td>
                            <td><input class="form-control" type="password" id="password" name="password" placeholder="Solo letras"
                                       required aria-required="true" maxlength="16"></td>
                        </tr>
                        <tr>
                            <td><label for="perfil">Perfil: </label></td>
                            <td><input class="form-control" type="text" id="perfil" name="perfil" title="perfil"
                                       placeholder="Solo letras"  required pattern="[a-z,A-Z]+"  aria-required="true" maxlength="20"></td>
                            
                        </tr>

                        <tr>
                            <td><label for="nombre">Nombre: </label></td>
                            <td><input class="form-control" type="text" id="nombre" name="nombre"
                                       required aria-required="true" pattern="[a-z,A-Z]+"  maxlength="25" placeholder="Solo letras"></td>
                            <td><label for="appaterno">Apellido paterno: </label></td>
                            <td><input class="form-control" type="text" id="appaterno" name="appaterno"
                                       required aria-required="true" pattern="[a-z,A-Z]+" placeholder="Solo letras"  maxlength="25"></td>
                        </tr>
                        <tr>
                            <td><label for="apmaterno">Apellido materno: </label></td>
                            <td><input class="form-control" type="text" id="apmaterno" name="apmaterno" placeholder="Solo letras"
                                       required aria-required="true" pattern="[a-z,A-Z]+"  maxlength="25"></td>
                            <td><label for="email">Fecha de Nacimiento: </label></td>
                            <td><input class="form-control" type="fechanac" id="email" name="fechanac"
                                       required aria-required="true" maxlength="10" ></td>
                        </tr>

                        <!--
                                                <tr>
                                                    <td><label for="depto">Departamento: </label></td>
                                                    <td>
                                                        <select  title="Seleccione un departamento"    name="depto" id="depto" value="<?php echo!empty($iddepto) ? $iddepto : ''; ?>" required >
                                                            <option value="" class="form-control">Selecciona...</option>
                                                            <php
                                                            foreach ($deptos as $fila) {
                                                                if ($fila->status == 1) {
                                                                    ?>
                                                                    <option value="<= $fila->iddepto ?>"><= $fila->nombre ?></option>
                                                                    <php
                                                                } else {
                                                                    ?>
                                                                    <option disabled="true" value="<= $fila->iddepto ?>"><= $fila->nombre ?></option>
                                                                    <php
                                                                }
                                                            }
                                                            ?>      
                                                        </select>
                                                    </td>
                        
                        -->
                        <tr>

                            <td><label for="sexo">Sexo: </label></td>
                            <td  >
                                Femenino<input type="radio" id="Femenino"  name="sexo" value="F" required aria-required="true">
                                Masculino<input type="radio" id="Masculino" name="sexo" value="M" required aria-required="true">
                            </td>
                            <td><label for="curp">Curp: </label></td>
                            <td><input class="form-control" type="text" id="curp" name="curp" placeholder="Formato: AAAA0000AAA00"
                                       required aria-required="true" pattern="[A-Z,a-z]{4}[0-9]{6}[H,M][A-Z,a-z]{5}[0-9]{2}" maxlength="18"></td>
                        </tr>


                        
                            
                            <tr>
                            <td><label for="telefono">IMSS: </label></td>
                            <td><input type="tel" id="imss" name="imss"  pattern="[0-9]{10}" placeholder="Formato: 0000000000"
                                       maxlength="10"></td>
                        </tr>
                        <TR>
                            <td><label for="edocivil">Estado Civil: </label></td>
                            <td>
                                <select  title="Seleccione un estado civil"   name="edocivil" id="edocivil" value="<?php echo!empty($idedocivil) ? $idedocivil : ''; ?>" required >
                                    <option value="">Selecciona...</option>
                                    <?php
                                    foreach ($edoscivil as $fila) {
                                        ?>                          
                                        <option value="<?= $fila->idedocivil ?>"><?= $fila->nombre ?></option>
                                        <?php
                                    }
                                    ?>      
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td><label for="telefono">Descripcion: </label></td>
                            <td><input type="descripcion" id="descripcion" name="descripcion"  ></td>
                        </tr>

                    </table>
                    <input type="submit" name="guardar" value="Agregar " class="btn btn-sm btn-primary">
                    <a href='<?php echo $base ?>/usuario/index'> <button type="button" class="btn btn-sm btn-danger">Cancelar</button></a>
                </form>


            </div>
            <footer class="footer" style="background-color: #3EAEDE; text-align: center">
                <p>© Cursos Online 2015</p>
            </footer>

        </div> <!-- /container -->
    </body>
</html>
