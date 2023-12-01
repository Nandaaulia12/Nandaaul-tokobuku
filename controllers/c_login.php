<?php
session_start();
//memanggil file koneksi kedalam file c_login
include_once 'c_koneksi.php';

class c_login{
    public function register($id_kasir, $nama_kasir, $email, $pass, $role){

        $conn = new c_koneksi();
        $sql = "INSERT INTO kasir VALUES ($id_kasir,'$nama_kasir', '$email', '$pass', '$role')";
        $query = mysqli_query($conn->conn(), $sql);
        
        if ($query) {
            echo "data berhasil euy ditambahkan";
        } else {
            echo "data gagal ditambahkan";
        }
    }
    public function login($email =null , $pass=null){
        $conn = new C_koneksi();

        if (isset($_POST['login'])) {
            $sql = "SELECT * FROM kasir WHERE email = '$email'";
            
            $query = mysqli_query($conn->conn(), $sql);
            
            $data = mysqli_fetch_assoc($query); 
            
            if ($data) {
                    if (password_verify($pass, $data['pass'])) {

                    if ($data['role'] == 'admin') {
                        
                        $_SESSION["data"] = $data;
                        $_SESSION["role"] = $data['role'];

                        //untuk berpindah ke halaman home
                        header("Location: ../views/home.php");
                        exit;

                    }elseif($data['role'] == 'kasir'){
                        $_SESSION["data"] = $data;
                        $_SESSION["role"] = $data['role'];

                        header("Location: ../views/home_kasir.php");
                        exit;
                    }
                }else {
                    // header("Location: ../index.php");
                    echo "<script>alert('Login gagal !!! Silahkan cek email ');window.location='../index.php'</script>";
                }
            }else {
                // header("Location: ../index.php");
                echo "<script>alert('Login gagal !!! password salah');window.location='../index.php'</script>";
            }
        }
    }

    public function logout(){

        //menghentikan session
        session_destroy();

        header("Location: ../index.php");
        exit;
    }

    
}

?>