

<?php

foreach ($datos as $obj) {
    echo '<form action="' . $base . '/participante/modifica" method="post">
                <table>
                <tr>
                <td>No. Control</td>
                <td>
                <input type="text" id="id" name="id" value="' . $obj->getId() . '" hidden="true"  />                
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
                <td>Curp </td>
                <td><input type="text" id="curp" maxlength="18" name="curp" value="' . $obj->getCurp() . '"/></td>
                </tr>
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
        if($fila->estado ==1){
            if ($fila->idedocivil == $obj->getIdedocivil()){
            echo '<option value=' . $fila->idedocivil . ' selected>' . $fila->nombre . '</option>';
            }else{ 
            echo '<option value=' . $fila->idedocivil . '>' . $fila->nombre . '</option>';
            }
        }else{
            if ($fila->idedocivil == $obj->getIdedocivil()){
            echo '<option disabled="true" value=' . $fila->idedocivil . ' selected>' . $fila->nombre . '</option>';
            }else{ 
            echo '<option disabled="true" value=' . $fila->idedocivil . '>' . $fila->nombre . '</option>';
            }  
        }    
    }
    echo ' </select> </td>
                </tr>
                <tr>
                <td>Grupo</td>
                <td> <select name="idgrupo">;';
    foreach ($grupos as $fila) {
        if($fila->estado ==1){
            if ($fila->idgrupo == $obj->getIdgrupo()){
                echo '<option value=' . $fila->idgrupo . ' selected>' . $fila->nombre . '</option>';
            }else{
                echo '<option value=' . $fila->idgrupo . '>' . $fila->nombre . '</option>';
            }   
        }else{
            if ($fila->idgrupo == $obj->getIdgrupo()){
                echo '<option  disabled="true" value=' . $fila->idgrupo . ' selected>' . $fila->nombre . '</option>';
            }else{
                echo '<option disabled="true" value=' . $fila->idgrupo . '>' . $fila->nombre . '</option>';
            } 
        }
    }
    echo ' </select> </td>
                </tr>
               
                    
             <tr>
                <td> Email</td>
                <td><input type="text" id="email" maxlength="25" name="email" value="' . $obj->getEmail() . '"/></td>
                </tr>
             <tr>
                <td> Telefono</td>
                <td><input type="text" id="telefono" maxlength="25" name="telefono" value="' . $obj->getTelefono() . '"/></td>
                </tr>
                                

                </table>
               <input type="submit" name="guardar" value="Guardar"/>
                <button><a href="' . $base . '/participante/index">Cancelar</a></button></form>';
}
?>
