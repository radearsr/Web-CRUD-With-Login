<?php
//insert.php

// db Local Xampp
$connect = mysqli_connect("localhost", "root", "", "mydata");

// db Hosting
// $connect = mysqli_connect("sql202.epizy.com", "epiz_27905230", "UQy0sos4tv", "epiz_27905230_mydatabase");

if(isset($_POST["item_name"]))
{
 $item_name = $_POST["item_name"];
//  $item_code = $_POST["item_code"];
 $item_desc = $_POST["item_desc"];
 $item_price = $_POST["item_price"];
 $item_joki = $_POST["item_joki"];
 $item_barang = $_POST["item_barang"];
 $item_harga = $_POST["item_harga"];
 $query = '';
 for($count = 0; $count<count($item_name); $count++)
 {
  $item_name_clean = mysqli_real_escape_string($connect, $item_name[$count]);
//   $item_code_clean = mysqli_real_escape_string($connect, $item_code[$count]);
  $item_desc_clean = mysqli_real_escape_string($connect, $item_desc[$count]);
  $item_price_clean = mysqli_real_escape_string($connect, $item_price[$count]);
  $item_joki_clean = mysqli_real_escape_string($connect, $item_joki[$count]);
  $item_barang_clean = mysqli_real_escape_string($connect, $item_barang[$count]);
  $item_harga_clean = mysqli_real_escape_string($connect, $item_harga[$count]);
  if($item_name_clean != '' && $item_desc_clean != '' && $item_price_clean != '' &&  $item_joki_clean != '' &&  $item_barang_clean != '' && $item_harga_clean != '')
  {
   $query .= '
   INSERT INTO hasiltembak(joki,nmalamat,merchant,barang,jumlah,harga,fee,resi) 
   VALUES("'.$item_name_clean.'", "Petompon", "'.$item_desc_clean.'", "'.$item_price_clean.'", "'.$item_joki_clean.'", "'.$item_barang_clean.'","0","'.$item_harga_clean.'"); 
   ';
  }
 }
 if($query != ''){
  if(mysqli_multi_query($connect, $query)){
   echo('Data Berhasil Masuk Ke Database');
  }else{
   echo('Error');
  }
 }else{
  echo ('Harap Isi Semua Tabel');
 }
}
?>