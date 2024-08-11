<?php

session_start();
class Login extends Controller {
    public function index() {
        $data['judul'] = 'Login';
        $data['css'] = 'beranda';
        $this->view('template/header', $data);
        $this->view('login/index');
        $this->view('template/footer');
    }

    public function authenticate() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $user = $this->model("operasional")->login($username, $password);
            if(empty($user)){
                $user = $this->model("pelanggan")->login($username, $password);
                if(empty($user)){
                    $user = $this->model("pemilik")->login($username, $password);
                    $_SESSION['id'] = $user['id_pemilik'];
                    $_SESSION['username'] = $username;
                    $_SESSION['jabatan'] = 'Admin';
                    echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>';
                    echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>';
                    echo '<script>
                            $(document).ready(function(){
                                Swal.fire({
                                    icon: "success",
                                    title: "Berhasil",
                                    text: "Berhasil Login!",
                                    timer: 2000,
                                    showConfirmButton: false
                                })
                            });
                            setTimeout(function() {
                                window.location.href = "' . BASEURL . '/beranda/login";
                            }, 2000);
                          </script>';
                    exit();
                }else{
                $_SESSION['id'] = $user['id_pelanggan'];
                $_SESSION['username'] = $username;
                $_SESSION['jabatan'] = 'Pelanggan';
                echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>';
                echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>';
                echo '<script>
                        $(document).ready(function(){
                            Swal.fire({
                                icon: "success",
                                title: "Berhasil",
                                text: "Berhasil Login!",
                                timer: 2000,
                                showConfirmButton: false
                            })
                        });
                        setTimeout(function() {
                            window.location.href = "' . BASEURL . '/beranda/login";
                        }, 2000);
                      </script>';
                exit();
                }
            }
            if ($user) {
                $_SESSION['id'] = $user['id_operasional'];
                $_SESSION['username'] = $username;
                $_SESSION['jabatan'] = 'Admin';
                echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>';
                echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>';
                echo '<script>
                        $(document).ready(function(){
                            Swal.fire({
                                icon: "success",
                                title: "Berhasil",
                                text: "Berhasil Login!",
                                timer: 2000,
                                showConfirmButton: false
                            })
                        });
                        setTimeout(function() {
                            window.location.href = "' . BASEURL . '/beranda/login";
                        }, 2000);
                      </script>';
                exit();
            } else {
                echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>';
                echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>';
                echo '<script>
                        $(document).ready(function(){
                            Swal.fire({
                                icon: "error",
                                title: "oops...",
                                text: "Username atau Password Salah",
                            }).then(function() {
                                window.location.href = "'.BASEURL.'/login/index";
                            });
                        });
                      </script>';
            exit();
            }
        }
    }

    public function logout() {
        session_destroy();
        header("Location: " . BASEURL . "/beranda/index");
        exit();
    }
}
