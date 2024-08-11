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
    <form id="dataForm" action="<?=BASEURL?>/katalog/insert_data" method="POST" enctype="multipart/form-data">
        <div class="form-group mt-3">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
        </div>
        <div class="form-group mt-3">
            <label for="deskripsi">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required></textarea>
        </div>
        <div class="form-group mt-3">
            <label for="stok">Stok</label>
            <input type="number" class="form-control" id="stok" name="stok" required min="0">
        </div>
        <div class="form-group mt-3">
            <label for="harga">Harga</label>
            <input type="number" class="form-control" id="harga" name="harga" required min="0">
        </div>
        <div class="form-group mt-3">
            <label for="gambar">Gambar</label>
            <input type="file" class="form-control-file" id="gambar" name="gambar" required accept="image/*">
        </div>
        <button type="submit" class="btn btn-primary mt-5">Submit</button>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>