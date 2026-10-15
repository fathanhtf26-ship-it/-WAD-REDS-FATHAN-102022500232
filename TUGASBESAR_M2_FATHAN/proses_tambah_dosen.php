<?php

include "koneksi.php";


$nama_dosen= $_POST['nama_dosen'];
$nidn = $_POST['nidn'];
$jabatan_fungsional = $_POST['jabatan_fungsional'];
$kepakaran_riset = $_POST['kepakaran_riset'];


$query = "INSERT INTO dosen 
          (nama_dosen, nidn, jabatan_fungsional, kepakaran_riset)
          VALUES (?, ?, ?, ?)";


$stmt = mysqli_prepare($koneksi, $query);


mysqli_stmt_bind_param(
    $stmt,   
    "ssss",
    $nama_dosen,
    $nidn,
    $jabatan_fungsional,
    $kepakaran_riset
);


if (mysqli_stmt_execute($stmt)) {

    
    header("Location: modul_dosen.php?status=sukses");
    exit;

} else {

    
    echo "Gagal menambahkan data dosen: " . mysqli_error($koneksi);
}


mysqli_stmt_close($stmt);


mysqli_close($koneksi);

?>
