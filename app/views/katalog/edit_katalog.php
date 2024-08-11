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
                    <a class="nav-link active navbar-font" aria-current="page" href="<?=BASEURL;?>/katalog/admin">Katalog</a>
                </li>
                <li class="nav-item px-3">
                    <a class="nav-link navbar-font" href="<?=BASEURL;?>/about">About</a>
                </li>
                <li class="nav-item px-3">
                    <a class="nav-link navbar-font" href="<?=BASEURL;?>/Peminjaman/admin">Peminjaman</a>
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
<div class="container mt-5 mb-5">
    <h2>Tambah Data</h2>
    <form id="dataForm" action="<?=BASEURL?>/katalog/update_data" method="POST" enctype="multipart/form-data">
        <input type="text" id="id" name="id" value="<?= $data['barang']['id_alat']?>" hidden>
        <div class="form-group mt-3">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value="<?= $data['barang']['nama_alat']; ?>" required>
        </div>
        <div class="form-group mt-3">
            <label for="deskripsi">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required><?= $data['barang']['deskripsi']?></textarea>
        </div>
        <div class="form-group mt-3">
            <label for="stok">Stok</label>
            <input type="number" class="form-control" id="stok" name="stok" value="<?= $data['barang']['stok']?>" required min="0">
        </div>
        <div class="form-group mt-3">
            <label for="harga">Harga</label>
            <input type="number" class="form-control" id="harga" name="harga" value="<?= $data['barang']['harga_sewa_per_hari']?>" required min="0">
        </div>
        <div class="form-group mt-3 d-flex flex-column">
            <label for="gambar">Gambar</label>
            <input type="file" class="form-control-file" id="gambar" name="gambar" accept="image/*">
            <?php if (!empty($data['barang']['gambar'])): ?>
                <img src="<?= BASEURL . '/gambar/' . $data['barang']['gambar'] ?>" alt="Gambar Produk" class="img-fluid mt-3" width="100px" height="100px">
                <input type="hidden" id="gambar_lama" name="gambar_lama" value="<?= $data['barang']['gambar'] ?>">
            <?php endif; ?>
        </div>
        <button type="submit" class="btn btn-primary mt-5">Simpan</button>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<script>
    document.getElementById('dataForm').addEventListener('submit', function(event) {
        var gambarInput = document.getElementById('gambar');
        var gambarLamaInput = document.getElementById('gambar_lama');

        if (gambarInput.files.length === 0 && gambarLamaInput) {
            // Jika tidak ada gambar baru yang diunggah, tambahkan nama file lama ke input file
            gambarInput.name = "gambar";  // Ganti nama input file agar tetap dikirim
            gambarInput.value = gambarLamaInput.value;  // Set value input file menjadi gambar lama
        }
    });
</script>