
        <form action='<?php echo $base ?>/participante/insert' method="post" >
            <table >
                <tr>
                    <td><label for="nocontrol">No. control: </label></td>
                    <td><input type="text" id="nocontrol" name="nocontrol"
                               required aria-required="true" maxlength="10"></td>
                </tr>
                <tr>
                    <td><label for="nombre">Nombre: </label></td>
                    <td><input type="text" id="nombre" name="nombre"
                               required aria-required="true" maxlength="25"></td>
                </tr>
                <tr>
                    <td><label for="appaterno">Apellido paterno: </label></td>
                    <td><input type="text" id="appaterno" name="appaterno"
                               required aria-required="true" maxlength="25"></td>
                </tr>
                <tr>
                    <td><label for="apmaterno">Apellido materno: </label></td>
                    <td><input type="text" id="apmaterno" name="apmaterno"
                               required aria-required="true" maxlength="25"></td>
                </tr>
                <tr>
                    <td><label for="curp">Curp: </label></td>
                    <td><input type="text" id="curp" name="curp"
                               required aria-required="true" maxlength="18"></td>
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
                        <select  title="EdoCivil"   name="idedocivil" id="id" value="<?php echo!empty($idedocivil) ? $idedocivil : ''; ?>" required >
                            <option value="">Selecciona...</option>
                            <?php
                            foreach ($edoscivil as $fila) {
                                if($fila->estado == 1){
                                    ?>                          
                                <option value="<?= $fila->idedocivil ?>"><?= $fila->nombre ?></option>
                                <?php
                                }else{
                                    ?>                          
                                <option disabled="true" value="<?= $fila->idedocivil ?>"><?= $fila->nombre ?></option>
                                <?php
                                }
                                
                            }
                            ?>      
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="grupo">Grupo: </label></td>
                    <td>
                        <select  title="grupos"   name="idgrupo" id="" value="<?php echo!empty($idgrupo) ? $idgrupo : ''; ?>" required >
                            <option value="">Selecciona...</option>
                            <?php
                            foreach ($grupos as $fila) {
                                if($fila->estado==1){
                                    ?>
                                    <option value="<?= $fila->idgrupo ?>"><?= $fila->nombre ?></option>
                                    <?php
                                }else{
                                    ?>
                                    <option disabled="true" value="<?= $fila->idgrupo ?>"><?= $fila->nombre ?></option>
                                    <?php
                                }
                                
                            }
                            ?>      
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="email">Email: </label></td>
                    <td><input type="email" id="email" name="email"
                               required aria-required="true" maxlength="30"></td>
                </tr>
                <tr>
                    <td><label for="telefono">Telefono: </label></td>
                    <td><input type="tel" id="telefono" name="telefono"
                               required aria-required="true" maxlength="10"></td>
                </tr>

            </table>
            <input type="submit" name="guardar" value="Agregar " >
            <button><a href='<?php echo $base ?>/participante/index'>Cancelar</a></button>
        </form>

    </body>
</html>

