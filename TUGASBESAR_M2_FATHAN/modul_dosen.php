<?php
include "koneksi.php";

$query = "SELECT * FROM dosen ORDER BY id ASC";
$result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modul Dosen Pembimbing</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container">

        <h1>Modul Dosen Pembimbing</h1>

        <p class="subtitle">
            Pengelolaan data dosen pembimbing
        </p>

        <div class="top-bar">

            <input type="text" placeholder="Cari nama dosen...">

            <button
                class="btn-tambah"
                onclick="window.location.href='tambah_dosen.php'">
                + Tambah Dosen
            </button>

        </div>

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

                <?php
                $no = 1;

                while ($row = mysqli_fetch_assoc($result)) {
                ?>

                    <tr>

                        <td>
                            <?= $no++; ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($row['nama_dosen']); ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($row['nidn']); ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($row['jabatan_fungsional']); ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($row['kepakaran_riset']); ?>
                        </td>

                        <td>

                            <button class="btn-detail">
                                Detail
                            </button>

                            <button class="btn-edit">
                                Edit
                            </button>

                            <button
    type="button"
    class="btn-hapus"
    data-bs-toggle="modal"
    data-bs-target="#modalHapus">
    Hapus
</button>

<div class="modal fade" id="modalHapus" tabindex="-1" aria-labelledby="modalHapusLabel" aria-hidden="true">
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
                Apakah Anda yakin ingin menghapus data dosen ini?
            </div>

            <div class="modal-footer">

                <button
                    type="button"
                    class="btn btn-secondary"
                    data-bs-dismiss="modal">
                    Batal
                </button>

                <button
                    type="button"
                    class="btn btn-danger">
                    Hapus
                </button>

            </div>

        </div>
    </div>
</div>



                        </td>

                    </tr>

                <?php
                }
                ?>

            </tbody>

        </table>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
