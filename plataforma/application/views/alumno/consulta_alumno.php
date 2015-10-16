<?php

foreach ($datos as $obj) {
    echo '<form >
                <table>
                <tr>
                <td> Id Alumno</td>
                <td><input type="text" id="idalumno" name="idalumno" value="' . $obj->getIdAlumno() . '" readonly="readonly" disabled="true"/></td>
                </tr>
                <tr>
                <td> No. de Control</td>
                <td><input type="text" id="nocontrol" name="nocontrol" value="' . $obj->getNocontrol() . '" readonly="readonly" disabled="true"/></td>
                </tr>
                <tr>
                <td> Nombre</td>
                <td><input type="text" id="nombre" name="nombre" value="' . $obj->getNombre() . '" readonly="readonly" disabled="true"/></td>
                </tr>
                <tr>
                <td>Apellido Paterno</td>
                <td><input type="text" id="appaterno" name="appaterno" value="' . $obj->getApPaterno() . '" readonly="readonly" disabled="true"/></td>
                </tr>
                <tr>
                <td> Apellido Materno</td>
                <td><input type="text" id="apmaterno" name="apmaterno" value="' . $obj->getApMaterno() . '" readonly="readonly" disabled="true"/></td>
                </tr>
                <tr>
                <td>Sexo</td>
                <td>';
    if ('masculino' == $obj->getSexo()) {
        echo " <input type='radio' name='sexo' value='Femenino' checked disabled='true'>Femenino";
        echo "<input type='radio' name='sexo' value='Masculino' disabled='true'>Masculino";
    } else {
        echo " <input type='radio' name='sexo' value='Femenino' disabled='true'>Femenino";
        echo "<input type='radio' name='sexo' value='Masculino' checked disabled='true'>Masculino";
    } echo '</td>
                </tr>
                
                
                <td>Estado Civil</td>
                <td> <select name="idedocivil" disabled="true">;';
    foreach ($edoscivil as $fila) {
        if ($fila->idedocivil == $obj->getIdedocivil())
            echo '<option value=' . $fila->idedocivil . ' selected>' . $fila->nombre . '</option>';
        else
            echo '<option value=' . $fila->idedocivil . '>' . $fila->nombre . '</option>';
    }
    echo ' </select> </td>
                </tr>
                <tr>
                <td>Curp </td>
                <td><input type="text" id="curp" name="curp" value="' . $obj->getCurp() . '" readonly="readonly" disabled="true"/></td>
                </tr>                
                </TR>
                <tr>
                <td><button><a href="' . $base . '/alumno/index">Regresar</a></button></form></td>
                </tr>
                </table>';
    echo "<button><a href='$base/alumno/extrae/" . $obj->getIdAlumno() .
    "'>Modificar</a></button>"; /*
      echo '<button><a href="' . $base . '/alumno/index">Regresar</a></button></form>'; */
}
?>
        
