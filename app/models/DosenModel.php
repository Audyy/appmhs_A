<?php
class DosenModel
{
    private $table = 'dosen';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllDosen()
    {
        $this->db->query('SELECT * FROM ' . $this->table);

        return $this->db->resultSet();
    }

    public function getDosenById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE DosenID=:id');
        $this->db->bind('id', $id);

        return $this->db->single();
    }

    public function tambahDosen($data)
    {
        $query = "INSERT INTO dosen(NamaDosen, Alamat, TanggalLahir, JenisKelamin, KontakDarurat) VALUES (:nama_dosen, :alamat, :tgl_lahir, :jns_kelamin, :kontak)";
        $this->db->query($query);
        $this->db->bind('nama_dosen', $data['nama_dosen']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->bind('tgl_lahir', $data['tgl_lahir']);
        $this->db->bind('jns_kelamin', $data['jns_kelamin']);
        $this->db->bind('kontak', $data['kontak']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updateDataDosen($data)
    {
        $query = 'UPDATE dosen SET NamaDosen=:nama_dosen, Alamat=:alamat, TanggalLahir=:tgl_lahir, JenisKelamin=:jns_kelamin, KontakDarurat=:kontak WHERE DosenID=:id';
        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('nama_dosen', $data['nama_dosen']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->bind('tgl_lahir', $data['tgl_lahir']);
        $this->db->bind('jns_kelamin', $data['jns_kelamin']);
        $this->db->bind('kontak', $data['kontak']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function deleteDosen($id)
    {
        $this->db->query('DELETE FROM ' . $this->table . ' WHERE DosenID=:id');
        $this->db->bind('id', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function cariDosen()
    {
        $key = $_POST['key'];
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE NamaDosen LIKE :key');
        $this->db->bind('key', "%$key%");

        return $this->db->resultSet();
    }
}
