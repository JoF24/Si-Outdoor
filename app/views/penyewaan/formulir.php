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
<div class="d-flex justify-content-center" style="height: 100px;">
    <div class="d-flex justify-content-center" style="width: 1000px;">
        <h1 style="font-family: 'Georgia', serif">Formulir Penyewaan Barang</h1>
    </div>
</div>
<div class="d-flex justify-content-center">
    <form action="<?= BASEURL; ?>/penyewaan/checkout" method="post" style="width: 700px;" enctype="multipart/form-data" >
        <!-- Informasi Pelanggan (Otomatis Terisi) -->
        <div class="form-group mt-3">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value="<?= $data['pelanggan']['nama']; ?>" readonly>
        </div>
        <div class="form-group mt-3">
            <label for="telepon">Nomor Telepon</label>
            <input type="text" class="form-control" id="telepon" name="telepon" value="<?= $data['pelanggan']['no_telepon']; ?>" readonly>
        </div>
        <div class="form-group mt-3">
            <label for="alamat">Alamat</label>
            <textarea class="form-control" id="alamat" name="alamat" readonly><?= $data['pelanggan']['alamat']; ?></textarea>
        </div>
    
        <!-- Informasi Keranjang (Harga Total) -->
        <div class="form-group mt-3">
            <label for="harga_total">Harga Total Keranjang</label>
            <input type="text" class="form-control" id="harga_total" name="harga_total" value="<?= $data['total_harga']; ?>" readonly>
        </div>
    
        <!-- Input Bukti Pembayaran -->
        <div class="form-group d-flex flex-column mt-3">
            <label for="foto_identitas">Foto Identitas</label>
            <input type="file" class="form-control-file" id="foto_identitas" name="foto_identitas" accept="image/*" required>
        </div>
    
        <!-- Input Tanggal Penyewaan -->
        <div class="form-group mt-3">
            <label for="tanggal_penyewaan">Tanggal Penyewaan</label>
            <input type="date" class="form-control" id="tanggal_penyewaan" name="tanggal_penyewaan" required>
        </div>
    
        <!-- Input Catatan -->
        <div class="form-group mt-3">
            <label for="catatan">Catatan</label>
            <textarea class="form-control" id="catatan" name="catatan"></textarea>
        </div>
        <!-- Tombol Submit -->
        <button type="submit" class="btn btn-primary mt-3 mb-5">Checkout</button>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

