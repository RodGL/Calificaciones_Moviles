

<?php

foreach ($datos as $obj) {
    echo '<form action="' . $base . '/alumno/modifica" method="post">
                <table>
                
                <tr>
                <tr>
                <td>No. Control</td>
                <td>
                <input type="text" id="idalumno" name="idalumno" value="' . $obj->getIdAlumno() . '" hidden="true"  />                
                <input type="text" id="nocontrol" maxlength="10"  name="nocontrol" value="' . $obj->getNocontrol() . '" /></td>
                </tr>
                <tr>
                <td> Nombre</td>
                <td><input type="text" maxlength="25"  id="nombre" name="nombre" value="' . $obj->getNombre() . '"/></td>
                </tr>
                <tr>
                <td>Apellido Paterno</td>
                <td><input type="text" id="appaterno" maxlength="25" name="appaterno" value="' . $obj->getApPaterno() . '"/></td>
                </tr>
                <tr>
                <td> Apellido Materno</td>
                <td><input type="text" id="apmaterno" maxlength="25" name="apmaterno" value="' . $obj->getApMaterno() . '"/></td>
                </tr>
                <tr>
                <tr>
                <td>Sexo</td>
                <td>';
    if ('masculino' == $obj->getSexo()) {
        echo " <input type='radio' name='sexo' value='Femenino' checked>Femenino";
        echo "<input type='radio' name='sexo' value='Masculino'>Masculino";
    } else {
        echo " <input type='radio' name='sexo' value='Femenino' >Femenino";
        echo "<input type='radio' name='sexo' value='Masculino' checked>Masculino";
    } echo '</td>
                </tr>
                <tr>
                <td>Estado Civil</td>
                <td> <select name="idedocivil">;';
    foreach ($edoscivil as $fila) {
        if ($fila->idedocivil == $obj->getIdedocivil())
            echo '<option value=' . $fila->idedocivil . ' selected>' . $fila->nombre . '</option>';
        else
            echo '<option value=' . $fila->idedocivil . '>' . $fila->nombre . '</option>';
    }
    echo ' </select> </td>
                </tr>
                <td>Curp </td>
                <td><input type="text" id="curp" maxlength="18" name="curp" value="' . $obj->getCurp() . '"/></td>
                </tr>
                

                </table>
               <input type="submit" name="guardar" value="Guardar"/>
                <button><a href="' . $base . '/alumno/index">Cancelar</a></button></form>';
}
?>
