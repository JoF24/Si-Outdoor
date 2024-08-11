<nav class="navbar navbar-expand-lg bg-white sticky-top" id="navbar" >
    <div class="container-fluid">
        <img src="<?= BASEURL;?>/gambar/LogoBlack.png" width="60px" height="50px" style="margin-left:50px">
        <p class="mt-3" style="margin-left:20px;font-family: 'Georgia', serif;font-size:20px;font-weight:200px">SI OUTDOOR</p>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto px-5 nav-underline">
                <li class="nav-item px-3">
                <a class="nav-link active navbar-font" aria-current="page" href="<?= BASEURL;?>/beranda/login">Beranda</a>
                </li>
                <li class="nav-item px-3">
                    <?php if ($_SESSION['jabatan'] === 'Pelanggan'): ?>
                        <a class="nav-link navbar-font" href="<?= BASEURL;?>/katalog/pelanggan">Katalog</a>
                    <?php elseif($_SESSION['jabatan'] === 'Admin'): ?>
                        <a class="nav-link navbar-font" href="<?= BASEURL;?>/katalog/admin">Katalog</a>
                    <?php elseif ($_SESSION['jabatan'] === 'Pemilik') :?>
                        <a class="nav-link navbar-font" href="<?= BASEURL;?>/katalog/pemilik">Katalog</a>
                    <?php endif; ?>
                </li>
                <li class="nav-item px-3">
                    <a class="nav-link navbar-font" href="<?=BASEURL;?>/about/index">About</a>
                    </li>
                <li class="nav-item px-3">
                    <?php if ($_SESSION['jabatan'] === 'Pelanggan'): ?>
                        <a class="nav-link navbar-font" href="<?=BASEURL;?>/penyewaan/pelanggan">Penyewaan</a>
                    <?php elseif($_SESSION['jabatan'] === 'Admin'): ?>
                        <a class="nav-link navbar-font" href="<?=BASEURL;?>/penyewaan/admin">Penyewaan</a>
                    <?php elseif ($_SESSION['jabatan'] === 'Pemilik') :?>
                        <a class="nav-link navbar-font" href="<?=BASEURL;?>/penyewaan/pemilik">Penyewaan</a>
                    <?php endif; ?>
                </li>
                <li class="nav-item px-3">
                    <?php if ($_SESSION['jabatan'] === 'Pelanggan'): ?>
                        <a class="nav-link navbar-font" href="<?=BASEURL;?>/pengembalian/pelanggan">Pengembalian</a>
                    <?php elseif($_SESSION['jabatan'] === 'Admin'): ?>
                        <a class="nav-link navbar-font" href="<?=BASEURL;?>/pengembalian/admin">Pengembalian</a>
                    <?php elseif ($_SESSION['jabatan'] === 'Pemilik') :?>
                        <a class="nav-link navbar-font" href="<?=BASEURL;?>/pengembalian/pemilik">Pengembalian</a>
                    <?php endif; ?>
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
<div class="d-flex" style="height:570px">
    <div class="overlay-container d-flex justify-content-center">
        <img src="<?=BASEURL;?>/gambar/Gunung.jpg" alt="gambar_gunung">
        <div class="overlay d-flex justify-content-center align-items-center">
            <div class="overlay-text" style="width:1000px;height:400px">
                <div class="d-flex">
                    <img src="<?=BASEURL;?>/gambar/Logo White.png" alt="logo_putih" style="width:auto;height:140px;margin-right:20px">
                    <div>
                        <h1 style="font-size: 70px;">Si - Outdoor</h1>
                        <p style="font-size:25px">Solusi Lengkap Penyewaan Alat Camping Anda</p>
                    </div>
                </div>
                <p class="mt-5" style="font-size: 20px; line-height: 2.3;">Selamat datang di SI-Outdoor, platform terpercaya untuk semua kebutuhan penyewaan alat camping Anda! 
                    <br>Kami memahami bahwa petualangan di alam bebas memerlukan persiapan yang matang dan peralatan yang tepat. 
                    <br>Di SI-Outdoor, kami menyediakan berbagai macam peralatan camping berkualitas tinggi untuk memastikan pengalaman outdoor Anda menjadi menyenangkan dan bebas dari masalah
                </p>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>