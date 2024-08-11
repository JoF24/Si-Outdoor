<?php

class Pemilik {
    private $table = 'pemilik';
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
}