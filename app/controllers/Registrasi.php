<?php

session_start();
class Registrasi extends Controller {
    public function index() {
        $data['judul'] = 'Registrasi';
        $data['css'] = 'beranda';
        $this->view('template/header', $data);
        $this->view('registrasi/index');
        $this->view('template/footer');
    }

    public function tambah_akun(){
        $nama = $_POST['username'];
        $email = $_POST['email'];
        $no_telepon = $_POST['no_telepon'];
        $password = $_POST['password'];
        $alamat = $_POST['alamat'];

        // Query SQL untuk menyimpan data anggota
        $sql = $this->model('pelanggan')->insert_akun($nama, $email, $no_telepon, $password, $alamat);

        if ($sql > 0) {
            echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>';
            echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>';
            echo '<script>
                    $(document).ready(function(){
                        Swal.fire({
                            icon: "success",
                            title: "Berhasil",
                            text: "Registrasi Berhasil Silahkan Login!",
                            timer: 2000,
                            showConfirmButton: false
                        }).then(function() {
                            window.location.href = "'.BASEURL.'/login/index";
                        });
                    });
                  </script>';
            exit();
        } else {
            echo "Error: ";
        }
    }
}