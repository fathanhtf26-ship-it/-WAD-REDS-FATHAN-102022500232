<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Tambah Dosen</h5>
        </div>

        <div class="form-container">

    <h1 class="form-title">Tambah Dosen</h1>

    <p class="form-subtitle">
        Silakan masukkan data dosen baru.
    </p>

    <form action="proses_tambah_dosen.php" method="POST">

        <div class="form-group">
            <label for="nama_dosen">Nama Dosen</label>
            <input
                type="text"
                id="nama_dosen"
                name="nama_dosen"
                placeholder="Masukkan nama dosen"
                required
            >
        </div>

        <div class="form-group">
            <label for="nidn">NIDN</label>
            <input
                type="text"
                id="nidn"
                name="nidn"
                placeholder="Masukkan NIDN"
                required
            >
        </div>

        <div class="form-group">
            <label for="jabatan_fungsional">Jabatan Fungsional</label>

            <select
                id="jabatan_fungsional"
                name="jabatan_fungsional"
                required
            >
                <option value="">-- Pilih Jabatan --</option>
                <option value="Rektor">Rektor</option>
                <option value="Kepala Program Studi">Kepala Program Studi</option>
                <option value="Dekan">Dekan</option>
                <option value="Profesor">Profesor</option>
            </select>
        </div>

        <div class="form-group">
            <label for="kepakaran_riset">Kepakaran Riset</label>

            <textarea
                id="kepakaran_riset"
                name="kepakaran_riset"
                placeholder="Contoh: Artificial Intelligence, Machine Learning, Data Science"
                required
            ></textarea>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn-simpan">
                Simpan
            </button>

            <a href="modul_dosen.php" class="btn-batal">
                Batal
            </a>
        </div>

    </form>

</div>

    </div>
</div>

</body>
</html>