<!DOCTYPE html>
<html lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Cursos Online</title>
        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="<?php echo"$base/$css/bootstrap.min.css"; ?>">
        <!-- Bootstrap theme -->
        <link rel="stylesheet" href="<?php echo"$base/$css/bootstrap-theme.min.css"; ?>">
        <!-- Custom styles for this template -->
        <link rel="stylesheet" href="<?php echo"$base/$css/theme.css"; ?>">
        <link rel="stylesheet" href="<?php echo"$base/$css/fabs.css"; ?>">
    </head>
    <body>
        <?php
        $username = array('name' => 'username', 'placeholder' => 'Introduce tu usuario', 'class'=> 'form-control');
        $password = array('name' => 'password', 'placeholder' => 'introduce tu password', 'class'=> 'form-control');
        $submit = array('name' => 'submit', 'value' => 'Ingresar', 'title' => 'Iniciar sesión', 'class'=> 'btn btn-lg btn-success');
        ?>
        <?= form_open(base_url() . 'login/new_user') ?>

        <div class="container">
            <div class="header clearfix" style="background-color: #1EA3DB;">
                <nav>
                    <ul class="nav nav-pills pull-right">
                        
                    </ul>
                </nav>
                <h1 class="text-muted " style="text-align: center; color: #FFF;">Calificaciones móviles </h1>
            </div>


            <div class="jumbotron"  style="background:url(<?php echo"$base/assets/images/login.jpg"; ?>) 45% 0 no-repeat; padding:38px 0 0; height: 535px; ">
                <div id="relative">
                
                <label for="username">Usuario:</label>
                <?= form_input($username) ?><p><?= form_error('username') ?></p>
                <label for="password">Contraseña:</label>
                <?= form_password($password)  ?><p><?= form_error('password') ?></p>
                <?= form_hidden('token', $token) ?>
                <?= form_submit($submit) ?>
                <?= form_close() ?>
                <?php
                if ($this->session->flashdata('usuario_incorrecto')) {
                    ?>
                    <p><?= $this->session->flashdata('usuario_incorrecto') ?></p>
                    <?php
                }
                ?>
                </div>      
            </div>
            <footer class="footer" style="background-color: #3EAEDE; text-align: center">
                <p>© Calificiones móviles</p>
            </footer>

        </div>
    </body>
</html>
