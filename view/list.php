<div class="card p-4">
    <h5>Daftar Antrian</h5>
    <?php if (count($antrian) > 0): ?>
        <ol class="list-group list-group-numbered mt-3">
            <?php foreach ($antrian as $pasien): ?>
                <li class="list-group-item">
                    <strong>No <?= $pasien['nomor'];?>:</strong> <?= htmlspecialchars($pasien['nama']); ?>
                </li>
            <?php endforeach; ?>
        </ol>
        <?php else: ?>
            <div class="alert alert-info mt-3">Belum ada antrian.</div>
        <?php endif; ?>
</div>

