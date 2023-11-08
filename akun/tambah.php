<?php
    require "../function/koneksi.php";

    if (isset($_POST["btnsave"])) {
        // Get the user input
        $username = $_POST["usernameLarge"];
        $password = ($_POST["passwordLarge"]); // belum di enkripsi
        $nama = $_POST["namaLarge"];
        $alamat = $_POST["alamatLarge"];
        $akses = $_POST["FormControlSelect1"];

        // Full encryption
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Check if a file is uploaded
        if (isset($_FILES["formFile"]) && $_FILES["formFile"]["error"] == 0) {
            $dir = "../assets/img/avatars/";
            $gambar = $_FILES["formFile"]["name"];
            $tmpFile = $_FILES["formFile"]["tmp_name"];

            // Move the uploaded file to the desired directory
            if (move_uploaded_file($tmpFile, $dir . $gambar)) {
                // Get the highest existing id_admin from the database
                $query = $con->query("SELECT MAX(id_admin) AS max_id FROM admin");
                $row = $query->fetch_assoc();
                $max_id = $row['max_id'];
                
                // Extract the numeric part and increment it
                $numeric_part = (int) substr($max_id, 2);
                $numeric_part++;
                $new_id_admin = 'US' . str_pad($numeric_part, 3, '0', STR_PAD_LEFT);

                // Insert user data into the database
                $db = $con->query("INSERT INTO admin (id_admin, nama_pengguna, kata_sandi_hash, nama_lengkap, alamat, gambar, tingkat_akses) 
                    VALUES ('$new_id_admin', '$username', '$hashed_password', '$nama', '$alamat', '$gambar', '$akses')");

                if ($db) {
                    echo "<script>window.location='../akun/indexAkun.php';</script>";
                } else {
                    echo "<div class='alert alert-warning' role='alert'>Error inserting data into the database.</div>";
                }
            } else {
                echo "<div class='alert alert-warning' role='alert'>Error uploading the file.</div>";
            }
        } else {
            echo "<div class='alert alert-warning' role='alert'>No file uploaded or an error occurred.</div>";
        }
    }

?>
