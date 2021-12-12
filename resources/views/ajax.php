<?php

//membuat koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "esurat-fti");

//variabel nim yang dikirimkan form.php
$id_user = $_GET['id_user'];

//mengambil data
$query = mysqli_query($koneksi, "select * from users where id_user='$id_user'");
$mahasiswa = mysqli_fetch_array($query);
$data = array(
            'name' =>$mahasiswa['name'],);

//tampil data
echo json_encode($data);

?>
