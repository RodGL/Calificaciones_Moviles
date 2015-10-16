<?php
                        echo '<TABLE class="table table-striped">';
                        echo '<TR><TD colspan=8>';
                        echo '<a  href="' . $base . '/grupo/nuevo"><button class="btn btn-lg btn-primary">Agregar</button></a>';
                        echo '</TD></TR>';
                        echo '<TR><TD>Nombre</TD><TD>Descripción</TD><TD colspan=3>Acciones</TD></TR>';
                        foreach ($datos as $obj) {
                            echo '</TD><TD>';
                            echo $obj->getNombre();
                            echo '</TD><TD>';
                            echo $obj->getDescripcion();

                            echo '</TD><TD>';
                            echo "<a href='$base/grupo/consulta/" . $obj->getIdgrupo() .
                            "'>Consultar</a>";
                            echo '</TD><TD>';
                            echo "<a href='$base/grupo/extrae/" . $obj->getIdgrupo() .
                            "'>Modificar</a>";
                            echo '</TD><TD>';
                            echo '';
                            if ($obj->getStatus() == 1) {
                                echo "<a href='$base/grupo/desactiva/" . $obj->getIdgrupo() .
                                "'>Desactivar</a>";
                            } else {
                                echo "<a href='$base/grupo/activa/" . $obj->getIdgrupo() .
                                "'>Activar</a>";
                            }

                            echo '</TD></TR>';
                        }
                        echo '</TABLE>';
                        ?>
