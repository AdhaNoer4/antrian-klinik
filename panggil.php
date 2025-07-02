<?php
require_once __DIR__ . '/controller/AntrianController.php';

$controller = new AntrianController();
$model = new Antrian();
$dipanggil = $model->getDipanggil();
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Layar Panggil Pasien</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <meta http-equiv="refresh" content="3"> <!-- auto refresh -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            background-color: black;
            color: white;
            text-align: center;
        }

        .nomor {
            font-size: 120px;
            font-weight: bold;
        }

        .nama {
            font-size: 80px;
        }
    </style>
</head>

<body>
    <div class="container py-5">
        <h1 class="mb-4">Layar Panggil Pasien</h1>
        <?php if ($dipanggil): ?>
            <div class="nomor">No <?php echo $dipanggil['nomor']; ?></div>
            <div class="nama"><?php echo htmlspecialchars($dipanggil['nama']); ?></div>
        <?php else: ?>
            <div class="display-3">Belum ada pasien dipanggil</div>
        <?php endif; ?>
    </div>

</body>

</html>