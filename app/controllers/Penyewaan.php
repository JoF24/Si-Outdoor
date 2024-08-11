<?php
session_start();
class Penyewaan extends Controller {
    public function pelanggan()
    {
        $id = $_SESSION['id'];
        $data['judul'] = 'Penyewaan';
        $data['css'] = 'beranda';
        $data['penyewaan'] = $this->model('db_penyewaan')->getPenyewaan($id);
        $this->view('template/header',$data);
        $this->view('penyewaan/pelanggan', $data);
        $this->view('template/footer');
    }

    public function pemilik()
    {
        $data['judul'] = 'Penyewaan';
        $data['css'] = 'beranda';
        $data['penyewaan'] = $this->model('db_penyewaan')->getPenyewaanWithDetails();
        $this->view('template/header',$data);
        $this->view('penyewaan/admin', $data);
        $this->view('template/footer');
    }

    public function admin()
    {
        $data['judul'] = 'Penyewaan';
        $data['css'] = 'beranda';
        $data['penyewaan'] = $this->model('db_penyewaan')->getPenyewaanWithDetails();
        $this->view('template/header',$data);
        $this->view('penyewaan/admin', $data);
        $this->view('template/footer');
    }

    public function formulir(){
        $id = $_SESSION['id'];
        $data['judul'] = 'Form Penyewaan';
        $data['css'] = 'beranda';
        $data ['pelanggan'] = $this->model('pelanggan')->getDataAkun($id);
        $data ['total_harga'] = $this->model('detail_penyewaan')->getTotalHarga($id);
        $this->view('template/header',$data);
        $this->view('penyewaan/formulir', $data);
        $this->view('template/footer');
    }

    public function edit($id) {
        $data['judul'] = 'Edit Penyewaan';
        $data['css'] = 'beranda';
        $data['penyewaan'] = $this->model('db_penyewaan')->getPenyewaanById($id);
        $this->view('template/header', $data);
        $this->view('penyewaan/edit', $data);
        $this->view('template/footer');
    }

    public function checkout() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id_pelanggan = $_SESSION['id'];
            $foto_identitas = $_FILES['foto_identitas']['name'];
            $tanggal_penyewaan = $_POST['tanggal_penyewaan'];
            $catatan = $_POST['catatan'];

            // Upload bukti pembayaran
            $target_dir = "C:/xampp/htdocs/Si-Outdoor/public/gambar/";
            $target_file = $target_dir . basename($_FILES["foto_identitas"]["name"]);
            move_uploaded_file($_FILES["foto_identitas"]["tmp_name"], $target_file);

            // Tambahkan peminjaman ke database
            if ($this->model('db_penyewaan')->tambahPeminjaman($id_pelanggan, $foto_identitas, $tanggal_penyewaan, $catatan)) {
                // Kosongkan keranjang
                if ($this->model('detail_penyewaan')->kosongkanKeranjang($id_pelanggan)) {
                    // Jika berhasil, kembalikan ke halaman penyewaan dengan pesan sukses
                    echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>';
                    echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>';
                    echo '<script>
                            $(document).ready(function(){
                                Swal.fire({
                                    icon: "success",
                                    title: "Berhasil",
                                    text: "Data berhasil diperbarui!",
                                    timer: 2000,
                                    showConfirmButton: false
                                })
                            });
                            setTimeout(function() {
                                window.location.href = "' . BASEURL . '/penyewaan/pelanggan";
                            }, 2000);
                        </script>';
                    exit();
                } else {
                    // Jika gagal mengosongkan keranjang, kembalikan dengan pesan error
                    die("Gagal mengosongkan keranjang");
                }
            } else {
                // Jika gagal menambahkan peminjaman ke database, kembalikan dengan pesan error
                die("Gagal menambahkan peminjaman");
            }
        } else {
            // Jika bukan request POST, kembalikan ke halaman penyewaan
            header("Location: " . BASEURL . "/penyewaan/index");
            exit;
        }
    }

    public function update() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $status = $_POST['status'];
            $tanggal_penyewaan = $_POST['tanggal_penyewaan'];
            $tanggal_kembali = $_POST['tanggal_kembali'];
            $catatan = $_POST['catatan'];

            if (($this->model('db_penyewaan')->updatePenyewaan($id, $status, $tanggal_penyewaan, $tanggal_kembali, $catatan) > 0)) {
                echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>';
                echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>';
                echo '<script>
                        $(document).ready(function(){
                            Swal.fire({
                                icon: "success",
                                title: "Berhasil",
                                text: "Data berhasil diperbarui!",
                                timer: 2000,
                                showConfirmButton: false
                            })
                        });
                        setTimeout(function() {
                            window.location.href = "' . BASEURL . '/penyewaan/admin";
                        }, 2000);
                      </script>';
                exit();
            } else {
                // Jika gagal, tampilkan pesan error
                die("Gagal memperbarui data penyewaan");
            }
        } else {
            header("Location: " . BASEURL . "/penyewaan/index");
            exit;
        }
    }
}