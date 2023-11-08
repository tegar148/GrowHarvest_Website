<?php
    $con=mysqli_connect("localhost","root","","growharvest");

	function query($query){
		global $con;
		$result = mysqli_query($con, $query);
		$tempat=[];

		while ($row=mysqli_fetch_assoc($result)) {
			$tempat[]=$row;
		}
		return $tempat;
	}



    function ubahakun($data){
		global $con;

		$id = $data["id"];

		$nama = htmlspecialchars($data["namaedit"]);
        $pengguna = htmlspecialchars($data["useredit"]);
        $password = htmlspecialchars($data["passwordedit"]);
		$alamat = htmlspecialchars($data["alamatedit"]);
        $upload = htmlspecialchars($data["upload"]);

		
		$query = "UPDATE admin SET 
				nama_pengguna = '$pengguna',
			    kata_sandi_hash = '$password',
				nama_lengkap = '$nama',
                alamat  =   '$alamat',
				gambar = '$upload'
				WHERE id_admin = $id
				";

		mysqli_query($con, $query);

		return mysqli_affected_rows($con);
	}


	function tambahkategori($data){
		date_default_timezone_set('Asia/Jakarta'); // Atur zona waktu sesuai kebutuhan Anda

		global $con;
	
		// Membuat id otomatis dengan format KT001
		$queryId = "SELECT MAX(id_kategori) AS max_id FROM kategoriproduk";
		$result = mysqli_query($con, $queryId);
		$row = mysqli_fetch_assoc($result);
		$maxId = $row['max_id'];
	
		// Mengambil angka dari id terakhir dan menambahkannya dengan 1
		$idNumber = (int)substr($maxId, 2);
		$idNumber++;
		$newId = 'KT' . str_pad($idNumber, 3, '0', STR_PAD_LEFT);
	
		$nama = htmlspecialchars($data["kategoritambah"]);
		
		// Menghasilkan tanggal saat ini
		$tanggal = date("Y-m-d H:i:s");
	
		$query = "INSERT INTO kategoriproduk (id_kategori, nama_kategori, tanggal_kategori)
					VALUES ('$newId', '$nama', '$tanggal')";
	
		mysqli_query($con, $query);
	
		return mysqli_affected_rows($con);
	}
	
?>