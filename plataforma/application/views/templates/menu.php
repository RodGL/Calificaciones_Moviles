<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * @author Fabiola Santes Rodríguez santesrodriguezfabiola@gmail.com
 * @version 1.0
 */

  echo '<ul class="estiloAdministradorhmenu">';
        echo '<TD><TR>';
        foreach ($datos as $obj) {
            echo '<TR><TD>';
            echo $obj->getNombre();
            echo '</TD><TD>';
            
            
            echo '</TD><TR>';
        }
        echo '</ul>';