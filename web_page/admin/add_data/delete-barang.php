<!-- Include Session Untuk Nama link -->
<?php 
session_start();

	include("../../config.php");
	include("../../functions.php");

	$user_data = check_login($koneksi);

?>

<?php
include('../../config.php');

//jika benar mendapatkan GET id dari URL
if(isset($_GET['id'])){
	//membuat variabel $id yang menyimpan nilai dari $_GET['id']
	$id 	 = $_GET['id'];
	$alamat  = $_GET['al'];
	$gateway = $user_data['level'];
	
	//melakukan query ke database, dengan cara SELECT data yang memiliki id yang sama dengan variabel $id
	$cek = mysqli_query($koneksi, "SELECT * FROM barang WHERE id_barang='$id'") or die(mysqli_error($koneksi));

	//jika query menghasilkan nilai > 0 maka eksekusi script di bawah
	if(mysqli_num_rows($cek) > 0){
		//query ke database DELETE untuk menghapus data dengan kondisi id=$id
		$del = mysqli_query($koneksi, "DELETE FROM barang WHERE id_barang='$id'") or die(mysqli_error($koneksi));
		if($del){
			echo '<script>alert("Berhasil Menghapus Barang"); document.location="../page_'.$gateway.'.php?page=tmbh_dt_'.$alamat.'&dt='.$alamat.'";</script>';
		}else{
			echo '<script>alert("ERROR"); document.location="../page_'.$gateway.'.php?page=tmbh_dt_'.$alamat.'&dt='.$alamat.'";</script>';
		}
	}else{
		echo '<script>alert("ID Tidak Ditemukan"); document.location="../page_'.$gateway.'.php?page=tmbh_dt_'.$alamat.'&dt='.$alamat.'";</script>';
	}
}else{
	echo '<script>alert("ID Tidak Ditemukan"); document.location="../page_'.$gateway.'.php?page=tmbh_dt_'.$alamat.'&dt='.$alamat.'";</script>';
}

?>
