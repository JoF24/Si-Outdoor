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
<div class="d-flex justify-content-end" style="height:40px;margin-right:100px;">
    <a href="<?=BASEURL;?>/keranjang/index" id="keranjang">
        <img src="<?=BASEURL;?>/gambar/Keranjang.png" alt="keranjang" width="40px" height="40px">
    </a>
</div>
<div class="d-flex justify-content-center" style="height: 100px;">
    <div class="d-flex" style="width: 1000px;">
        <h1 style="font-family: 'Georgia', serif">Daftar Katalog Produk</h1>
    </div>
</div>
<div class="d-flex mb-5" style="margin-left: 100px;">
    <div class="row w-100">
        <?php 
        if($data['produk']!= null){
            foreach($data['produk'] as $dt): ?>
                <div class="col-3 mt-3">
                    <div class="card" style="height: 320px; width: 260px;">
                        <img src="<?= BASEURL; ?>/gambar/<?= htmlspecialchars($dt['gambar'], ENT_QUOTES, 'UTF-8'); ?>" style="width: 255px; height: 180px; object-fit: cover;">
                        <p class="tulisan mt-3" style="margin-left: 15px;font-weight: 600;font-size: 17px;"><?= $dt['nama_alat']; ?></p>
                        <p class="tulisan" style="margin-left: 15px;font-size: 15px;">Rp<?= number_format($dt['harga_sewa_per_hari'], 0, ',', '.'); ?></p>
                        <div class="card align-items-center add-to-cart" data-id="<?= $dt['id_alat']; ?>" style="width: 100px; height:30px;margin-left:17px;background-color:blue; cursor:pointer;">
                            <p style="color:white">Add to Cart</p>
                        </div>
                    </div>
                </div>
            <?php endforeach;
        }?>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    $(document).ready(function(){
        $('.add-to-cart').click(function(){
            var id_alat = $(this).data('id');
            var id_pelanggan = '<?= $_SESSION['id']; ?>';
            
            $.ajax({
                url: '<?=BASEURL;?>/katalog/tambah_keranjang',
                type: 'POST',
                data: { 
                    id_alat: id_alat,
                    id_pelanggan: id_pelanggan
                },
                success: function(response){
                    Swal.fire({
                        icon: "success",
                        title: "Berhasil",
                        text: "Barang berhasil ditambahkan ke keranjang!",
                        timer: 2000,
                        showConfirmButton: false
                    });
                },
                error: function(xhr, status, error){
                    Swal.fire({
                        icon: "error",
                        title: "Gagal",
                        text: "Terjadi kesalahan saat menambahkan barang ke keranjang.",
                    });
                }
            });
        });
    });
</script>
