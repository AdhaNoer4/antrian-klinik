<div class="card p-4 mb-4">
    <h5>Daftarkan Pasien</h5>
    <form method="post" action="index.php?action=tambah" class="row g-2">
        <div class="col-8">
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Pasien" required>
        </div>
        <div class="col-4 d-grid">
            <button type="submit" class="btn btn-primary">Daftar</button>
        </div>
    </form>
    <form method="post" action="index.php?action=panggil" class="mt-3 d-grid">
        <button type="submit" class="btn btn-success">Panggil Pasien Berikutnya</button>
    </form>
</div>

