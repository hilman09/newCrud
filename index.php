<?php
require 'function.php';
# ambil data data dari tabel mahasiswa / query data mahasiswa
# mysqli_query = $conn, "select * from pakaian
$pakaian = query("SELECT * FROM pakaian");

#tombol cari ditekan belum
if (isset($_POST["cari"])){
    $pakaian = cari($_POST["keyword"]);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>halaman admin</title>
</head>
<body>

<h1>daftar baju</h1>

<a href="tambah.php">tambah data baju</a>
<br><br>

<form action="" method="post">
<input type="text" name="keyword" size="50" autofocus placeholder="masukan data yang akan dicari" autocomplete="off">
<button type="submit" name="cari">cari</button>

</form>

<br>
<table border="1" cellpadding="10" cellspacing="0">

    <tr>
        <th>No</th>
        <th>Aksi</th>
        <th>Gambar</th>
        <th>Merk</th>
        <th>Warna</th>  
        <th>Size</th>
    </tr>
    <?php $i = 1; ?>
    <?php foreach ($pakaian as $baju) : ?>
    <tr>
        <td> <?= $i; ?>   </td>
        <td>
            <a href="ubah.php?id=<?=$baju["id"];?>">ubah</a>
            <a href="hapus.php?id=<?=$baju["id"];?>" onclick="return confirm ('yakin?');">hapus</a>
        </td>
        <td><img style="width: 50px" src="img/<?= $baju["gambar"]; ?>"</td>
        <td><?= $baju["merk"]; ?></td>
        <td><?= $baju["warna"]; ?></td>
        <td><?= $baju["size"]; ?></td>
    </tr>
    <?php $i++; ?>
    <?php endforeach; ?>
</table>








</body>
</html>