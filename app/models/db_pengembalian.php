<?php

class db_pengembalian {
    private $table = 'pengembalian';
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function tambahPengembalian($id_pelanggan, $bukti_transaksi, $tanggal_pengembalian, $jam){
        $query = "INSERT INTO ".$this->table." (id_pelanggan, bukti_transaksi, tanggal_pengembalian, jam) VALUES ('$id_pelanggan', '$bukti_transaksi', '$tanggal_pengembalian', '$jam')";
        $this->db->query($query);
        $this->db->execute();
        if (($this->db->rowCount()) > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getPengembalianWithDetails() {
        $this->db->query("
            SELECT 
                pengembalian.*, 
                pelanggan.nama AS nama_penyewa
            FROM 
                pengembalian
            JOIN 
                pelanggan ON pengembalian.id_pelanggan = pelanggan.id_pelanggan
        ");
        return $this->db->resultSet();
    }

    public function getPengembalian($id) {
        $this->db->query("
            SELECT 
                pengembalian.*, 
                pelanggan.nama AS nama_penyewa
            FROM 
                pengembalian
            JOIN 
                pelanggan ON pengembalian.id_pelanggan = pelanggan.id_pelanggan
            WHERE 
                pengembalian.id_pelanggan = '$id'
        ");
        return $this->db->resultset();
    }


}