<?php if ($dipanggil): ?>
    <div class="alert alert-primary mt-4 d-grid gap-2 text-center">
        <strong>Pasien Dipanggil:</strong> No <?= $dipanggil['nomor']; ?> - <?= htmlspecialchars($dipanggil['nama']); ?>
        <button class="btn btn-success" onclick="playTTS()">Play Suara Panggil</button>

        <script>
            function playTTS() {
                const nomor = "<?php echo $dipanggil['nomor']; ?>";
                const nama = "<?php echo htmlspecialchars($dipanggil['nama']); ?>";
                const kalimat = `Nomor antrian ${nomor}, atas nama ${nama}. Silahkan masuk.`;

                const utterance = new SpeechSynthesisUtterance(kalimat);
                utterance.lang = 'id-ID';
                speechSynthesis.speak(utterance);
            }
        </script>

    </div>
<?php endif; ?>