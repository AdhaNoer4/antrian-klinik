<?php 
require_once __DIR__ . '/../model/Antrian.php';

class AntrianController {
    private $model; 

    public function __construct() {
        $this->model = new Antrian(); // Inisialisasi model Antrian
    }

    // tampilkan form + list antrian
    public function index() {
        $antrian = $this->model->getAllAntrian(); // Ambil semua data antrian
        include __DIR__ . '/../view/form.php'; // Tampilkan view
        include __DIR__ . '/../view/list.php'; // Tampilkan list antrian
    }

    // Tambah pasien baru
    public function tambah($nama) {
        $this->model->addPasien($nama); // Tambah pasien baru
        header('Location: index.php'); // Redirect ke halaman antrian
    }

    // proses panggil pasien
    public function panggil() {
        $this->model->panggilPasien(); // Panggil pasien
        header('Location: index.php'); // Redirect ke halaman antrian
    }
}

?>