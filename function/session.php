<?php
    // index.php
    session_start();
    if (isset($_SESSION["btnlogin"])== false) {
        // echo "Selamat datang, " . $_SESSION["username"];
    // Tampilkan konten halaman utama di sini
        // header("location: ../admin/index.php");
        // exit();
        header("location: ../admin/login.php");
        exit();
    } else {
        // header("location: ../admin/login.php");
        // exit();
    }

    // if ($_SESSION["role"] === "admin") {
    //     // Halaman ini hanya dapat diakses oleh admin
    //     // Tampilkan konten halaman "index.php" untuk admin di sini
    //     header("location: ../admin/index.php");
    // } elseif ($_SESSION["role"] === "pegawai") {
    //     // Jika pengguna adalah pegawai, arahkan ke halaman dashboard
    //     header("location: ../admin/dashboard.php");
    //     exit();
    // }

    // switch ($row["role"]) {
    //     case "admin":
    //         header("location:../admin/index.php");
    //     break;
    //     case "pegawai":
    //         header("loecation:../admin/dashboard.php");
    //     break;
    // }

?>