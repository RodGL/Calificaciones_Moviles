
<?php

echo '<TABLE BORDER=1>';
echo '<TR><TD colspan=8>';
echo '<button><a href="' . $base . '/participante/nuevo">agregar</a></button>';
echo '</TD></TR>';
echo '<TR><TD>No. de Control</TD><TD>Nombre</TD><TD>Apellido Paterno</TD><TD>Apellido Materno</TD>'
 . '<TD>Curp</TD><TD>Grupo</TD><TD colspan=3>Acciones</TD></TR>';
foreach ($datos as $obj) {
    echo '</TD><TD>';
    echo $obj->getNocontrol();
    echo '</TD><TD>';
    echo $obj->getNombre();
    echo '</TD><TD>';
    echo $obj->getAppaterno();
    echo '</TD><TD>';
    echo $obj->getApmaterno();
    echo '</TD><TD>';
    echo $obj->getCurp();
    echo '</TD><TD > <p name="idgrupo">';
   
    foreach ($grupos as $fila) {
        if ($fila->idgrupo == $obj->getIdgrupo()){
            echo $fila->nombre;
        }
    }
    echo '</p></TD><TD>';
    echo "<a href='$base/participante/consulta/" . $obj->getId() .
    "'>Consultar</a>";
    echo '</TD><TD>';
    echo "<a href='$base/participante/extrae/" . $obj->getId() .
    "'>Modificar</a>";
    echo '</TD><TD>';
    echo '';
    if ($obj->getEstado() == 1) {
        echo "<a href='$base/participante/desactiva/" . $obj->getId() .
        "'>Desactivar</a>";
    } else {
        echo "<a href='$base/participante/activa/" . $obj->getId() .
        "'>Activar</a>";
    }

    /* echo "<a href='$base/participante/delete/" . $obj->getId() .
      "'>Eliminar</a>"; */

    echo '</TD></TR>';
}
echo '</TABLE>';
?>

