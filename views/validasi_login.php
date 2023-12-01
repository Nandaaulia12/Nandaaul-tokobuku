<?php

if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] == "admin ") {
        header("location:views/home.php");
    } else if ($_SESSION['role'] == "kasir") {
        header("location:views/home_kasir.php");
    } else {
        echo 'data tidak ada';
    }
}

?>