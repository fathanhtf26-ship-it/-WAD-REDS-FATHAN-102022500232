<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Dosen</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <div class="form-container">
        <h2 class="form-title">Edit Data Dosen</h2>
        <p class="form-subtitle">Perbarui informasi dosen pembimbing</p>

        <form action="{{ route('dosen.update', $dosen->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nama_dosen">Nama Dosen</label>
                <input
                    type="text"
                    id="nama_dosen"
                    name="nama_dosen"
                    value="{{ old('nama_dosen', $dosen->nama_dosen) }}"
                    required
                >
                @error('nama_dosen')
                    <small>{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="nidn">NIDN</label>
                <input
                    type="text"
                    id="nidn"
                    name="nidn"
                    value="{{ old('nidn', $dosen->nidn) }}"
                    required
                >
                @error('nidn')
                    <small>{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="jabatan_fungsional">Jabatan Fungsional</label>
                <input
                    type="text"
                    id="jabatan_fungsional"
                    name="jabatan_fungsional"
                    value="{{ old('jabatan_fungsional', $dosen->jabatan_fungsional) }}"
                    required
                >
                @error('jabatan_fungsional')
                    <small>{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="kepakaran_riset">Kepakaran Riset</label>
                <input
                    type="text"
                    id="kepakaran_riset"
                    name="kepakaran_riset"
                    value="{{ old('kepakaran_riset', $dosen->kepakaran_riset) }}"
                    required
                >
                @error('kepakaran_riset')
                    <small>{{ $message }}</small>
                @enderror
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-simpan">
                    Simpan Perubahan
                </button>

                <a href="{{ route('dosen.index') }}" class="btn-batal">
                    Batal
                </a>
            </div>
        </form>
    </div>

</body>
</html>