<!DOCTYPE html>

<html>
    <head>
        <title>Layout</title>
        <script src="http://faby.esy.es:81/plataforma/assets/js/jquery-2.1.3.min.js" type="text/javascript"></script>
        <script>
            $(document).ready(function(){ 
                alert("Hola a todos ");
            });
        </script>
        
    </head>
    <body>
        <div id="contenedor">
            <div id="encabezado">
                <?php echo $header; ?>
            </div>
            <div id="contenido">
                <div id="izquierda">Contenido izq</div>
                <div id="derecha"><?php echo $right; ?></div>
            </div>
            <div id="pie">Info de coontacto</div>
            
        </div>
    </body>
</html>