<?php

foreach ($datos as $obj) {
    echo '<form >
                <table border="1">
                <tr>
                <td> Id del Participante</td>
                <td><input type="text" id="id" name="id" value="' . $obj->getId() . '" readonly="readonly" disabled="true"/></td>
                </tr>
                <tr>
                <tr>
                <td> No. de Control</td>
                <td><input type="text" id="nocontrol" name="nocontrol" value="' . $obj->getNocontrol() . '" readonly="readonly" disabled="true"/></td>
                </tr>
                <tr>
                <td> Nombre</td>
                <td><input type="text" id="nombre" name="nombre" value="' . $obj->getNombre() . '" readonly="readonly" disabled="true"/></td>
                </tr>
                <tr>
                <td> Apellido Paterno</td>
                <td><input type="text" id="appaterno" name="appaterno" value="' . $obj->getAppaterno() . '" readonly="readonly" disabled="true"/></td>
                </tr>
                <tr>
                <td> Apellido Materno</td>
                <td><input type="text" id="apmaterno" name="apmaterno" value="' . $obj->getApmaterno() . '" readonly="readonly" disabled="true"/></td>
                </tr>
                <tr>
                <td> Curp</td>
                <td><input type="text" id="curp" name="curp" value="' . $obj->getCurp() . '" readonly="readonly" disabled="true"/></td>
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
                

                <tr>
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
                <td>Grupo</td>
                <td> <select name="idgrupo" disabled="true">;';
    foreach ($grupos as $fila) {
        if ($fila->idgrupo == $obj->getIdgrupo())
            echo '<option value=' . $fila->idgrupo . ' selected>' . $fila->nombre . '</option>';
        else
            echo '<option value=' . $fila->idgrupo . '>' . $fila->nombre . '</option>';
    }
    echo ' </select> </td>
                </tr>


<tr>
                <td> Email</td>
                <td><input type="text" id="email" name="email" value="' . $obj->getEmail() . '" readonly="readonly" disabled="true"/></td>
                </tr>
                <tr>
                <td> Telefono</td>
                <td><input type="text" id="telefono" name="telefono" value="' . $obj->getTelefono() . '" readonly="readonly" disabled="true"/></td>
                </tr>
                <tr>
                <td><button><a href="' . $base . '/participante/index">Regresar</a></button></form></td>
                </tr>
                </table>';
    echo "<button><a href='$base/participante/extrae/" . $obj->getId() .
    "'>Modificar</a></button>"; /*
      echo '<button><a href="' . $base . '/alumno/index">Regresar</a></button></form>'; */
}
?>
        
