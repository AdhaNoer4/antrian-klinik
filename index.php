<?php
require_once __DIR__ . '/controller/AntrianController.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Antrian-Klinik</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>

<body class="bg-light">
    <div class="container py-5">
        <h1 class="mb-4">Sistem Antrian Klinik</h1>
        <?php

        $controller = new AntrianController(); // Inisialisasi controller

        // cek url paramater 'action'
        $action = $_GET['action'] ?? ''; // Default action jika tidak ada parameter

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

</body>

</html>