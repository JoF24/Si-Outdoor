<?php

class db_penyewaan {
    private $table = 'penyewaan';
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function tambahPeminjaman($id_pelanggan, $foto_identitas, $tanggal_penyewaan, $catatan) {
        $query = "INSERT INTO ".$this->table." (id_pelanggan, foto_identitas, tanggal_penyewaan, catatan) VALUES ('$id_pelanggan', '$foto_identitas', '$tanggal_penyewaan', '$catatan')";
        $this->db->query($query);
        $this->db->execute();
        if (($this->db->rowCount()) > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getPenyewaanWithDetails() {
        $this->db->query("
            SELECT 
                penyewaan.*, 
                pelanggan.nama AS nama_penyewa, 
                operasional.nama AS nama_penanggung_jawab 
            FROM 
                penyewaan
            JOIN 
                pelanggan ON penyewaan.id_pelanggan = pelanggan.id_pelanggan
            JOIN 
                operasional ON penyewaan.id_operasional = operasional.id_operasional
        ");
        return $this->db->resultSet();
    }

    public function getPenyewaan($id) {
        $this->db->query("
            SELECT 
                penyewaan.*, 
                pelanggan.nama AS nama_penyewa, 
                operasional.nama AS nama_penanggung_jawab 
            FROM 
                penyewaan
            JOIN 
                pelanggan ON penyewaan.id_pelanggan = pelanggan.id_pelanggan
            JOIN 
                operasional ON penyewaan.id_operasional = operasional.id_operasional
            WHERE 
                penyewaan.id_pelanggan = '$id'
        ");
        return $this->db->resultset();
    }

    public function getPenyewaanById($id) {
        $this->db->query("
            SELECT 
                penyewaan.*, 
                pelanggan.nama AS nama_penyewa, 
                operasional.nama AS nama_penanggung_jawab 
            FROM 
                penyewaan
            JOIN 
                pelanggan ON penyewaan.id_pelanggan = pelanggan.id_pelanggan
            JOIN 
                operasional ON penyewaan.id_operasional = operasional.id_operasional
            WHERE 
                penyewaan.id_pelanggan = '$id'
        ");
        return $this->db->single();
    }

    public function updatePenyewaan($id, $status, $tanggal_penyewaan, $tanggal_kembali, $catatan) {
        $this->db->query("
            UPDATE penyewaan 
            SET 
                status = '$status', 
                tanggal_penyewaan = '$tanggal_penyewaan', 
                tanggal_pengembalian = '$tanggal_kembali', 
                catatan = '$catatan' 
            WHERE 
                id_penyewaan = '$id'
        ");
        $this->db->execute();
        return $this->db->rowCount();
    }
}