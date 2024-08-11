<?php

class Alat_kemah {
    private $table = 'alat_kemah';
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function insert_data($nama, $deskripsi, $stok, $harga, $gambar)
    {
        $sql = "INSERT INTO alat_kemah VALUES ('', '$nama', '$deskripsi', '$stok', '$harga', '$gambar')";
        $this->db->query($sql);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function getDataKatalog()
    {
        $sql = "SELECT * FROM ".$this->table;
        $this->db->query($sql);
        $this->db->execute();
        return $this->db->resultset();
    }

    public function getDataBarang($id){
        $this->db->query('SELECT * FROM '.$this->table.' WHERE id_alat = '.$id);
        $data = $this->db->single();
        return $data;
    }

    public function update_data($nama, $deskripsi, $stok, $harga, $gambar, $id){
        $sql = "UPDATE ".$this->table." SET nama_alat='$nama', deskripsi='$deskripsi', stok='$stok', harga_sewa_per_hari='$harga', gambar='$gambar' WHERE id_alat='$id'";
        $this->db->query($sql);
        $this->db->execute();
        return $this->db->rowCount();
    }
}