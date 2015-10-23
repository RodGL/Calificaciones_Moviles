<?php

require_once 'IModeloAbstracto.php'; //importa la clase
require 'pojo/cursoPojo.php'; //busca el archivo curso_pojo
/**
 * Objetivo:
 * Definir el modelo de los datos proporcionados para curso.
 *
 * @author Fabiola Santes Rodríguez.
 * @author fabiolasantesrodriguez@gmail.com
 * @version 1.0
 */

class CursoModel extends CI_Model {

    /**
     * Constructor
     */
    public function __construct() {
        parent::__construct();
//Carga el acceso configurada en application|config|database.php
        $this->load->database();
    }

    /**
     * Método que extrae todos los cursos.
     * @param <String> $idcurso
     * @return Un arreglo de las tuplas encontradas.
     */
    public function query($idcurso = '') {
        $qry = null;
        if (empty($idcurso)) { //verifica si hay una área en específico
            $qry = $this->db->get('1211100255_curso'); //extrae toda la tabla
        } else {
            $qry = $this->db->get('1211100255_curso', array('idcurso' => $idcurso));
        }
        $data = array();
        foreach ($qry->result() as $key => $reg) {
            $curso = new CursoPojo();
            $curso->setIdcurso($reg->idcurso);
            $curso->setNombre($reg->nombre);
            $curso->setDescripcion($reg->descripcion);
            $curso->setStatus($reg->status);
            array_push($data, $curso);
        }
        return $data;
    }

    /**
     * Método que permite agregar un curso a la BD.
     *
     * @param CursoPojo $curso El objeto curso
     */
    public function insert($curso) {
        if ($curso instanceof CursoPojo) { //Verifica si es un curso a insertar
//Crea un arreglo Nombre campo y valor
            $datos = array(
                "idcurso" => $curso->getIdcurso(),
                "nombre" => $curso->getNombre(),
                "descripcion" => $curso->getDescripcion()
            );

            $var_a_validar = $curso->getNombre();

            $existe = mysql_num_rows(mysql_query("SELECT * FROM 1211100255_curso WHERE nombre LIKE '$var_a_validar'"));

            if ($existe == 0) {

                $comando = $this->db->insert_string("1211100255_curso", $datos);
                $this->db->query($comando);
                return true;
            } else {

                echo '<script language="javascript">alert("No puede insertar cursos con el mismo nombre");</script>';
                return false;
            }
        }
    }

    /**
     * Método que acepta un parámetro para eliminar el registro de la BD.
     * @param <type> $idcurso Identificador del curso.
     */
    public function desactiva($idcurso) {
//Verifica que no vaya vacío.
        if (isset($idcurso)) {
            $stmtDelete = "UPDATE `1211100255_curso` SET `status`= 2  where idcurso = " . $idcurso;
            $this->db->query($stmtDelete);
        }
    }

    public function activa($idcurso) {
//Verifica que no vaya vacío.
        if (isset($idcurso)) {
            $stmtDelete = "UPDATE `1211100255_curso` SET `status`= 1  where idcurso = " . $idcurso;
            $this->db->query($stmtDelete);
        }
    }

    /**
     *
     * @param CursoPojo $curso
     */
    public function update($curso) {
        if ($curso instanceof CursoPojo) {
//Crea un arreglo con Nombre de campo y valor
            $datos = array(
                "idcurso" => $curso->getIdcurso(),
                "nombre" => $curso->getNombre(),
                "descripcion" => $curso->getDescripcion()
            );

                $where = "idcurso = " . $curso->getIdcurso();
                $comando = $this->db->update_string('1211100255_curso', $datos, $where);
                $this->db->query($comando);
        }
    }
    

    /**
     * Método que devuelve un curso  en especifico
     * @param type $idcurso
     * @return array
     */
    
    public function extrae($idcurso) {
        $this->db->select('*');
        $this->db->from('1211100255_curso');
        $this->db->where('idcurso', $idcurso);
        $consulta = $this->db->get();

        $data = array();

        foreach ($consulta->result() as $key => $reg) {

            $curso = new CursoPojo();

            $curso->setIdcurso($reg->idcurso);
            $curso->setNombre($reg->nombre);
            $curso->setDescripcion($reg->descripcion);
            $curso->setStatus($reg->status);

            array_push($data, $curso);
        }

        return $data;
    }

}

?>
