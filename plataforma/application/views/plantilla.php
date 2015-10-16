<!DOCTYPE html>

<html lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Cursos On line</title>
        <link href="../../assets/css/style.css" rel="stylesheet" type="text/css"/>
        <link href="../../assets/css/style2.css" rel="stylesheet" type="text/css"/>
    </head>

    <body>
        <div id="mainPan">
            <div id="leftPan">
                <div id="leftTopPan"> <a href="index.html"><img src="images/logo.png" title="Consultant" alt="Consultant" width="160" height="39" border="0" /></a> </div>
                <ul>
                    <li class="home">Inicio</li>
                    <li><a href="#">Cursos</a></li>
                    <li><a href="#">Galeria</a></li>
                    <li><a href="#">Catalogos</a>



                    </li>

                    <li><a href="#">Acerca de</a></li>
                    <li class="contact"><a href="#">Contactanos </a></li>
                </ul>
                
            </div>
            <div id="rightPan">
                <h1> </h1>

                <!--menu horizobtal-->

                <div class="estiloAdministradorbox-body estiloAdministradorsheet-body">
                    <div class="estiloAdministradorbar estiloAdministradornav">
                        <div class="estiloAdministradornav-outer">
                            <ul class="estiloAdministradorhmenu">

                                <li>
                                    <a href="">Participante</a>
                                </li>
                                
                                <li>
                                    <a href="">Grupo</a>
                                </li>
                                
                                <li>
                                    <?=anchor(base_url().'login/logout_ci', 'Cerrar sesión')?>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- -->

                    <h2> </h2>
                    <div>
                        
                                <?php echo $right; ?>
                    </div>


                </div>
            </div>
        </div>
        <div id="footermainPan">
            <div id="footerPan">
                <ul>
                    <li><a href="#">Facebook</a>| </li>
                    <li><a href="#">Twitter</a> | </li>
                    <li><a href="#">Google plus</a>| </li>
                </ul>
                <p class="copyright">Plataforma online &copy;</p>
            </div>
        </div>
    </body>
</html>
