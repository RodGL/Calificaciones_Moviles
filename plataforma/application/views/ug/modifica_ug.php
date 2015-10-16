

<?php

foreach ($datos as $obj) {
    echo '<form action="' . $base . '/grupo/modifica" method="post">
                <table>
                
                <tr>
                <td>Nombre</td>
                <td>
                <input type="text" id="idgrupo" name="idgrupo" value="' . $obj->getIdgrupo() . '" hidden="true"  />                
                <input type="text" maxlength="25"  id="nombre" name="nombre" value="' . $obj->getNombre() . '"/></td>
                </tr>
                <tr>
                <td>Descripcion</td>
                   <td> <textarea  rows="2"  name="descripcion" id="descripcion">' . $obj->getDescripcion() . ' </textarea>
                       </td>
                </tr>
                <tr>
                                

                </table>
               <input type="submit" name="guardar" value="Guardar"/>
                <button><a href="' . $base . '/grupo/index">Cancelar</a></button></form>';
}
?>
