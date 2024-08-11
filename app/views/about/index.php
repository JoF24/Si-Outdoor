<nav class="navbar navbar-expand-lg bg-white sticky-top" id="navbar" >
    <div class="container-fluid">
        <img src="<?= BASEURL;?>/gambar/LogoBlack.png" width="60px" height="50px" style="margin-left:50px">
        <p class="mt-3" style="margin-left:20px;font-family: 'Georgia', serif;font-size:20px;font-weight:200px">SI OUTDOOR</p>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto px-5 nav-underline">
                <li class="nav-item px-3">
                    <?php if (! empty($_SESSION['jabatan'])) :?>
                        <a class="nav-link navbar-font"  href="<?= BASEURL;?>/beranda/login">Beranda</a>
                    <?php else : ?>
                        <a class="nav-link navbar-font"  href="<?= BASEURL;?>/beranda">Beranda</a>
                    <?php endif; ?>
                </li>
                <li class="nav-item px-3">
                    <?php if (! empty($_SESSION['jabatan'])): ?>
                        <?php if ($_SESSION['jabatan'] === 'Pelanggan'): ?>
                            <a class="nav-link navbar-font" href="<?= BASEURL;?>/katalog/pelanggan">Katalog</a>
                        <?php elseif($_SESSION['jabatan'] === 'Admin'): ?>
                            <a class="nav-link navbar-font" href="<?= BASEURL;?>/katalog/admin">Katalog</a>
                        <?php elseif ($_SESSION['jabatan'] === 'Pemilik') :?>
                            <a class="nav-link navbar-font" href="<?= BASEURL;?>/katalog/pemilik">Katalog</a>
                        <?php endif; ?>
                    <?php else : ?>
                        <a class="nav-link navbar-font" href="<?= BASEURL;?>/katalog/index">Katalog</a>
                    <?php endif;?>
                </li>
                <li class="nav-item px-3">
                    <a class="nav-link navbar-font active" aria-current="page" href="<?=BASEURL;?>/about/index">About</a>
                </li>
                <li class="nav-item px-3">
                    <?php if (! empty($_SESSION['jabatan'])): ?>
                        <?php if ($_SESSION['jabatan'] === 'Pelanggan'): ?>
                            <a class="nav-link navbar-font"  href="<?=BASEURL;?>/penyewaan/pelanggan">Penyewaan</a>
                        <?php elseif($_SESSION['jabatan'] === 'Admin'): ?>
                            <a class="nav-link navbar-font"  href="<?=BASEURL;?>/penyewaan/admin">Penyewaan</a>
                        <?php elseif ($_SESSION['jabatan'] === 'Pemilik') :?>
                            <a class="nav-link navbar-font"  href="<?=BASEURL;?>/penyewaan/pemilik">Penyewaan</a>
                        <?php endif; ?>
                    <?php endif;?>
                </li>
                <li class="nav-item px-3">
                    <?php if (! empty($_SESSION['jabatan'])): ?>
                        <?php if ($_SESSION['jabatan'] === 'Pelanggan'): ?>
                            <a class="nav-link navbar-font" href="<?=BASEURL;?>/pengembalian/pelanggan">Pengembalian</a>
                        <?php elseif($_SESSION['jabatan'] === 'Admin'): ?>
                            <a class="nav-link navbar-font" href="<?=BASEURL;?>/pengembalian/admin">Pengembalian</a>
                        <?php elseif ($_SESSION['jabatan'] === 'Pemilik') :?>
                            <a class="nav-link navbar-font" href="<?=BASEURL;?>/pengembalian/pemilik">Pengembalian</a>
                        <?php endif; ?>
                    <?php endif;?>
                </li>
            </ul>
        </div>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav ml-auto px-5 nav-underline">
                <?php if(! empty($_SESSION['jabatan'])): ?>
                    <li class="nav-item dropdown">
                        <div class="d-flex align-items-center" id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="<?=BASEURL;?>/gambar/Login2.png" alt="register" width="30px" height="30px" style="position:relative; margin-right:5px; cursor:pointer;">
                            <p class="mb-0"><?=$_SESSION['username']?></p>
                        </div>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="<?=BASEURL;?>/login/logout">Logout</a>
                        </div>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link d-flex" href="<?=BASEURL;?>/login" style="position:relative;">
                            <img src="<?=BASEURL;?>/gambar/Login.png" alt="register" width="30px" height="30px" style="position:relative; margin-right:5px;">
                            <p class="navbar-font mt-1" style="color:black;">Login</p>    
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
<div class="d-flex" style="height:780px">
    <div class="overlay-container d-flex justify-content-center">
        <img src="<?=BASEURL;?>/gambar/Gunung.jpg" alt="gambar_gunung">
        <div class="overlay">
            <div class="overlay-text" style="width:1000px;">
                <div class="d-flex">
                    <img src="<?=BASEURL;?>/gambar/Logo White.png" alt="logo_putih" style="width:auto;height:140px;margin-right:20px">
                    <div>
                        <h1 style="font-size: 70px;" class="mt-4">Kenapa Harus SI-Outdoor?</h1>
                    </div>
                </div>
                <p class="mt-5" style="font-size: 18px; line-height: 2.3;">
                    1. Pilihan Lengkap: Dari tenda, sleeping bag, matras, hingga peralatan memasak dan pencahayaan, kami memiliki semua yang Anda butuhkan untuk setiap jenis petualangan, baik itu berkemah di gunung, pantai, atau hutan.
                    <br>2. Kualitas Terjamin: Kami hanya menyediakan peralatan dari merek-merek terkemuka dan terjamin kualitasnya, sehingga Anda bisa berkemah dengan nyaman dan aman.
                    <br>3. Harga Terjangkau: Dengan berbagai pilihan paket sewa yang fleksibel, kami menawarkan harga yang kompetitif untuk semua kalangan, baik untuk pemula maupun profesional.
                    <br>4. Layanan Mudah dan Cepat: Proses penyewaan yang mudah dan cepat, dengan sistem pemesanan online yang user-friendly. Anda bisa memesan peralatan yang dibutuhkan kapan saja dan di mana saja.
                    <br>5. Dukungan Pelanggan 24/7: Tim layanan pelanggan kami siap membantu Anda dengan segala pertanyaan dan kebutuhan, memastikan Anda mendapatkan dukungan penuh sebelum, selama, dan setelah penyewaan.
                </p>
                <p class="mt-5" style="font-size: 20px; line-height: 2.3;font-style:italic;">Jadi, tunggu apa lagi? Telusuri SI-Outdoor dan persiapkan petualangan outdoor Anda dengan peralatan terbaik. <br>Bersama SI-Outdoor, setiap petualangan menjadi lebih mudah dan menyenangkan!</p>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>