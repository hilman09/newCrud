<?php

$conn = mysqli_connect("localhost", "root", "" ,"phpdasar");

function query($query){
    global $conn;
    $result = mysqli_query($conn,$query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }

     return $rows;
}

function tambah($data){
     #ambil data dari tiap elemen
     global $conn;
     $merk = htmlspecialchars( $data['merk']);
     $warna = htmlspecialchars($data['warna']);
     $size = htmlspecialchars( $data['size']);

   $gambar = $_FILES["gambar"]["name"];
   $tmp_name = $_FILES["gambar"]["tmp_name"];
   $ukuran = $_FILES["gambar"]["size"];
   $tipe = $_FILES["gambar"]["type"];
   $error = $_FILES["gambar"]["error"];

  // pengecekan gambar

  // jika user tidak pilih gambar
  if( $error == 4 ) {
    echo "<script>
        alert('harap pilih gambar terlebih dahulu!');
        document.location.href = 'tambah.php';
        </script>";
    return false;
  }

  // jika ukuran file melebihi 5MB
  if( $ukuran > 5000000 ) {
    echo "<script>
        alert('ukuran file terlalu besar!');
        document.location.href = 'tambah.php';
        </script>";
    return false;
  }
      #cara ambil data di database / query insert data
      $query = "INSERT INTO pakaian
      VALUES
      ('', '$merk','$warna','$size','$gambar')
    ";

     mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

}


function hapus($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM pakaian WHERE id=$id");
    return mysqli_affected_rows($conn);

}
function ubah($data){
    #ambil data dari tiap elemen
    global $conn;
    $id = $data["id"];
    $merk = htmlspecialchars( $data["merk"]);
    $warna = htmlspecialchars($data["warna"]);
    $size = htmlspecialchars( $data["size"]);
    $gambar = htmlspecialchars( $data["gambar"]);
     #cara ambil data di database / query insert data
     $query = "UPDATE pakaian SET
                merk = '$merk',
                warna = '$warna',
                size = '$size',
                gambar = '$gambar'
               WHERE id = $id
                ";

    mysqli_query($conn, $query);

   return mysqli_affected_rows($conn);

}

function cari($keyword){
    $query = "SELECT * FROM pakaian 
                    WHERE 
                merk LIKE '%$keyword%' OR
                warna LIKE '%$keyword%'
                ";

    return query($query);
}


?>