<?php 
include_once '../controllers/c_login.php';
$login = new c_login();
      
            if ($_GET['aksi'] == 'register') {
        
                $id_kasir = $_POST['id_kasir'];
                $nama_kasir = $_POST['nama_kasir'];
                $email = $_POST['email'];
                $pass = $_POST['pass'];
                $pass = password_hash($pass, PASSWORD_DEFAULT);// Memeriksa apakah $_POST['jk'] ada sebelum digunakan
                $role = $_POST['role'];

                // Memanggil method register
                $login->register($id_kasir = 0, $nama_kasir, $email, $pass, $role);

            } elseif ($_GET['aksi'] == 'login') {
                $email = $_POST['email'];
                $pass = $_POST['pass'];
                
                $login->login($email, $pass);
            } elseif ($_GET['aksi'] == 'logout') {
                $login->logout();
    }
        