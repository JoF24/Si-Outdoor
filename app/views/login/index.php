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
                    <a class="nav-link navbar-font" href="<?=BASEURL;?>/katalog">Katalog</a>
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
                        <img src="<?=BASEURL;?>/gambar/Login.png" alt="register" width="30px" height="30px" style="position :relative;margin-right:5px">
                        <p class="navbar-font mt-1" style="color:black;">Login</p>    
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="d-flex justify-content-center align-items-center" style="height: 500px;">
    <div class="card" style="width: 500px;">
        <div class="card-body text-center">
            <img src="<?=BASEURL;?>/gambar/Login2.png" alt="gambar_login" width="100" height="100" class="mt-3">
            <h1 class="mt-3" style="font-family: 'Times New Roman', Times, serif;">Login</h1>
            <form action="<?=BASEURL;?>/login/authenticate" method="post" class="mt-3" style="font-family: 'Times New Roman', Times, serif;">
                <div class="form-group">
                    <label for="username" style="font-size: 20px;">Username</label>
                    <input type="text" id="username" name="username" class="form-control" required>
                </div>
                <div class="form-group mt-3">
                    <label for="password" style="font-size: 20px;">Password</label>
                    <input type="password" id="password" name="password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary mt-4">Login</button>
            </form>
        </div>
    </div>
</div>
<div class="d-flex justify-content-center" style="height: 150px;">
    <a href="<?=BASEURL;?>/registrasi/index">Belum Punya Akun? Klik Disini</a>
</div>
