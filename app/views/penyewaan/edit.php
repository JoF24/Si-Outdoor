<?php
// Format tanggal untuk input date
$tanggal_penyewaan = date('Y-m-d', strtotime($data['penyewaan']['tanggal_penyewaan']));
if(!empty($tanggal_kembali)){
    $tanggal_kembali = date('Y-m-d', strtotime($data['penyewaan']['tanggal_kembali']));
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
<div class="container mt-5">
    <h2>Edit Penyewaan</h2>
    <form action="<?= BASEURL; ?>/penyewaan/update" method="post">
        <input type="hidden" name="id" value="<?= $data['penyewaan']['id_penyewaan']; ?>">
        <div class="form-group mt-3">
            <label for="nama_penyewa">Nama Penyewa</label>
            <input type="text" class="form-control" id="nama_penyewa" name="nama_penyewa" value="<?= $data['penyewaan']['nama_penyewa']; ?>" readonly>
        </div>

        <div class="form-group mt-3">
            <label for="nama_penanggung_jawab">Nama Penanggung Jawab</label>
            <input type="text" class="form-control" id="nama_penanggung_jawab" name="nama_penanggung_jawab" value="<?= $data['penyewaan']['nama_penanggung_jawab']; ?>" readonly>
        </div>

        <div class="form-group mt-3">
            <label for="status">Status</label>
            <input type="text" class="form-control" id="status" name="status" value="<?= $data['penyewaan']['status']; ?>" required>
        </div>

        <div class="form-group mt-3">
            <label for="tanggal_penyewaan">Tanggal Penyewaan</label>
            <input type="date" class="form-control" id="tanggal_penyewaan" name="tanggal_penyewaan" value="<?= $tanggal_penyewaan; ?>" required>
        </div>

        <div class="form-group mt-3">
            <label for="tanggal_kembali">Tanggal Kembali</label>
            <input type="date" class="form-control" id="tanggal_kembali" name="tanggal_kembali" value="<?= $tanggal_kembali; ?>">
        </div>

        <div class="form-group mt-3">
            <label for="catatan">Catatan</label>
            <textarea class="form-control" id="catatan" name="catatan"><?= $data['penyewaan']['catatan']; ?></textarea>
        </div>

        <button type="submit" class="btn btn-primary mt-3 mb-3">Simpan</button>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
