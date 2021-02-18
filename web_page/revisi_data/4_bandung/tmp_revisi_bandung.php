<?php
//memasukkan file config.php
include('../../konek_all_dt.php');
?>


	<div class="container" style="margin-top:20px">
		<center><font size="6">Data Hasil Tembak</font></center>
		<hr>
		<a href="index_data.php?page=tmbh_dt_bandung"><button class="btn btn-dark right">Tambah Data</button></a>
		<div class="table-responsive">
		<table class="table table-striped jambo_table bulk_action">
			<thead>
				<tr>
					<th>Nama Joki</th>
					<th>Merchant</th>
					<th>Barang</th>
					<th>Jumlah</th>
					<th>Harga</th>
					<th>Fee</th>
					<th>No.Resi</th>					
					<th>Tindakan</th>
				</tr>
			</thead>
			<tbody>
				<?php
				//query ke database SELECT tabel mahasiswa urut berdasarkan id yang paling besar
				$sql = mysqli_query($koneksi, "SELECT * FROM hasiltembak WHERE nmalamat='Bandung'") or die(mysqli_error($koneksi));
				//jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
				if(mysqli_num_rows($sql) > 0){
					//membuat variabel $no untuk menyimpan nomor urut
					$no = 1;
					//melakukan perulangan while dengan dari dari query $sql
					while($data = mysqli_fetch_assoc($sql)){
						//menampilkan data perulangan
						echo '
						<tr>
							<td>'.$data['joki'].'</td>
							<td>'.$data['merchant'].'</td>
							<td>'.$data['barang'].'</td>
							<td>'.$data['jumlah'].'</td>
							<td>'.$data['harga'].'</td>
							<td>'.$data['fee'].'</td>
							<td>'.$data['resi'].'</td>					
							<td>
								<a href="index_data.php?page=login_admn&id='.$data['id'].'" class="btn btn-secondary btn-sm">Admin</a>
								<a href="index_data.php?page=rvs_bandung_user&id='.$data['id'].'" class="btn btn-secondary btn-sm">User</a>
								<a href="delete.php?id='.$data['id'].'" class="btn btn-danger btn-sm" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Delete</a>
							</td>
						</tr>
						';
						$no++;
					}
				//jika query menghasilkan nilai 0
				}else{
					echo '
					<tr>
						<td colspan="8">Tidak ada data.</td>
					</tr>
					';
				}
				?>
			<tbody>
		</table>
	</div>
	</div>
