<?php
require 'function.php';
# cek apakah tombol submit sudah di tekan atau belum
 if ( isset($_POST["submit"])){
    
     #cek apakah data berhasi di tambahkan atau tidak
     if (tambah($_POST) > 0 ){
         echo "
         <script>
            alert('data berhasil ditambahkan');
            document.location.href = 'index.php';
         </script> ";
     }else{
         echo "
         <script>
          alert('data gagal ditambahkan');
          document.location.href = 'tambah.php';
         </script> 
         ";
         echo "<br>";
         echo mysqli_error($conn);
     }

 }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tambah data baju</title>
</head>
<body>
    <h1>tambah data baju</h1>
   
    <form action="" method="post" enctype="multipart/form-data">
         <ul>
            <li>
                <label for="gambar">gambar</label>
                <input type="file" name="gambar" id="gambar">
                <br>
            </li>
            <li>
                <label for="merk">merk</label>
                <input type="text" name="merk" id="merk">
                <br>
            </li>
            <li>
                <label for="warna">warna</label>
                <input type="text" name="warna" id="warna">
                <br>
            </li>
            <li>
                <label for="size">size</label>
                <input type="text" name="size" id="size">

            </li>
            <li>
                <button type="submit" name="submit">SUBMIT</button>
            </li>
         </ul>





    </form>
    <a href="index.php">kembali ke index</a>
</body>
</html>