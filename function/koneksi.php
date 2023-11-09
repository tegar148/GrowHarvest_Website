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



    function ubahkategori($data){
		global $con;

		$id = $data["id_kategori"];

		$nama = htmlspecialchars($data["namaedit"]);
        // $pengguna = htmlspecialchars($data["useredit"]);
        // $password = htmlspecialchars($data["passwordedit"]);
		// $alamat = htmlspecialchars($data["alamatedit"]);
        // $upload = htmlspecialchars($data["upload"]);

		
		$query = "UPDATE `kategoriproduk` SET
		 `nama_kategori` = '$nama' 
		 WHERE `kategoriproduk`.`id_kategori` = '$id'";

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
	



	// function ubahkategori($data){
	// 	global $con;
	
	// 	$id = $data["id_kategori"];
	
	// 	// Memeriksa apakah ID ada dalam database
	// 	$query_check_id = "SELECT id_kategori FROM kategoriproduk WHERE id_kategori = $id";
	// 	$result = mysqli_query($con, $query_check_id);
	
	// 	if(mysqli_num_rows($result) == 0) {
	// 		// ID tidak ditemukan dalam database, lakukan tindakan yang sesuai
	// 		return "ID tidak valid";
	// 	}
	
	// 	$nama = htmlspecialchars($data["namaedit"]);
	
	// 	$query = "UPDATE kategoriproduk SET 
	// 				nama_kategori = '$nama'
	// 				WHERE id_kategori = $id
	// 				";
	
	// 	mysqli_query($con, $query);
	
	// 	return mysqli_affected_rows($con);
	// }
	
?>