<?php
session_start(); // This is need.Otherwise not getting your name in the chat box.
$_SESSION['username'] = $this->session->userdata('username'); // Must be already set
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">

        <title>Plataforma - Chat</title>

        <script type="text/javascript" src="http://localhost:81/plataforma/assets/js/jquery.js"></script>
        <script type="text/javascript" src="http://localhost:81/plataforma/assets/js/chat.js"></script>
        <link type="text/css" rel="stylesheet" media="all" href="http://localhost:81/plataforma/assets/css/chat.css" />
        <link type="text/css" rel="stylesheet" media="all" href="http://localhost:81/plataforma/assets/css/screen.css" />
        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="http://localhost:81/plataforma/bootstrap-3.3.2/css/bootstrap.min.css">
        <!-- Bootstrap theme -->
        <link rel="stylesheet" href="http://localhost:81/plataforma/bootstrap-3.3.2/css/bootstrap-theme.min.css">
        <!-- Custom styles for this template -->
        <link rel="stylesheet" href="http://localhost:81/plataforma/bootstrap-3.3.2/css/theme.css">
        <link rel="stylesheet" href="http://localhost:81/plataforma/bootstrap-3.3.2/css/fabs.css">

        <!--[if lte IE 7]>
        <link type="text/css" rel="stylesheet" media="all" href="http://demo.webexplorar.com/codeigniter/application/css/screen_ie.css" />
        <![endif]--> 

    </head>
    <body>
        <div class="container">
            <nav>
                <img src='http://localhost:81/plataforma/assets/images/calif.svg'  title='banner' alt='banner'/>

            </nav>

            <footer class="footer" style="background-color: #3EAEDE; text-align: center">
             
               <a href='http://localhost:81/plataforma/admin/'>Inicio</a>
            </footer>


            <h2>Lista de usuarios</h2>
            <div >
                <table width="25%" cellspacing="1" cellpadding="2" class="tableContent" style="margin-left:0px !important;">
                    <tbody>
                        <tr style="background-color:#9EB0E9;  font-size:13px; font-weight:bold; color:#fff;">
                            <th>Online</th>
                            <th>User Id</th>
                            <th>Usuario</th>
                        </tr>

                        <?php
                        if (isset($listOfUsers)) {
                            foreach ($listOfUsers->result() as $res) {
                                ?>

                                <tr style="background-color:#efefef;">
                                    <td><?php
                                        if ($res->online == 1)
                                            echo 'Active';
                                        else
                                            echo 'Inactive';
                                        ?></td>
                                    <td><?php echo $res->perfil; ?></td>
                                    <td><?php if ($_SESSION['username'] == $res->username) { ?>
                                            <a href="#" style="text-decoration:none">
                                            <?php } else { ?>  
                                                <a href="javascript:void(0)" onClick="javascript:chatWith('<?php echo $res->username; ?>');">
                                                <?php } ?>      
                                                <?php echo $res->username; ?>
                                            </a>
                                    </td>
                                </tr>
                                <?php
                            } // end foreach loop
                        } // end if condition
                        ?>	  	  	

                    </tbody>
                </table>

            </div>

        </div>

    </body>
</html> 