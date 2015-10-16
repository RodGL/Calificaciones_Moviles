<?php

require_once 'IModeloAbstracto.php'; //importa la clase
require 'pojo/alumnoPojo.php'; //busca el archivo alumno_pojo
/**
 * Objetivo:
 * Definir el modelo de los datos proporcionados para curso.
 *
 * @author Gabriel Barrón Rodríguez.
 * @author gbarron@utng.edu.mx
 * @version 1.0
 */

class AlumnoModel extends CI_Model {

    /**
     * Constructor
     */
    public function __construct() {
        parent::__construct();
//Carga el acceso configurada en application|config|database.php
        $this->load->database();
    }

    /**
     * Método que extrae todos los alumnos.
     * @param <String> $idAlumno
     * @return Un arreglo de las tuplas encontradas.
     */
    public function query($idAlumno = '') {
        $qry = null;
        if (empty($idAlumno)) { 
            $qry = $this->db->get('alumno'); 
        } else {
            $qry = $this->db->get('alumno', array('idAlumno' => $idAlumno));
        }
        $data = array();
        foreach ($qry->result() as $key => $reg) {
            $alumno = new AlumnoPojo();
            $alumno->setUsuario($reg->usuario);
            $alumno->setNocontrol($reg->nocontrol);
            $alumno->setGrupo($reg->grupo);
            $alumno->setArea($reg->area);
            $alumno->setNivel($reg->nivel);
            $alumno->setGrado($reg->grado);
            $alumno->setSituacion($reg->situacion);
            $alumno->setEstatus($reg->estatus);
            array_push($data, $alumno);
        }
        return $data;
    }

    /**
     * Método que permite agregar un curso a la BD.
     *
     * @param CursoPojo $alumno El objeto curso
     */
    public function insert($alumno) {
        if ($alumno instanceof AlumnoPojo) { //Verifica si es un área a insertar
//Crea un arreglo Nombre campo y valor
            $datos = array(
                "usuario" => $alumno->getUsuario(),
                "nocontrol" => $alumno->getNocontrol(),
                "grupo" => $alumno->getGrupo(),
                "area" => $alumno->getArea(),
                "nivel" => $alumno->getNivel(),
                "grado" => $alumno->getGrado(),
                "situacion" => $alumno->getSituacion(),
                "estatus" => $alumno->getEstatus()
            );
            $comando = $this->db->insert_string("alumno", $datos);
            $this->db->query($comando);
        }
    }

    /**
     * Método que acepta un parámetro para eliminar el registro de la BD.
     * @param <type> $idAlumno Identificador del curso.
     */
    public function delete($idAlumno) {
//Verifica que no vaya vacío.
        if (isset($idAlumno)) {
            $stmtDelete = "Delete from alumno where nocontrol = " . $idAlumno;
            $this->db->query($stmtDelete);
        }
    }

    /**
     *
     * @param AlumnoPojo $alumno
     */
    public function update($alumno) {
        if ($alumno instanceof AlumnoPojo) {
//Crea un arreglo con Nombre de campo y valor
            $datos = array(
                "usuario" => $alumno->getUsuario(),
                "nocontrol" => $alumno->getNocontrol(),
                "grupo" => $alumno->getGrupo(),
                "area" => $alumno->getArea(),
                "nivel" => $alumno->getNivel(),
                "grado" => $alumno->getGrado(),
                "situacion" => $alumno->getSituacion(),
                "estatus" => $alumno->getEstatus()        
            );
            $where = "nocontrol = " . $alumno->getNocontrol();
            $comando = $this->db->update_string('alumno', $datos, $where);
            $this->db->query($comando);
        }
    }

    /**
     * Metodo que devuelve un alumno  en especifico
     * @param type $id
     * @return array
     */
    public function extrae($id) {
        $this->db->select('*');
        $this->db->from('alumno');
        $this->db->where('nocontrol', $id);
        $consulta = $this->db->get();
        $data = array();
        foreach ($consulta->result() as $key => $reg) {

            $alumno = new AlumnoPojo();
            
            $alumno->setUsuario($reg->usuario);
            $alumno->setNocontrol($reg->nocontrol);
            $alumno->setGrupo($reg->grupo);
            $alumno->setArea($reg->area);
            $alumno->setNivel($reg->nivel);
            $alumno->setGrado($reg->grado);
            $alumno->setSituacion($reg->situacion);
            $alumno->setEstatus($reg->estatus);
            array_push($data,  $alumno);
        }

        return $data;
    }
    
    public function edoscivil() {
        $this->db->order_by('idedocivil', 'asc');
        $edoscivil = $this->db->get('edocivil');
        if ($edoscivil->num_rows() > 0) {
            return $edoscivil->result();
        }
    }

}


?>