<?php

class Pelanggan {
    private $table = 'pelanggan';
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function login($username, $password) 
    {
        $this->db->query("SELECT * FROM " . $this->table . " WHERE nama ='".$username."'");
        $user = $this->db->single();
        if ($user && ($password == $user['password'])) {
            return $user;
        }
        return false;
    }

    public function insert_akun($nama, $email, $no_telepon, $password, $alamat){
        $sql = "INSERT INTO ".$this->table." (nama, email, no_telepon, password, alamat) VALUES ('$nama', '$email', '$no_telepon', '$password', '$alamat')";
        $this->db->query($sql);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function getDataAkun($id){
        $this->db->query("SELECT * FROM ".$this->table." WHERE id_pelanggan = ".$id);
        $data = $this->db->single();
        return $data;
    }
}