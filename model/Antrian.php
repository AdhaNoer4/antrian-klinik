<?php
class Antrian
{
    public $file = __DIR__ . "/../data/antrian.json"; // file json untuk menyimpan data antrian

    // Method untuk mendapatkan semua data antrian
    public function getAllAntrian()
    {
        if (!file_exists($this->file)) {
            file_put_contents($this->file, json_encode([])); // buat file jika belum ada    
        }
        $data = json_decode(file_get_contents($this->file), true);
        return $data;
    }

    // Method untuk menambahkan Pasien baru
    public function addPasien($nama)
    {
        $antrian = $this->getAllAntrian();
        $nomor = count($antrian) + 1;
        $antrian[] = ["nomor" => $nomor, "nama" => $nama, "status" => "belum"];
        $this->saveAll($antrian);
    }

    // Method memanggil dan menghapus pasien dari antrian
    public function panggilPasien()
    {
        $antrian = $this->getAllAntrian();
        foreach ($antrian as &$pasien) {
            if ($pasien['status'] === 'belum') {
                $pasien['status'] = 'selesai';
                $this->simpanDipanggil($pasien);
                break;
            }
        }
        $this->saveAll($antrian);
    }

    public function saveAll($data)
    {
        file_put_contents($this->file, json_encode($data, JSON_PRETTY_PRINT));
    }

    // Method untuk menyimpan data pasien yang dipanggil
    // Simpan data pasien yang dipanggil ke file dipanggil.json
    public function simpanDipanggil($pasien)
    {
        $fileDipanggil = __DIR__ . '/../data/dipanggil.json';
        file_put_contents($fileDipanggil, json_encode($pasien, JSON_PRETTY_PRINT)); // simpan data pasien yang dipanggil
    }

    // Method untuk mendapatkan data pasien yang dipanggil
    public function getDipanggil()
    {
        $fileDipanggil = __DIR__ . '/../data/dipanggil.json';
        if (!file_exists($fileDipanggil)) {
            return null; // jika file belum ada, kembalikan array kosong
        }
        $data = json_decode(file_get_contents($fileDipanggil), true);
        return $data; // kembalikan data pasien yang dipanggil
    }
}
