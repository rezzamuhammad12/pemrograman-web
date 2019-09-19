<?php 
$conn = mysqli_connect("localhost", "root", "", "173040043");

function query($query){
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows =[];

	while($row = mysqli_fetch_assoc($result)){
	$rows[] = $row;

	}
	return $rows;
}

function tambah($data) {

	global $conn;

	$nama = htmlspecialchars($data['nama']);
	$latin = htmlspecialchars($data['latin']);
	$daerah = htmlspecialchars($data['daerah']);
	$deskripsi = htmlspecialchars($data['deskripsi']);
	
	// upload gambar
	$gambar = upload();
	if( !$gambar ) {
		return false;
	}


	$querytambah = "INSERT INTO florafauna 
				VALUES ('', '$nama', '$latin', '$daerah', '$deskripsi', '$gambar');
			";
	mysqli_query($conn, $querytambah);
	return mysqli_affected_rows($conn);

}

function upload() {
	
	$namaFile = $_FILES['gambar']['name'];
	$ukuranFile = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmpName = $_FILES['gambar']['tmp_name'];

	// cek apakah tidak ada gambar yang diupload
	if( $error === 4) {
		echo "<script>
				alert('pilih gambar terlebih dahulu!');
			</script>";
		return false;
	}

	// cek apakah yang diupload adalah gambar
	$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	if( !in_array($ekstensiGambar, $ekstensiGambarValid)) {
		echo "<script>
				alert('Yang diupload bukan gambar!');
			</script>";
		return false;
	}

	// cek ukurannya terlalu besar
	if( $ukuranFile > 4000000) {
		echo "<script>
				alert('Ukuran gambar terlalu besar!');
			</script>";
		return false;
	}

	// siap di upload setelah pengecekan lolos
	// generate nama baru
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;

	move_uploaded_file($tmpName, '../assets/img/' . $namaFileBaru);

	return $namaFileBaru;
}

function hapus($id) {
	global $conn;
	mysqli_query($conn, "DELETE FROM florafauna WHERE id = $id");
	return mysqli_affected_rows($conn);
}

function ubah($data) {
	global $conn;

	$id = $data['id'];
	$nama = htmlspecialchars($data['nama']);
	$latin = htmlspecialchars($data['latin']);
	$daerah = htmlspecialchars($data['daerah']);
	$deskripsi = htmlspecialchars($data['deskripsi']);
	$gambarLama = htmlspecialchars($data['gambarLama']);

	if($_FILES['gambar']['error'] === 4){
		$gambar = $gambarLama;
	} else {
		$gambar = upload();
	}

	$query = "UPDATE florafauna SET
				nama = '$nama',
				latin = '$latin',
				daerah = '$daerah',
				deskripsi = '$deskripsi',
				gambar = '$gambar'
				WHERE id = '$id' 
				";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);

}

function registrasi($data) {
	global $conn;

	$username = strtolower(trim($data["username"]));
	$username = mysqli_real_escape_string($conn, $username);
	$password1 = mysqli_real_escape_string($conn, $data["password1"]);
	$password2 = mysqli_real_escape_string($conn, $data["password2"]);

	$cek_user = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
	if( mysqli_num_rows($cek_user) > 0) {
		echo "<script>
				alert('username sudah terdaftar!');
				document.location.href = 'registrasi.php';
			</script>";
			return false;
	}

	if( $password1 !== $password2) {
		echo"<script>
				alert('konfirmasi password tidak sesuai!');
				document.location.href = 'registrasi.php';
			</script>";
			return false;
	}

	$password_baru = password_hash($password1, PASSWORD_DEFAULT);
	
	mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$password_baru')");

	return mysqli_affected_rows($conn);
}

 ?>