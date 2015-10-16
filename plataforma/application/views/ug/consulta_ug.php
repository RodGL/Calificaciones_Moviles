
<?php

foreach ($datos as $obj) {
    echo '<form >
                <table class="table table-condensed">
                <tr>
                <td> Id del Grupo</td>
                <td>' . $obj->getIdgrupo() . '</td>
                </tr>
                <tr>
                <td> Nombre</td>
                <td>' . $obj->getNombre() . '</td>
                </tr>
                <tr>
                <td>Descripcion</td>
                 <td>' . $obj->getDescripcion() . '</td>
                </tr>
                </table></form>';
    echo "<button><a href='$base/grupo/index'>Regresar</a></button>";
    
    echo "<button><a href='$base/grupo/extrae/" . $obj->getIdgrupo() ."'>Modificar</a></button>"; 
}
    ?>        