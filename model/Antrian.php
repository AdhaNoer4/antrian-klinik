<?php 
class Antrian{
    private $file = __DIR__."/../data/antrian.json"; // file json untuk menyimpan data antrian

    // Method untuk mendapatkan semua data antrian
    public function getAllAntrian() {
        if (!file_exists($this->file)) {
            file_put_contents($this->file, json_encode([])); // buat file jika belum ada    
        }
        $data = json_decode(file_get_contents($this->file), true);
        return $data;
    }

    // Method untuk menambahkan Pasien baru
    public function addPasien($nama){
        $data = $this->getAllAntrian();
        $lastNumber = count($data) > 0 ? end($data)['nomor'] : 0; // ambil nomor antrian terakhir
        $newNumber = $lastNumber + 1; // nomor antrian baru
        $data[] = [
            'nomor' => $newNumber,
            'nama' => $nama    
        ];
        file_put_contents($this->file, json_encode($data, JSON_PRETTY_PRINT)); // simpan data antrian
    }

    // Method memanggil dan menghapus pasien dari antrian
    public function panggilPasien(){
        $data = $this->getAllAntrian();
        if (count($data) > 0) {
           array_shift($data); // hapus pasien pertama dari antrian
        }
        file_put_contents($this->file, json_encode($data, JSON_PRETTY_PRINT)); // simpan data antrian
    }
}

?>