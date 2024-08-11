<?php
session_start();
class Katalog extends Controller {
    public function index()
    {
        $data['judul'] = 'Katalog Produk';
        $data['css'] = 'beranda';
        $data['produk'] = $this->model('alat_kemah')->getDataKatalog();
        $this->view('template/header',$data);
        $this->view('katalog/index', $data);
        $this->view('template/footer');
    }

    public function pemilik()
    {
        $data['judul'] = 'Katalog Produk';
        $data['css'] = 'beranda';
        $data['produk'] = $this->model('alat_kemah')->getDataKatalog();
        $this->view('template/header',$data);
        $this->view('katalog/admin', $data);
        $this->view('template/footer');
    }

    public function admin()
    {
        $data['judul'] = 'Katalog Produk';
        $data['css'] = 'beranda';
        $data['produk'] = $this->model('alat_kemah')->getDataKatalog();
        $this->view('template/header',$data);
        $this->view('katalog/admin', $data);
        $this->view('template/footer');
    }

    public function pelanggan()
    {
        $data['judul'] = 'Katalog Produk';
        $data['css'] = 'beranda';
        $data['produk'] = $this->model('alat_kemah')->getDataKatalog();
        $this->view('template/header',$data);
        $this->view('katalog/pelanggan', $data);
        $this->view('template/footer');
    }


    public function tambah_data()
    {
        $data['judul'] = 'Tambah Katalog Produk';
        $data['css'] = 'beranda';
        $this->view('template/header',$data);
        $this->view('katalog/tambah_data');
        $this->view('template/footer');
    }

    public function insert_data()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nama = $_POST['nama'];
            $deskripsi = $_POST['deskripsi'];
            $stok = $_POST['stok'];
            $harga = $_POST['harga'];

            if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] == 0) {
                $target_dir = "C:/xampp/htdocs/Si-Outdoor/public/gambar/";
                $target_file = $target_dir . basename($_FILES["gambar"]["name"]);
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                // Validate image file type and size
                $check = getimagesize($_FILES["gambar"]["tmp_name"]);
                if ($check !== false && in_array($imageFileType, ['jpg', 'png', 'jpeg', 'gif']) && $_FILES["gambar"]["size"] <= 2 * 1024 * 1024) {
                    if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
                        $gambar = basename($_FILES["gambar"]["name"]);
                        $tambah = $this->model("alat_kemah")->insert_data($nama, $deskripsi, $stok, $harga, $gambar);
                        if ($tambah > 0){
                            echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>';
                            echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>';
                            echo '<script>
                                    $(document).ready(function(){
                                        Swal.fire({
                                            icon: "success",
                                            title: "Berhasil",
                                            text: "Data berhasil Disimpan!",
                                            timer: 2000,
                                            showConfirmButton: false
                                        })
                                    });
                                    setTimeout(function() {
                                        window.location.href = "' . BASEURL . '/katalog/admin";
                                    }, 2000);
                                  </script>';
                            exit();
                        }
                    } else {
                        echo "Maaf, terjadi kesalahan saat mengupload gambar.";
                    }
                } else {
                    echo "File bukan gambar yang valid atau ukuran gambar terlalu besar.";
                }
            } else {
                echo "Gambar harus diunggah.";
            }
        } else {
            header("Location:".BASEURL."/katalog/admin");
        }
    }
    
    public function edit_katalog($id){
        $data['judul'] = 'Tambah Katalog Produk';
        $data['css'] = 'beranda';
        $data ['barang'] = $this->model('alat_kemah')->getDataBarang($id);
        $this->view('template/header',$data);
        $this->view('katalog/edit_katalog', $data);
        $this->view('template/footer');
    }

    public function update_data(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $nama = $_POST['nama'];
            $deskripsi = $_POST['deskripsi'];
            $stok = $_POST['stok'];
            $harga = $_POST['harga'];
            $gambar_lama = isset($_POST['gambar_lama']) ? $_POST['gambar_lama'] : '';
    
            // Inisialisasi variabel gambar dengan nilai gambar lama
            $gambar = $gambar_lama;
    
            if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] == 0) {
                $target_dir = "C:/xampp/htdocs/Si-Outdoor/public/gambar/";
                $target_file = $target_dir . basename($_FILES["gambar"]["name"]);
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
                // Validasi tipe dan ukuran file gambar
                $check = getimagesize($_FILES["gambar"]["tmp_name"]);
                if ($check !== false && in_array($imageFileType, ['jpg', 'png', 'jpeg', 'gif']) && $_FILES["gambar"]["size"] <= 2 * 1024 * 1024) {
                    if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
                        // Jika upload berhasil, simpan nama file gambar baru
                        $gambar = basename($_FILES["gambar"]["name"]);
                        // Hapus gambar lama jika ada
                        if (!empty($gambar_lama)) {
                            @unlink($target_dir . $gambar_lama);
                        }
                    } else {
                        echo "Maaf, terjadi kesalahan saat mengupload gambar.";
                        return;
                    }
                } else {
                    echo "File bukan gambar yang valid atau ukuran gambar terlalu besar.";
                    return;
                }
            }
    
            // Lakukan update data ke database
            $tambah = $this->model("alat_kemah")->update_data($nama, $deskripsi, $stok, $harga, $gambar, $id);
            
            if ($tambah > 0) {
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
                            window.location.href = "' . BASEURL . '/katalog/admin";
                        }, 2000);
                      </script>';
                exit();
            } else {
                echo "Gagal mengupdate data.";
            }
        } else {
            header("Location:".BASEURL."/katalog/admin");
        }
    }    

    public function tambah_keranjang() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id_alat = $_POST['id_alat'];
            $id_pelanggan = $_POST['id_pelanggan'];
    
            // Logika untuk menambahkan barang ke keranjang
            $hasil = $this->model('detail_penyewaan')->tambah_ke_keranjang($id_alat, $id_pelanggan);
    
            if ($hasil > 0) {
                // Jika berhasil
                echo json_encode(['status' => 'success', 'message' => 'Barang berhasil ditambahkan ke keranjang']);
            } else {
                // Jika gagal
                echo json_encode(['status' => 'error', 'message' => 'Gagal menambahkan barang ke keranjang']);
            }
        }
    }    
    
}