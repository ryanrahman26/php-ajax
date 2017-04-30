<?php
    // Include / load file koneksi.php
    include "koneksi.php";

    // Ambil data yang dikirim dari form
    $nis = $_POST['nis']; // Ambil data nis dan masukan ke variable nis
    $nama = $_POST['nama']; // Ambil data nama dan masukan ke variable nama
    $jenis_kelamin = $_POST['jenis_kelamin']; // Ambil data jenis_kelamin dan masukan ke variable jenis_kelamin
    $telp = $_POST['telp']; // Ambil data telp dan masukan ke variable telp
    $alamat = $_POST['alamat']; // Ambil data alamat dan amsukan ke variable alamat

    // Cek apakah user ingin mengubah fotonya atau tidak
    if (isset($_POST['ubah_foto'])) { // Jika user menceklis checkbox yang ada di form ubah, lakukan :
        // AMbil data foto yang dipilih dari form
        $foto = $_FILES['foto']['name'];
        $tmp = $_FILES['foto']['tmp_name'];

        // Rename nama fotonya dengan menambahkan tanggal dan jam upload
        $fotobaru = date('dmYHis').$foto;

        // Set path folder tempat menyimpan fotonya
        $path = "foto/".$fotobaru;

        // Proses upload
        // Cek apakah gambar berhasil diupload atau tidak
        if (move_uploaded_file($tmp, $path)) { // Jika proses upload sukses
            // Query untuk menampilkan data siswa berdasarkan NIS yang dikirim
            $sqlcek = $pdo->prepare("SELECT * FROM siswa WHERE nis=:nis");
            $sqlcek->bindParam(':nis', $nis);
            $sqlcek->execute(); // Eksekusi / Jalankan query
            $data = $sqlcek->fetch(); // Ambil data dari hasil eksekusi $sqlcek

            // Cek apakah file foto sebelumnya ada di folder foto
            if (is_file("foto/".$data['foto'])) // Jika foto ada
                unlink("foto/".$data['foto']); // Hapus file foto sebelumnya yang ada di folder foto

            // Proses ubah ke database
            $sql = $pdo->prepare("UPDATE siswa SET nama=:nama, jenis_kelamin=:jk, telp=:telp, alamat=:alamat, foto=:foto WHERE nis=:nis");
            $sql->bindParam(':nama', $nama);
            $sql->bindParam(':jk', $jenis_kelamin);
            $sql->bindParam(':telp', $telp);
            $sql->bindParam(':alamat', $alamat);
            $sql->bindParam(':foto', $fotobaru);
            $sql->bindParam(':nis', $nis);
            $sql->execute(); // Eksekusi query

            // Load ulang view.php agar data diubah tadi bisa terubah di tabel pada view.php
            ob_start();
            include "view.php";
            $html = ob_get_contents();
            ob_end_clean();

            // Buat variable response yang nantinya akan diambil pada proses ajax ketika sukses
            $response = array(
            'status' => 'sukses', // Set status
            'pesan' => 'Data berhasil diubah', // Set pesan
            'html' => $html
            );
        } else { // Jika proses upload gagal
            $response = array(
            'status' => 'gagal', // Set status
            'pesan' => 'Gambar gagal untuk diupload', // Set pesan
            );
        }
    } else { // Jika user tidak menceklis checkbox yang ada di form, lakukan :
        // Proses ubah ke database
        $sql = $pdo->prepare("UPDATE siswa SET nama=:nama, jenis_kelamin=:jk, telp=:telp, alamat=:alamat WHERE nis=:nis");
        $sql->bindParam(':nama', $nama);
        $sql->bindParam(':jk', $jenis_kelamin);
        $sql->bindParam(':telp', $telp);
        $sql->bindParam(':alamat', $alamat);
        $sql->bindParam(':nis', $nis);
        $sql->execute(); // Eksekusi query insert

        // Load ulang view.php agar data diubah tadi bisa terubah di tabel pada view.php
        ob_start();
        include "view.php";
        $html = ob_get_contents();
        ob_end_clean();

        // Buat variable response yang nantinya akan diambil pada proses ajax ketika sukses
        $response = array(
        'status' => 'sukses', // Set status
        'pesan' => 'Data berhasil diubah', // Set pesan
        'html' => $html
        );
    }

    echo json_encode($response); // Konversi variable response menjadi JSON
?>