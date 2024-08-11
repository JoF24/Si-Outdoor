<?php
session_start();
class Pengembalian extends Controller {
    public function pelanggan()
    {
        $id = $_SESSION['id'];
        $data['judul'] = 'Pengembalian';
        $data['css'] = 'beranda';
        $data['pengembalian'] = $this->model('db_pengembalian')->getPengembalian($id);
        $this->view('template/header',$data);
        $this->view('pengembalian/pelanggan', $data);
        $this->view('template/footer');
    }

    public function pemilik()
    {
        $data['judul'] = 'Pengembalian';
        $data['css'] = 'beranda';
        $data['pengembalian'] = $this->model('db_pengembalian')->getPengembalianWithDetails();
        $this->view('template/header',$data);
        $this->view('pengembalian/admin', $data);
        $this->view('template/footer');
    }

    public function admin()
    {
        $data['judul'] = 'Pengembalian';
        $data['css'] = 'beranda';
        $data['pengembalian'] = $this->model('db_pengembalian')->getPengembalianWithDetails();
        $this->view('template/header',$data);
        $this->view('pengembalian/admin', $data);
        $this->view('template/footer');
    }

    public function formulir(){
        $id = $_SESSION['id'];
        $data['judul'] = 'Form Pengembalian';
        $data['css'] = 'beranda';
        $data ['pelanggan'] = $this->model('pelanggan')->getDataAkun($id);
        $this->view('template/header',$data);
        $this->view('pengembalian/formulir', $data);
        $this->view('template/footer');
    }

    public function tambah_data() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id_pelanggan = $_SESSION['id'];
            $bukti_transaksi = $_FILES['bukti_transaksi']['name'];
            $tanggal_pengembalian = $_POST['tanggal_pengembalian'];
            $jam = $_POST['jam'];

            // Upload bukti pembayaran
            $target_dir = "C:/xampp/htdocs/Si-Outdoor/public/gambar/";
            $target_file = $target_dir . basename($_FILES["bukti_transaksi"]["name"]);
            move_uploaded_file($_FILES["bukti_transaksi"]["tmp_name"], $target_file);

            // Tambahkan peminjaman ke database
            if ($this->model('db_pengembalian')->tambahPengembalian($id_pelanggan, $bukti_transaksi, $tanggal_pengembalian, $jam)) {
                echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>';
                echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>';
                echo '<script>
                        $(document).ready(function(){
                            Swal.fire({
                                icon: "success",
                                title: "Berhasil",
                                text: "Data berhasil ditambahkan!",
                                timer: 2000,
                                showConfirmButton: false
                            })
                        });
                        setTimeout(function() {
                            window.location.href = "' . BASEURL . '/pengembalian/pelanggan";
                        }, 2000);
                    </script>';
                exit();
            } else {
                // Jika gagal menambahkan peminjaman ke database, kembalikan dengan pesan error
                die("Gagal menambahkan pengembalian");
            }
        } else {
            // Jika bukan request POST, kembalikan ke halaman penyewaan
            header("Location: " . BASEURL . "/pengembalian/pelanggan");
            exit;
        }
    }
}