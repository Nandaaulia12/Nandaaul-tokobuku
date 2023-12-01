<?php
include_once 'c_koneksi.php';
class c_bunga{
    function tampil(){
        $conn = new c_koneksi();
        $sql = "SELECT * FROM bunga ORDER BY id_bunga DESC";
        $query = mysqli_query($conn->conn(), $sql); 
        while ($q = mysqli_fetch_object($query)) {
            $hasil[] = $q;
        }
        
        if (!empty($hasil)) {
            return $hasil;
        }
    }

    function tambah($nama_bunga, $jenis_bunga, $harga, $photo){

        $conn = new c_koneksi();

        $sql = "INSERT INTO bunga VALUES (null,'$nama_bunga', '$jenis_bunga', '$harga', '$photo')";
        // var_dump($sql);
        $query = mysqli_query($conn->conn(), $sql);

        if ($query) {

            // echo "data tidak gagal ditambahkan";
            echo "<script>alert('Data Berhasil Ditambahkan');window.location='../views/bunga.php'</script>";
        } else {
            echo "data gagal ditambahkan";
        }
    }

    function edit($id_bunga){
        $conn = new c_koneksi();
        
        $sql = "SELECT * FROM bunga WHERE id_bunga = '$id_bunga' ";
        // var_dump($sql);
        $query = mysqli_query($conn->conn(), $sql);
    
        // Periksa apakah ada hasil dari query
        if ($query && mysqli_num_rows($query) > 0) {
            $hasil = array(); // Inisialisasi variabel hasil
            while ($q = mysqli_fetch_object($query)) {
                $hasil[] = $q;
            }
            return $hasil; // Kembalikan hasil jika ada
        } else {
            return null; // Kembalikan null jika tidak ada hasil
        }
    }
    

    function update($id_bunga, $nama_bunga, $jenis_bunga, $harga, $photo){
        $conn = new c_koneksi();
        $sql = "UPDATE bunga SET nama_bunga='$nama_bunga', jenis_bunga='$jenis_bunga',  harga='$harga' WHERE id_bunga='$id_bunga'";
        // var_dump($sql);
        $query = mysqli_query($conn->conn(), $sql);
        
        if ($query) {
            echo "<script>alert('Data Berhasil Diubah');window.location='../views/bunga.php'</script>";
         }
         else{
            echo "data gagal Diubah diubah";
         }
    }

    function delete($id_bunga){
        $conn = new c_koneksi();
        $query = "DELETE FROM bunga WHERE id_bunga = $id_bunga";

        mysqli_query($conn->conn(), $query);

        header("location:../views/bunga.php");
    }
}
