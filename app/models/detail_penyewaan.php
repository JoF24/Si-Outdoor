<?php

class Detail_penyewaan {
    private $table = 'detail_penyewaan';
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function tambah_ke_keranjang($id_alat, $id_pelanggan) {
        $sql = "INSERT INTO " . $this->table . " (id_alat, id_pelanggan) VALUES ('$id_alat', '$id_pelanggan')";
        $this->db->query($sql);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function getDataKeranjang($id){
        $this->db->query("SELECT * FROM ".$this->table." WHERE id_pelanggan = '$id'");
        $data = $this->db->resultset();
        return $data;
    }

    public function updateKeranjang($id_pelanggan, $id_alat, $jumlah, $durasi_sewa) {
        $total_harga = $jumlah * $durasi_sewa * $this->getHargaSewaPerHari($id_alat);
        $this->db->query("UPDATE " . $this->table . " SET jumlah = '$jumlah', durasi_sewa = '$durasi_sewa', total_harga = '$total_harga' WHERE id_pelanggan = '$id_pelanggan' AND id_alat = '$id_alat'");
        return $this->db->execute();
    }

    private function getHargaSewaPerHari($id_alat) {
        $this->db->query("SELECT harga_sewa_per_hari FROM alat_kemah WHERE id_alat = '$id_alat'");
        $result = $this->db->single();
        return $result['harga_sewa_per_hari'];
    }

    public function hapusItemKeranjang($id_detail_penyewaan){
        $sql = "DELETE FROM ".$this->table." WHERE id_detail_penyewaan = '$id_detail_penyewaan'";
        $this->db->query($sql);
        return $this->db->execute();
    }

    public function getTotalHarga($id){
        $query = "SELECT SUM(total_harga) AS total_harga FROM ".$this->table." WHERE id_pelanggan = '$id'";
        $this->db->query($query);
        $row = $this->db->single();
        
        $data = $row['total_harga'];
        
        // Pastikan untuk menangani jika nilai total_harga null (misalnya jika tidak ada transaksi)
        if ($data === null) {
            $data = 0;
        }
        return $data;
    }

    public function kosongkanKeranjang($id_pelanggan) {
        $query = "DELETE FROM ".$this->table." WHERE id_pelanggan = '$id_pelanggan'";
        $this->db->query($query);
        $this->db->execute();
        if (($this->db->rowCount()) > 0) {
            return true;
        } else {
            return false;
        }
    }
}