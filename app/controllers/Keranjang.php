<?php
session_start();
class Keranjang extends Controller {
    public function index()
    {
        $id = $_SESSION['id'];
        $data['judul'] = 'Keranjang';
        $data['css'] = 'beranda';
        $data ['keranjang'] = $this->model('detail_penyewaan')->getDataKeranjang($id); 
        $this->view('template/header',$data);
        $this->view('keranjang/index', $data);
        $this->view('template/footer');
    }

    public function update_keranjang() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id_alat = $_POST['id_alat'];
            $jumlah = $_POST['jumlah'];
            $durasi_sewa = $_POST['durasi_sewa'];
            $id_pelanggan = $_SESSION['id']; // Pastikan Anda sudah menyimpan id_pelanggan di sesi
            
            $result = $this->model('detail_penyewaan')->updateKeranjang($id_pelanggan, $id_alat, $jumlah, $durasi_sewa);
            
            if ($result) {
                echo json_encode(['status' => 'success']);
            } else {
                echo json_encode(['status' => 'error']);
            }
        }
    }

    public function hapus() {
        $id_detail_penyewaan = $_POST['id_detail_penyewaan'];
        // Panggil model untuk menghapus item keranjang
        $result = $this->model('detail_penyewaan')->hapusItemKeranjang($id_detail_penyewaan);

        if ($result) {
            // Jika penghapusan berhasil, kirim respons JSON
            echo json_encode(['status' => 'success']);
        } else {
            // Jika terjadi kesalahan, kirim respons JSON dengan status error
            echo json_encode(['status' => 'error']);
        }
    }
}