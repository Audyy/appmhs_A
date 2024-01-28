<?php

class RuangModel
{
    private $table = 'ruang';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllRuang()
    {
        $this->db->query('SELECT ruang.*, programstudi.NamaProgram FROM ' . $this->table . ' JOIN programstudi ON programstudi.ProgramStudiID = ruang.ProgramStudiID');
        return $this->db->resultSet();
    }

    public function getRuangById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE RuangID=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function tambahRuang($data)
    {
        $query = "INSERT INTO ruang (KodeRuang, Gedung, Lantai, ProgramStudiID, Kelas) VALUES (:kode_ruang, :gedung, :lantai, :program_studi_id, :kelas)";
        $this->db->query($query);
        $this->db->bind('kode_ruang', $data['kode_ruang']);
        $this->db->bind('gedung', $data['gedung']);
        $this->db->bind('lantai', $data['lantai']);
        $this->db->bind('program_studi_id', $data['program_studi_id']);
        $this->db->bind('kelas', $data['kelas']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function updateDataRuang($data)
    {
        $query = "UPDATE ruang SET KodeRuang=:kode_ruang, Gedung=:gedung, Lantai=:lantai, ProgramStudiID=:program_studi_id, Kelas=:kelas WHERE RuangID=:id";
        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('kode_ruang', $data['kode_ruang']);
        $this->db->bind('gedung', $data['gedung']);
        $this->db->bind('lantai', $data['lantai']);
        $this->db->bind('program_studi_id', $data['program_studi_id']);
        $this->db->bind('kelas', $data['kelas']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function deleteRuang($id)
    {
        $this->db->query('DELETE FROM ' . $this->table . ' WHERE RuangID=:id');
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function cariRuang($keyword)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE KodeRuang LIKE :keyword OR Gedung LIKE :keyword OR Kelas LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();
    }
}
