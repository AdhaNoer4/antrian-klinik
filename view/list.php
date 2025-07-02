<ul class="list-group">
<?php foreach ($antrian as $pasien): ?>
    <li class="list-group-item d-flex justify-content-between align-items-center
        <?php echo $pasien['status'] === 'selesai' ? 'list-group-item-success' : ''; ?>">
        <?php echo $pasien['nomor'] . '. ' . htmlspecialchars($pasien['nama']); ?>
        <span class="badge bg-<?php echo $pasien['status'] === 'selesai' ? 'success' : 'primary'; ?>">
            <?php echo ucfirst($pasien['status']); ?>
        </span>
    </li>
<?php endforeach; ?>
</ul>

