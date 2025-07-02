<?php
require_once __DIR__ . '/controller/AntrianController.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Antrian-Klinik Adha Sehat</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>

<body class="bg-light">
    <div class="container py-5">
        <h1 class="mb-4">Sistem Antrian Klinik Adha Sehat</h1>
        <?php
        // Cek apakah ada parameter 'success' di URL
        // Jika ada, tampilkan pesan sukses
        $success = $_GET['success'] ?? '';
        if ($success == 'tambah') {
            echo '<div class="alert alert-success">Pasien berhasil ditambahkan!</div>';
        } elseif ($success == 'panggil') {
            echo '<div class="alert alert-warning">Pasien berhasil dipanggil!</div>';
        }

        $controller = new AntrianController(); // Inisialisasi controller

        // cek url paramater 'action'
        $action = $_GET['action'] ?? ''; // Default action jika tidak ada parameter
        // Cek apakah ada aksi reset
        // Jika ada, panggil method reset pada controller
        if (isset($_GET['action']) && $_GET['action'] == 'reset') {
            $controller->reset();
            exit;
        }


        if ($action === 'tambah' && $_SERVER['REQUEST_METHOD'] === 'POST') {
            // Proses tambah pasien
            $nama = $_POST['nama'] ?? ''; // Ambil nama dari form
            if ($nama) {
                $controller->tambah($nama); // Panggil method tambah
            }
        } elseif ($action === 'panggil') {
            // Proses panggil pasien
            $controller->panggil(); // Panggil method panggil
        } else {
            // Tampilkan form dan list antrian
            $controller->index(); // Panggil method index untuk tampilkan form dan list antrian
        }
        ?>
    </div>

    <script>
        // Reload halaman setiap 5 detik
        // Ini berguna untuk memperbarui data antrian secara otomatis
        setTimeout(() => {
            location.reload();
        }, 5000); // 5000 ms = 5 detik
    </script>

</body>


</html>