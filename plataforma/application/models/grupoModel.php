<?php

require_once 'IModeloAbstracto.php'; //importa la clase
require 'pojo/grupoPojo.php'; //busca el archivo grupo_pojo
/**
 * Objetivo:
 * Definir el modelo de los datos proporcionados para grupo.
 *
 * @author Fabiola Santes Rodríguez.
 * @author fabiolasantesrodriguez@gmail.com
 * @version 1.0
 */

class GrupoModel extends CI_Model  {

    /**
     * Constructor
     */
    public function __construct() {
        parent::__construct();
//Carga el acceso configurada en application|config|database.php
        $this->load->database();
    }

    /**
     * Método que extrae todos los grupos.
     * @param <String> $idgrupo
     * @return Un arreglo de las tuplas encontradas.
     */
    public function query($idgrupo = '') {
        $qry = null;
        if (empty($idgrupo)) { //verifica si hay una área en específico
            $qry = $this->db->get('1211100255_grupo'); //extrae toda la tabla
        } else {
            $qry = $this->db->get('1211100255_grupo', array('idgrupo' => $idgrupo));
        }
        $data = array();
        foreach ($qry->result() as $key => $reg) {
            $grupo = new GrupoPojo();
            $grupo->SetIdgrupo($reg->idgrupo);
            $grupo->setNombre($reg->nombre);
            $grupo->setDescripcion($reg->descripcion);
            $grupo->setStatus($reg->status);
            array_push($data, $grupo);
        }
        return $data;
    }

    /**
     * Método que permite agregar un grupo a la BD.
     *
     * @param GrupoPojo $grupo El objeto grupo
     */
    public function insert($grupo) {
        if ($grupo instanceof GrupoPojo) { //Verifica si es un grupo a insertar
//Crea un arreglo Nombre campo y valor
            $datos = array(
                "idgrupo" => $grupo->getIdgrupo(),
                "nombre" => $grupo->getNombre(),
                "descripcion" => $grupo->getDescripcion()
            );

            $var_a_validar = $grupo->getNombre();

            $existe = mysql_num_rows(mysql_query("SELECT * FROM 1211100255_grupo WHERE nombre LIKE '$var_a_validar'"));

            if ($existe == 0) {

                $comando = $this->db->insert_string("1211100255_grupo", $datos);
                $this->db->query($comando);
                return true;
            } else {

                echo '<script language="javascript">alert("No puede insertar grupos con el mismo nombre");</script>';
                return false;
            }
        }
    }

    /**
     * Método que acepta un parámetro para eliminar el registro de la BD.
     * @param <type> $idgrupo Identificador del grupo.
     */
    public function desactiva($idgrupo) {
//Verifica que no vaya vacío.
        if (isset($idgrupo)) {
            $stmtDelete = "UPDATE `1211100255_grupo` SET `status`= 2  where idgrupo = " . $idgrupo;
            $this->db->query($stmtDelete);
        }
    }

    public function activa($idgrupo) {
//Verifica que no vaya vacío.
        if (isset($idgrupo)) {
            $stmtDelete = "UPDATE `1211100255_grupo` SET `status`= 1  where idgrupo = " . $idgrupo;
            $this->db->query($stmtDelete);
        }
    }

    /**
     *
     * @param GrupoPojo $grupo
     */
    public function update($grupo) {
        if ($grupo instanceof GrupoPojo) {
//Crea un arreglo con Nombre de campo y valor
            $datos = array(
                "idgrupo" => $grupo->getIdgrupo(),
                "nombre" => $grupo->getNombre(),
                "descripcion" => $grupo->getDescripcion()
            );

                $where = "idgrupo = " . $grupo->getIdgrupo();
                $comando = $this->db->update_string('1211100255_grupo', $datos, $where);
                $this->db->query($comando);
        }
    }
    

    /**
     * Método que devuelve un grupo  en especifico
     * @param type $idgrupo
     * @return array
     */
    
    public function extrae($idgrupo) {
        $this->db->select('*');
        $this->db->from('1211100255_grupo');
        $this->db->where('idgrupo', $idgrupo);
        $consulta = $this->db->get();

        $data = array();

        foreach ($consulta->result() as $key => $reg) {

            $grupo = new GrupoPojo();

            $grupo->SetIdgrupo($reg->idgrupo);
            $grupo->setNombre($reg->nombre);
            $grupo->setDescripcion($reg->descripcion);
            $grupo->setStatus($reg->status);

            array_push($data, $grupo);
        }

        return $data;
    }

}

?>
