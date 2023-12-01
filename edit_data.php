<?php
require 'koneksi.php';
$input = file_get_contents('php://input');
$data = json_decode($input,true);
//terima data dari mobile
$id=trim($data['id']);
$nama=trim($data['nama']);
$nilai_kehadiran=trim($data['nilai_kehadiran']);
$nilai_ujian=trim($data['nilai_ujian']);
$nilai_tugas=trim($data['nilai_tugas']);
http_response_code(201);
if($nama!='' and $nilai_kehadiran!='' and $nilai_ujian!='' and $nilai_tugas!=''){
$query = mysqli_query($koneksi,"update siswa set nama='$nama', nilai_kehadiran='$nilai_kehadiran', nilai_ujian='$nilai_ujian', nilai_tugas='$nilai_tugas' where
id='$id'");
$pesan = true;
}else{
$pesan = false;
}
echo json_encode($pesan);
echo mysqli_error($koneksi);