<?php
require_once __DIR__ . '/../model/Antrian.php';

class AntrianController
{
    private $model;

    public function __construct()
    {
        $this->model = new Antrian(); // Inisialisasi model Antrian
    }

    // tampilkan form + list antrian
    public function index()
    {
        $antrian = $this->model->getAllAntrian(); // Ambil semua data antrian
        $dipanggil = $this->model->getDipanggil(); // Ambil data pasien yang dipanggil
        include __DIR__ . '/../view/form.php'; // Tampilkan view
        include __DIR__ . '/../view/list.php'; // Tampilkan list antrian
        include __DIR__ . '/../view/dipanggil.php'; // Tampilkan data pasien yang dipanggil
    }

    // Tambah pasien baru
    public function tambah($nama)
    {
        $this->model->addPasien($nama); // Tambah pasien baru
        header('Location: index.php?success=tambah'); // Redirect ke halaman antrian
    }

    // proses panggil pasien
    public function panggil()
    {
        $antrian = $this->model->getAllAntrian(); // Ambil semua data antrian
        if (count($antrian) > 0) {
            $pasienDipanggil = $antrian[0]; // Ambil pasien pertama dari antrian
            $this->model->simpanDipanggil($pasienDipanggil); // Simpan data pasien yang dipanggil
        }
        $this->model->panggilPasien(); // Panggil pasien
        header('Location: index.php?success=panggil'); // Redirect ke halaman antrian
    }
    public function reset()
    {
        file_put_contents($this->model->file, json_encode([], JSON_PRETTY_PRINT));
        file_put_contents(__DIR__ . '/../data/dipanggil.json', json_encode(null));
        header("Location: index.php?success=reset");
    }
}
