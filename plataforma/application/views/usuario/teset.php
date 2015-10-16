<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
       
        <script type="text/javascript" src="<?php echo"$base/assets/js/jquery-1.4.2.min.js"; ?>"></script>
        <script type="text/javascript" src="<?php echo"$base/assets/js/jquery.validate.js"; ?>"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#ok").hide();

                $("#formid").validate({
                    rules: {
                        name: {required: true, minlength: 2},
                        lastname: {required: true, minlength: 2},
                        email: {required: true, email: true},
                        phone: {minlength: 2, maxlength: 15},
                        years: {required: true},
                        message: {required: true, minlength: 2}
                    },
                    messages: {
                        name: "Debe introducir su nombre.",
                        lastname: "Debe introducir su apellido.",
                        email: "Debe introducir un email válido.",
                        phone: "El número de teléfono introducido no es correcto.",
                        years: "Debe introducir solo números.",
                        message: "El campo Mensaje es obligatorio.",
                    },
                    submitHandler: function (form) {
                        var dataString = 'name=' + $('#name').val() + '&lastname=' + $('#lastname').val();
                        $.ajax({
                            type: "POST",
                            url: "send.php",
                            data: dataString,
                            success: function (data) {
                                $("#ok").html(data);
                                $("#ok").show();
                                $("#formid").hide();
                            }
                        });
                    }
                });
            });
        </script>


    </head>

    <body>
        <form method="post" id="formid" name="formid">
            <div id="ok"></div>
            <p><span>Nombre</span>
                <input type="text" name="name" id="name" /></p>
            <p><span>Apellidos</span>
                <input type="text" name="lastname" id="lastname" /></p>
            <p><span>Email</span>
                <input type="text" name="email" id="email" /></p>
            <p><span>Teléfono</span>
                <input type="text" name="phone" id="phone" /></p>
            <p><span>Edad</span>
                <input type="text" name="years" id="years" /></p>
            <p><span>Mensaje</span>
                <textarea id="message" name="message" rows="5" cols="53"></textarea></p>

            <input type="submit" value="Enviar" style=" margin-left:565px;" />
        </form>

    </body>
</html>