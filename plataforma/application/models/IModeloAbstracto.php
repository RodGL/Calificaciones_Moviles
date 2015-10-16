<?php
/**
* Propósito
* Interface que define los métodos comunes en que operamos en una
* base de datos.
*
* @author Fabiola Santes  Rodríguez.
* @author santesrodriguezfabiola@gmail.com
* @version 1.0
*/
interface IModeloAbstracto {
/**
* Método que permite extraer tuplas en una base de datos.
* @param type $obj El objeto a consultar.
*/
public function query($obj);
/**
* Método que nos permitirá insertar tuplas en una base de datos.
* @param type $obj
*/
public function insert($obj);
/**
* Método que nos permitirá eliminar un registro de la base de datos.
* @param type $id

public function delete($id);*/
/**
* Método que nos permitirá cambiar el estatus un registro de la base de datos.
* @param type $id
*/
public function activa($id);
/**
* * Método que nos permitirá cambiar el estatus un registro de la base de datos.
* @param type $id
*/
public function desactiva($id);
/**
* Método que nos permitirá actualizar una tupla de la BD.
* @param type $obj
*/
public function update($obj);
}