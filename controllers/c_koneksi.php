<?php

class C_koneksi{
    
    public function conn(){
        $conn = mysqli_connect('localhost','root','', 'db_tokobunga');

        if(!$conn){
           die("koneksi gagal :". mysqli_connect_error());
        }else{
            return $conn;
        }
    }
}

$conn = new C_koneksi();

$conn->conn();

?>