        <form action='<?php echo $base ?>/grupo/insert' method="post" >
            <table >
                <tr>
                    <td><label for="nombre">Nombre: </label></td>
                    <td><input type="text" id="nombre" name="nombre"
                               required aria-required="true" maxlength="25"></td>
                </tr>
                <tr>
                    <td><label for="appaterno">Descripcion: </label></td>
                    <td><textarea name="descripcion" id="descripcion" maxlength="500" ></textarea></td>
                </tr>

            </table>
            <input type="submit" name="guardar" value="Agregar " >
            <button><a href='<?php echo $base ?>/grupo/index'>Cancelar</a></button>
        </form>
        

