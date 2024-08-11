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
                    <a class="nav-link navbar-font" href="<?=BASEURL;?>/katalog/pelanggan">Katalog</a>
                </li>
                <li class="nav-item px-3">
                    <a class="nav-link navbar-font" href="<?=BASEURL;?>/about/index">About</a>
                </li>
                <li class="nav-item px-3">
                    <a class="nav-link active navbar-font" aria-current="page" href="<?=BASEURL;?>/penyewaan/pelanggan">Penyewaan</a>
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
    <h2>Daftar Penyewaan</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Penyewa</th>
                <th>Nama Penanggung Jawab</th>
                <th>Foto Identitas</th>
                <th>Status</th>
                <th>Tanggal Penyewaan</th>
                <th>Tanggal Kembali</th>
                <th>Catatan</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($data['penyewaan'] as $penyewaan) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= htmlspecialchars($penyewaan['nama_penyewa'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?= htmlspecialchars($penyewaan['nama_penanggung_jawab'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td>
                        <img src="<?= BASEURL; ?>/gambar/<?= htmlspecialchars($penyewaan['foto_identitas'], ENT_QUOTES, 'UTF-8'); ?>" alt="Foto Identitas" style="max-width: 50%; height: auto;">
                    </td>
                    <td><?= htmlspecialchars($penyewaan['status'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?= htmlspecialchars($penyewaan['tanggal_penyewaan'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?= htmlspecialchars($penyewaan['tanggal_pengembalian'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?= htmlspecialchars($penyewaan['catatan'], ENT_QUOTES, 'UTF-8'); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>