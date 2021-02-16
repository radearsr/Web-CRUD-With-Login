<?php

function cek_masuk($konek)
{

	if(isset($_SESSION['id']))
	{

		$id = $_SESSION['id'];
		$query = "select * from admin where id = '$id' limit 1";

		$result = mysqli_query($konek,$query);
		if($result && mysqli_num_rows($result) > 0)
		{

			$data_admin = mysqli_fetch_assoc($result);
			return $data_admin;
		}
	}

	//redirect to login
	header("Location: login_admin.php");
	die;

}
