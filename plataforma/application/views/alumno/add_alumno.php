<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>

    </head>
    <body>

        <form action='<?php echo $base ?>/alumno/insert' method="post" >
            <table>
                <tr>
                    <td i><label for="nocontrol">No. Control: </label></td>
                    <td><input type="text" id="nocontrol" name="nocontrol"
                               required aria-required="true" maxlength="10"  ></td>
                </tr>
                <tr>
                    <td><label for="nombre">Nombre: </label></td>
                    <td><input type="text" id="nombre" name="nombre"
                               required aria-required="true" maxlength="25"></td>
                </tr>
                <tr>
                    <td><label for="appaterno">Apellido Paterno: </label></td>
                    <td><input type="text" id="appaterno" name="appaterno" required aria-required="true" maxlength="25"></td>
                </tr>
                <tr>
                    <td><label for="apmaterno">Apellido Materno: </label></td>
                    <td><input type="text" id="apmaterno" name="apmaterno" required aria-required="true" maxlength="25"></td>
                </tr>
                <tr>
                    <td><label for="sexo">Sexo: </label></td>
                    <td><input type="radio" id="Femenino"  name="sexo" value="masculino" required aria-required="true">Femenino
                        <input type="radio" id="Masculino" name="sexo" value="femenino" required aria-required="true">Masculino
                    </td>
                </tr>
                <tr>
                    <td><label for="edocivil">Estado Civil: </label></td>
                    <td>
                        <select  title="EdoCivil"   name="idedocivil" id="idedocivil" value="<?php echo!empty($idedocivil) ? $idedocivil : ''; ?>" required >
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
                    <td><label for="curp">Curp: </label></td>
                    <td><input type="text" id="curp" name="curp" required aria-required="true" maxlength="18"></td>
                </tr> 
            </table>
            <input type="submit" name="guardar" value="Agregar alumno" >
            <button><a href='<?php echo $base ?>/alumno/index'>Cancelar</a></button>




        </form>

    </body>
</html>
