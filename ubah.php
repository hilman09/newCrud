<?php
require 'function.php';
$id = $_GET["id"];
$bajuu = query("SELECT * FROM pakaian WHERE id=$id")[0];


if ( isset($_POST["submit"])){
    
    #cek apakah data berhasi di ubahtambahkan atau tidak
    if (ubah($_POST) > 0 ){
        echo "
        <script>
           alert('data berhasil diubah');
           document.location.href = 'index.php';
        </script> ";
    }else{
        echo "
        <script>
         alert('data gagal diubah');
         document.location.href = 'ubah.php';
        </script> 
        ";

       
    }

}

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ubah</title>
</head>
<body>
    <h1>mengupdate data baju</h1>

    
    <form action="" method="post">
        <input type="hidden" name="id" value="<?= $bajuu["id"]; ?>">
         <ul>
            <li>
                <label for="gambar">gambar</label>
                <input type="text" name="gambar" id="gambar" value="<?= $bajuu["gambar"]; ?>">
                <br>
            </li>
            <li>
                <label for="merk">merk</label>
                <input type="text" name="merk" id="merk" value="<?= $bajuu["merk"]; ?>">
                <br>
            </li>
            <li>
                <label for="warna">warna</label>
                <input type="text" name="warna" id="warna"value="<?= $bajuu["warna"]; ?>">
                <br>
            </li>
            <li>
                <label for="size">size</label>
                <input type="text" name="size" id="size" value="<?= $bajuu["size"]; ?>">

            </li>
            <li>
                <button type="submit" name="submit">SUBMIT</button>
            </li>
         </ul>
</form>

<a href="index.php">kembali ke index</a>
</body>
</html>
