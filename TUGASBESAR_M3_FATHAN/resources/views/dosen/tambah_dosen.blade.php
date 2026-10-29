<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Dosen</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

    <div class="form-container">

        <h1 class="form-title">Tambah Dosen</h1>

        <p class="form-subtitle">
            Tambahkan data dosen pembimbing baru
        </p>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('dosen.store') }}" method="POST">

            @csrf

            <div class="form-group">
                <label for="nama_dosen">Nama Dosen</label>

                <input
                    type="text"
                    id="nama_dosen"
                    name="nama_dosen"
                    placeholder="Masukkan nama dosen"
                    value="{{ old('nama_dosen') }}"
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
                    value="{{ old('nidn') }}"
                    required
                >
            </div>

            <div class="form-group">
                <label for="jabatan_fungsional">
                    Jabatan Fungsional
                </label>

                <input
                    type="text"
                    id="jabatan_fungsional"
                    name="jabatan_fungsional"
                    placeholder="Contoh: Lektor"
                    value="{{ old('jabatan_fungsional') }}"
                    required
                >
            </div>

            <div class="form-group">
                <label for="kepakaran_riset">Kepakaran Riset</label>

                <textarea
                    id="kepakaran_riset"
                    name="kepakaran_riset"
                    placeholder="Masukkan bidang kepakaran riset"
                    required
                >{{ old('kepakaran_riset') }}</textarea>
            </div>

            <div class="form-actions">

                <button type="submit" class="btn-simpan">
                    Simpan
                </button>

                <a href="{{ route('dosen.index') }}"
                   class="btn-batal"
                   style="text-align: center; text-decoration: none;">
                    Batal
                </a>

            </div>

        </form>

    </div>

</body>
</html>