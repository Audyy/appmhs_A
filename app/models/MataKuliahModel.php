<?php
class MataKuliahModel
{
    private $table = 'matakuliah';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllMataKuliah()
    {
        $this->db->query('SELECT * FROM ' . $this->table);

        return $this->db->resultSet();
    }

    public function getMataKuliahById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE MataKuliahID=:id');
        $this->db->bind('id', $id);

        return $this->db->single();
    }

    public function tambahMataKuliah($data)
    {
        $query = "INSERT INTO matakuliah(NamaMataKuliah) VALUES (:nama_matakuliah)";
        $this->db->query($query);
        $this->db->bind('nama_matakuliah', $data['nama_matakuliah']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updateDataMataKuliah($data)
    {
        $query = 'UPDATE matakuliah SET NamaMataKuliah=:nama_matakuliah WHERE MataKuliahID=:id';
        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('nama_matakuliah', $data['nama_matakuliah']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function deleteMataKuliah($id)
    {
        $this->db->query('DELETE FROM ' . $this->table . ' WHERE MataKuliahID=:id');
        $this->db->bind('id', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function cariMataKuliah()
    {
        $key = $_POST['key'];
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE NamaMataKuliah LIKE :key');
        $this->db->bind('key', "%$key%");

        return $this->db->resultSet();
    }
}
