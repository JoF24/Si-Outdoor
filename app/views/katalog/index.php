<nav class="navbar navbar-expand-lg bg-white sticky-top" id="navbar" >
    <div class="container-fluid">
        <img src="<?= BASEURL;?>/gambar/LogoBlack.png" width="60px" height="50px" style="margin-left:50px">
        <p class="mt-3" style="margin-left:20px;font-family: 'Georgia', serif;font-size:20px;font-weight:200px">SI OUTDOOR</p>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto px-5 nav-underline">
                <li class="nav-item px-3">
                    <a class="nav-link navbar-font" href="<?= BASEURL;?>/home">Beranda</a>
                </li>
                <li class="nav-item px-3">
                    <a class="nav-link active navbar-font" aria-current="page" href="<?=BASEURL;?>/katalog">Katalog</a>
                </li>
                <li class="nav-item px-3">
                    <a class="nav-link navbar-font" href="<?=BASEURL;?>/about">About</a>
                </li>
            </ul>
        </div>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav ml-auto px-5 nav-underline">
                <li class="nav-item">
                    <a class="nav-link d-flex" href="login" style="position:relative;">
                        <img src="<?=BASEURL;?>/gambar/Login.png" alt="login" width="30px" height="30px" style="position :relative;margin-right:5px">
                        <p class="navbar-font mt-1" style="color:black;">Login</p>    
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- <div class="d-flex justify-content-end" style="height:100px;margin-right:100px;">
    <a href="">
        <img src="<?=BASEURL;?>/gambar/Keranjang.png" alt="keranjang" width="40px" height="40px">
    </a>
</div> -->
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
                        <img src="<?= BASEURL; ?>/gambar/<?= $dt['gambar']; ?>" style="width: 255px;height:180px">
                        <p class="tulisan mt-3" style="margin-left: 15px;font-weight: 600;font-size: 17px;"><?= $dt['nama_alat']; ?></p>
                        <p class="tulisan" style="margin-left: 15px;font-size: 15px;">Rp<?= number_format($dt['harga_sewa_per_hari'], 0, ',', '.'); ?></p>
                    </div>
                </div>
            <?php endforeach;
        }?>
    </div>
</div>
<div class="d-flex">
    <p class="tulisan" style="font-style:italic; margin-left:100px">*silahkan registrasi di menu login untuk melakukan peminjaman</p>
</div>