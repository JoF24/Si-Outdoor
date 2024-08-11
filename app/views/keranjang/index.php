<?php
$produkKeranjang = [];
foreach ($data['keranjang'] as $item) {
    $id_detail_penyewaan = $item['id_detail_penyewaan'];
    $id_alat = $item['id_alat'];
    $produk = $this->model('alat_kemah')->getDataBarang($id_alat); // Mengambil data alat kemah berdasarkan id_alat
    $produk['jumlah'] = $item['jumlah'];
    $produk['durasi_sewa'] = $item['durasi_sewa'];
    $produk['id_detail_penyewaan'] = $id_detail_penyewaan;
    $produkKeranjang[] = $produk;
}
?>
<nav class="navbar navbar-expand-lg bg-white sticky-top" id="navbar" >
    <div class="container-fluid">
        <img src="<?= BASEURL;?>/gambar/LogoBlack.png" width="60px" height="50px" style="margin-left:50px">
        <p class="mt-3" style="margin-left:20px;font-family: 'Georgia', serif;font-size:20px;font-weight:200px">SI OUTDOOR</p>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto px-5 nav-underline">
                <li class="nav-item px-3">
                    <a class="nav-link navbar-font" href="<?= BASEURL;?>/beranda/login">Beranda</a>
                </li>
                <li class="nav-item px-3">
                    <a class="nav-link active navbar-font" aria-current="page" href="<?=BASEURL;?>/katalog/pelanggan">Katalog</a>
                </li>
                <li class="nav-item px-3">
                    <a class="nav-link navbar-font" href="<?=BASEURL;?>/about/index">About</a>
                </li>
                <li class="nav-item px-3">
                    <a class="nav-link navbar-font" href="<?=BASEURL;?>/penyewaan/pelanggan">Penyewaan</a>
                </li>
                <li class="nav-item px-3">
                    <a class="nav-link navbar-font" href="<?=BASEURL;?>/pengembalian/pelanggan">Pengembalian</a>
                </li>
            </ul>
        </div>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav ml-auto px-5 nav-underline">
                <li class="nav-item dropdown">
                    <div class="d-flex align-items-center" id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="<?=BASEURL;?>/gambar/Login2.png" alt="register" width="30px" height="30px" style="position:relative; margin-right:5px; cursor:pointer;">
                        <p class="mb-0"><?=$_SESSION['username']?></p>
                    </div>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="<?=BASEURL;?>/login/logout">Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container mt-5" style="height: 500px;">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Gambar</th>
                <th scope="col">Nama Produk</th>
                <th scope="col">Jumlah</th>
                <th scope="col">Durasi Sewa (hari)</th>
                <th scope="col">Harga Total</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($produkKeranjang as $produk) :
                $total_harga = $produk['harga_sewa_per_hari'] * $produk['jumlah'] * $produk['durasi_sewa'];
                ?>
                <tr>
                    <th scope="row"><?= $no++; ?></th>
                    <td><img src="<?= BASEURL; ?>/gambar/<?= htmlspecialchars($produk['gambar'], ENT_QUOTES, 'UTF-8'); ?>" alt="<?= htmlspecialchars($produk['nama_alat'], ENT_QUOTES, 'UTF-8'); ?>" width="100"></td>
                    <td><?= htmlspecialchars($produk['nama_alat'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td>
                        <input type="number" class="form-control jumlah" data-id="<?= $produk['id_alat']; ?>" value="<?= $produk['jumlah']; ?>" min="1">
                    </td>
                    <td>
                        <input type="number" class="form-control durasi_sewa" data-id="<?= $produk['id_alat']; ?>" value="<?= $produk['durasi_sewa']; ?>" min="1">
                    </td>
                    <td class="harga-total" data-harga="<?= $produk['harga_sewa_per_hari']; ?>">Rp <?= number_format($total_harga, 0, ',', '.'); ?></td>
                    <td>
                        <form class="hapus-item-form">
                            <input type="hidden" name="id_detail_penyewaan" value="<?= $produk['id_detail_penyewaan']; ?>">
                            <button type="button" class="btn btn-danger hapus-item">Hapus</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="text-right">
        <a href="<?=BASEURL;?>/penyewaan/formulir" type="button" class="btn btn-primary" role="button">Checkout</a>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    $(document).ready(function(){
        $('.jumlah, .durasi_sewa').change(function(){
            var row = $(this).closest('tr');
            var id_alat = $(this).data('id');
            var jumlah = row.find('.jumlah').val();
            var durasi_sewa = row.find('.durasi_sewa').val();
            var harga_sewa_per_hari = row.find('.harga-total').data('harga');
            var harga_total = harga_sewa_per_hari * jumlah * durasi_sewa;

            row.find('.harga-total').text('Rp ' + harga_total.toLocaleString('id-ID'));

            $.ajax({
                url: '<?= BASEURL; ?>/keranjang/update_keranjang',
                type: 'POST',
                data: { 
                    id_alat: id_alat,
                    jumlah: jumlah,
                    durasi_sewa: durasi_sewa
                },
                success: function(response){
                    Swal.fire({
                        icon: "success",
                        title: "Berhasil",
                        text: "Keranjang berhasil diperbarui!",
                        timer: 2000,
                        showConfirmButton: false
                    });
                },
                error: function(xhr, status, error){
                    Swal.fire({
                        icon: "error",
                        title: "Gagal",
                        text: "Terjadi kesalahan saat memperbarui keranjang.",
                    });
                }
            });
        });
        
        $('.hapus-item').click(function(){
            var idDetailPenyewaan = $(this).closest('.hapus-item-form').find('input[name="id_detail_penyewaan"]').val();
            var $this = $(this); // Simpan referensi this
            $.ajax({
                url: '<?= BASEURL; ?>/keranjang/hapus',
                type: 'POST',
                data: { id_detail_penyewaan: idDetailPenyewaan },
                success: function(response){
                    $this.closest('tr').remove();
                    Swal.fire({
                        icon: "success",
                        title: "Berhasil",
                        text: "Keranjang berhasil diperbarui!",
                        timer: 2000,
                        showConfirmButton: false
                    });
                },
                error: function(xhr, status, error){
                    Swal.fire({
                        icon: "error",
                        title: "Gagal",
                        text: "Terjadi kesalahan saat memperbarui keranjang.",
                    });
                }
            });
        });
    });
</script>
