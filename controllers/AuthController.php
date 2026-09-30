<?php
class AuthController {
    private $model;
    public function __construct($db) {
        $this->model = new AuthModel($db);
    }

    public function index() {
        if (isset($_SESSION['admin'])) { header("Location: index.php?mod=parkir&act=dashboard"); }
        include 'views/login.php';
    }

    public function login() {
        if (isset($_POST['login'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            if ($this->model->cekLogin($username, $password)) {
                $_SESSION['admin'] = $username;
                header("Location: index.php?mod=parkir&act=dashboard");
            } else {
                echo "<script>alert('Login Gagal! Username/Password salah.'); window.location='index.php?mod=auth&act=index';</script>";
            }
        }
    }

    public function logout() {
        session_destroy();
        header("Location: index.php?mod=auth&act=index");
    }
}
?>