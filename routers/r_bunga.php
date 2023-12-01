<?php
include_once '../controllers/c_bunga.php';

$bunga = new c_bunga();

if ($_GET['aksi'] == 'tambah') {

    $nama_bunga = $_POST['nama_bunga'];
    $jenis_bunga = $_POST['jenis_bunga'];
    $harga = $_POST['harga'];

    $ekstensi_diperbolehkan = array('png', 'jpg' , 'jpeg');

    // berguna untuk mendapatkan nama file yang di upload
    $nama_photo = $_FILES['photo']['name'];

    // Fungsi explode() digunakan untuk memisahkan string menjadi array berdasarkan karakter yang ditentukan. Di sini, string yang dipisahkan adalah $nama_photo, yang kemungkinan berisi nama file gambar dengan ekstensi. 
    $x = explode('.', $nama_photo);

    // Setelah string dipisahkan dengan explode(), kita menggunakan fungsi end() untuk mendapatkan elemen terakhir dari array yang dihasilkan (yaitu, ekstensi file). Kemudian, fungsi strtolower() digunakan untuk mengonversi ekstensi ke huruf kecil, untuk menghindari masalah sensitivitas huruf besar/kecil dalam pemrosesan lebih lanjut.
    $ekstensi = strtolower(end($x));

    //mendapatkan ukuran file yang di upload
    $ukuran    = $_FILES['photo']['size'];

    // untuk mendapatkan temporary file yang di upload 
    $file_tmp = $_FILES['photo']['tmp_name'];

    // Ini adalah awal dari kondisi. Kode ini memeriksa apakah ekstensi file yang diunggah ada dalam array $ekstensi_diperbolehkan. in_array() adalah fungsi PHP yang digunakan untuk memeriksa apakah elemen tertentu ada dalam array atau tidak. Jika ekstensi file yang diunggah ditemukan dalam array $ekstensi_diperbolehkan, maka kondisi ini akan bernilai true.
    if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {

        if ($ukuran < 1044070) {

            // Ini adalah langkah di mana file gambar yang diungg`ah sebenarnya dipindahkan dari lokasi sementara (temporary) ke lokasi yang diinginkan pada server. Fungsi move_uploaded_file() digunakan untuk ini. Parameter pertama adalah path sementara file yang diunggah, dan parameter kedua adalah path tujuan di mana file akan disimpan setelah diunggah.
            // $file_tmp: Ini adalah path file sementara yang digunakan oleh PHP untuk menyimpan file yang diunggah sementara sebelum Anda memutuskan apa yang harus dilakukan dengan file tersebut.

            move_uploaded_file($file_tmp, '../assets/img/' . $nama_photo);

            $query = $bunga->tambah($nama_bunga, $jenis_bunga, $harga, $nama_photo);

            // if ($query) {
            //     echo 'FILE BERHASIL DI UPLOAD';
            // } else {
            //     echo 'GAGAL MENGUPLOAD GAMBAR';
            // }

        } else {
            echo 'UKURAN FILE TERLALU BESAR';
        }
    } else {
        echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
    }
} elseif ($_GET['aksi'] == 'update') {
    $id_bunga = $_POST['id_bunga'];
    $nama_bunga = $_POST['nama_bunga'];
    $jenis_bunga = $_POST['jenis_bunga'];
    $harga = $_POST['harga'];
    // $photo_update = $_POST['photo_update'];

    // Unggah gambar
    // ekstensi yang diperbolehkan saat upload photo 
    $ekstensi_diperbolehkan = array('png', 'jpg', 'jpeg');

    // berguna untuk mendapatkan nama file yang di upload
    $nama_photo = $_FILES['photo']['name'];

    // Fungsi explode() digunakan untuk memisahkan string menjadi array berdasarkan karakter yang ditentukan. Di sini, string yang dipisahkan adalah $nama_photo, yang kemungkinan berisi nama file gambar dengan ekstensi. 
    $x = explode('.', $nama_photo);

    // Setelah string dipisahkan dengan explode(), kita menggunakan fungsi end() untuk mendapatkan elemen terakhir dari array yang dihasilkan (yaitu, ekstensi file). Kemudian, fungsi strtolower() digunakan untuk mengonversi ekstensi ke huruf kecil, untuk menghindari masalah sensitivitas huruf besar/kecil dalam pemrosesan lebih lanjut.
    $ekstensi = strtolower(end($x));

    //mendapatkan ukuran file yang di upload
    $ukuran    = $_FILES['photo']['size'];

    // untuk mendapatkan temporary file yang di upload 
    $file_tmp = $_FILES['photo']['tmp_name'];

    // if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {

    // if ($photo_update != 'NULL') {


    if ($ukuran < 1044070) {

        move_uploaded_file($file_tmp, '../assets/img/' . $nama_photo);

        $query = $bunga->update($id_bunga, $nama_bunga, $jenis_bunga, $harga, $nama_photo);

        // if ($query) {
        //     echo 'FILE BERHASIL DI UPLOAD';
        // } else {
        //     echo 'GAGAL MENGUPLOAD GAMBAR';
        // }

    } else {
        echo 'UKURAN FILE TERLALU BESAR';
    }

} elseif ($_GET['aksi'] == 'hapus') {

    $id_bunga = $_GET['id_bunga'];

    $bunga = $bunga->delete($id_bunga);
}