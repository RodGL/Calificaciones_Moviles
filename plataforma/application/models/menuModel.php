<?php

require_once 'IModeloAbstracto.php'; //importa la clase
require 'pojo/menuPojo.php'; //busca el archivo menu_pojo
/**
 * Objetivo:
 * Definir el modelo de los datos proporcionados para menu.
 *
 * @author Fabiola Santes Rodríguez.
 * @author santesrodriguezfabiola@gmail.com
 * @version 1.0
 */

class MenuModel extends CI_Model implements IModeloAbstracto {

    /**
     * Constructor
     */
    public function __construct() {
        parent::__construct();
//Carga el acceso configurada en application|config|database.php
        $this->load->database();
    }

    /**
     * Método que extrae todos los menus.
     * @param <String> $idMenu
     * @return Un arreglo de las tuplas encontradas.
     */
    public function query($idMenu = '') {
        $qry = null;
        if (empty($idMenu)) { //verifica si hay una menu en específico
            $qry = $this->db->get('menu'); //extrae toda la tabla
        } else {
            $qry = $this->db->get('menu', array('idMenu' => $idMenu));
        }
        $data = array();
        foreach ($qry->result() as $key => $reg) {
            $menu = new MenuPojo();
            $menu->setIdMenu($reg->idmenu);
            $menu->setNombre($reg->nombre);
            $menu->setDescripcion($reg->descripcion);
            array_push($data, $menu);
        }
        return $data;   
    }

    /**
     * Método que permite agregar un curso a la BD.
     *
     * @param CursoPojo $menu El objeto curso
     */
    public function insert($menu) {
        if ($menu instanceof MenuPojo) { //Verifica si es un área a insertar
//Crea un arreglo Nombre campo y valor
            $datos = array(
                "idmenu" => $menu->getIdMenu(),
                "nombre" => $menu->getNombre(),
                "descripcion" => $menu->getDescripcion()
            );
            $comando = $this->db->insert_string("menu", $datos);
            $this->db->query($comando);
        }
    }

    /**
     * Método que acepta un parámetro para eliminar el registro de la BD.
     * @param <type> $idMenu Identificador del curso.
     */
    public function delete($idMenu) {
//Verifica que no vaya vacío.
        if (isset($idMenu)) {
            $stmtDelete = "Delete from menu where idmenu = " . $idMenu;
            $this->db->query($stmtDelete);
        }
    }

    /**
     *
     * @param MenuPojo $menu
     */
    public function update($menu) {
        if ($menu instanceof MenuPojo) {
//Crea un arreglo con Nombre de campo y valor
            $datos = array(
                "idmenu" => $menu->getIdMenu(),
                "nombre" => $menu->getNombre(),
                "descripcion" => $menu->getDescripcion()
            );
            $where = "idmenu = ".$menu->getIdMenu();
            $comando = $this->db->update_string('menu', $datos, $where);
            $this->db->query($comando);
        }
    }
    /**
     * Metodo que devuelve un menu  en especifico
     * @param type $id
     * @return array
     */
    public function extrae($id) {
        $this->db->select('idmenu,nombre,descripcion ');
        $this->db->from('menu');
        $this->db->where('idmenu', $id);
        $consulta = $this->db->get();

        $data = array();

        foreach ($consulta->result() as $key => $reg) {

            $menu = new MenuPojo();

            $menu->setIdMenu($reg->idmenu);
            $menu->setNombre($reg->nombre);
            $menu->setDescripcion($reg->descripcion);

            array_push($data, $menu);
        }

        return $data;
    }

    public function activa($id) {
        
    }

    public function desactiva($id) {
        
    }

}

?>