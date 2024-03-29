<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profesor_model extends CI_Model
{
    public function construct()
    {
        parent::__construct();
    }
    public function getAll()
    {
        $query = $this->db->query("SELECT a.idprofesor, CONCAT(a.nombre, ' ', a.apellido) AS 'nombreCompleto',
                                   a.fecha_nacimiento, a.profesion, a.genero, a.email FROM profesores a;");
        $records = $query->result();
        return $records;
    }

    //Funcion que permite agregar elementos a la tabla profesor
    public function insert($data)
    {
        $this->db->insert("profesores", $data);
        $rows = $this->db->affected_rows();
        return $rows;
    }
    //Funcion que permite eliminar profesor
    public function delete($id)
    {
        if ($this->db->delete("profesores", "idprofesor='" . $id . "'")) {
            return true;
        }
    }
    ///Funcion que permite consultar profesor por ID
    public function getById($id)
    {
        return $this->db->get_where("profesores", array("idprofesor" => $id))->row();
    }

    public function update($data, $id)
    {
        try {
            $this->db->where("idprofesor", $id);
            $this->db->update("profesores", $data);
            $rows = $this->db->affected_rows();
            return $rows;
        } catch (Exception $ex) {
            return -1;
        }
    }
}