<?php

require_once '../service/database.php';


$message = '';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $action = $_POST['action'];

    if ($action == 'add') {
        $jenis = $_POST['jenis'];
        $nama = $_POST['nama'];
        $deskripsi = $_POST['deskripsi'];
        $harga_usd = $_POST['harga'];

        $harga_idr = $harga_usd * 15000;

       
        $nama_file = $_FILES["gambar"]["name"];
        $ukuran_file = $_FILES["gambar"]["size"];
        $tmp_file = $_FILES["gambar"]["tmp_name"];
        $dir_upload = "../asset/image/";

        if (!is_dir($dir_upload)) {
            mkdir($dir_upload, 0755, true); 
        }

        if (move_uploaded_file($tmp_file, $dir_upload . $nama_file)) {
          
            switch ($jenis) {
                case 'produk':
                    $table = 'produk';
                    break;
                case 'obat':
                    $table = 'obat_terlarang';
                    break;
                case 'database':
                    $table = 'jual_database';
                    break;
                default:
                    $message = "Jenis item tidak valid.";
                    break;
            }

          
            $gambar_path = "asset/image/" . $nama_file;
            $query = "INSERT INTO $table (nama, deskripsi, harga, gambar) VALUES ('$nama', '$deskripsi', $harga_idr, '$gambar_path')";

            if ($conn->query($query) === TRUE) {
                $message = "Item berhasil ditambahkan!";
            } else {
                $message = "Error: " . $query . "<br>" . $conn->error;
            }
        } else {
            $message = "Gagal mengupload file.";
        }
    } elseif ($action == 'update') {
        $id = $_POST['id'];
        $jenis = $_POST['jenis'];
        $nama = $_POST['nama'];
        $deskripsi = $_POST['deskripsi'];
        $harga = $_POST['harga'];

        $query = "UPDATE $jenis SET nama='$nama', deskripsi='$deskripsi', harga=$harga WHERE id=$id";

        if ($conn->query($query) === TRUE) {
            $message = "Item berhasil diperbarui!";
        } else {
            $message = "Error: " . $query . "<br>" . $conn->error;
        }
    } elseif ($action == 'delete') {
        $id = $_POST['id'];
        $jenis = $_POST['jenis'];

      
        $query = "DELETE FROM $jenis WHERE id=$id";

        if ($conn->query($query) === TRUE) {
            $message = "Item berhasil dihapus!";
        } else {
            $message = "Error: " . $query . "<br>" . $conn->error;
        }
    }
}


header("Location: read.php");
exit();
?>
