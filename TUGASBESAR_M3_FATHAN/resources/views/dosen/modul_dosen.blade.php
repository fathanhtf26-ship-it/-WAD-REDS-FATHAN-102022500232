<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modul Dosen Pembimbing</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

    <div class="container">

        <h1>Modul Dosen Pembimbing</h1>

        <p class="subtitle">
            Pengelolaan data dosen pembimbing
        </p>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                Data gagal diproses. Periksa kembali data yang dimasukkan.
            </div>
        @endif

        <div class="top-bar">

            <form action="{{ route('dosen.index') }}" method="GET">
                <input
                    type="text"
                    name="cari"
                    placeholder="Cari nama dosen..."
                    value="{{ request('cari') }}"
                >

                <button type="submit" class="btn btn-outline-secondary">
                    Cari
                </button>
            </form>

            <a href="{{ route('dosen.create') }}"
               class="btn-tambah"
               style="text-decoration: none; padding: 11px 13px; border-radius: 6px;">
                + Tambah Dosen
            </a>

        </div>

        <div class="table-responsive">

            <table>

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Dosen</th>
                        <th>NIDN</th>
                        <th>Jabatan Fungsional</th>
                        <th>Kepakaran Riset</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse ($dosens as $dosen)

                        <tr>
                            <td>{{ $loop->iteration }}</td>

                            <td>{{ $dosen->nama_dosen }}</td>

                            <td>{{ $dosen->nidn }}</td>

                            <td>{{ $dosen->jabatan_fungsional }}</td>

                            <td>{{ $dosen->kepakaran_riset }}</td>

                            <td class="text-nowrap">

                                <a href="{{ route('dosen.show', $dosen->id) }}"
                                   class="btn-detail">
                                    Detail
                                </a>

                                <a href="{{ route('dosen.edit', $dosen->id) }}"
                                   class="btn-edit">
                                    Edit
                                </a>

                                <button
                                    type="button"
                                    class="btn-hapus"
                                    data-bs-toggle="modal"
                                    data-bs-target="#modalHapus"
                                    data-url="{{ route('dosen.destroy', $dosen->id) }}"
                                    data-nama="{{ $dosen->nama_dosen }}">
                                    Hapus
                                </button>

                            </td>
                        </tr>

                    @empty

                        <tr>
                            <td colspan="6" class="text-center">
                                Data dosen tidak ditemukan.
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

    <!-- Modal Konfirmasi Hapus -->
    <div class="modal fade"
         id="modalHapus"
         tabindex="-1"
         aria-labelledby="modalHapusLabel"
         aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered">

            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="modalHapusLabel">
                        Konfirmasi Hapus
                    </h5>

                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close">
                    </button>
                </div>

                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus data dosen
                    <strong id="namaDosenHapus"></strong>?
                </div>

                <div class="modal-footer">

                    <button
                        type="button"
                        class="btn btn-secondary"
                        data-bs-dismiss="modal">
                        Batal
                    </button>

                    <form id="formHapus" method="POST" action="">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">
                            Hapus
                        </button>
                    </form>

                </div>

            </div>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        const modalHapus = document.getElementById('modalHapus');

        modalHapus.addEventListener('show.bs.modal', function (event) {
            const tombol = event.relatedTarget;

            document.getElementById('formHapus').action =
                tombol.getAttribute('data-url');

            document.getElementById('namaDosenHapus').textContent =
                tombol.getAttribute('data-nama');
        });
    </script>

</body>
</html>