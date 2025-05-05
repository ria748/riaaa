<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Mahasiswa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        :root {
            --bg: #f4f6f8;
            --surface: #ffffff;
            --primary: #2563eb;
            --primary-hover: #1d4ed8;
            --success: #10b981;
            --success-hover: #059669;
            --danger: #ef4444;
            --danger-hover: #dc2626;
            --text: #1f2937;
            --muted: #6b7280;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: var(--bg);
            color: var(--text);
            line-height: 1.6;
        }

        header {
            background-color: var(--primary);
            color: white;
            padding: 20px;
            text-align: center;
            font-size: 28px;
            font-weight: bold;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .container {
            max-width: 1000px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .card {
            background-color: var(--surface);
            border-radius: 12px;
            padding: 24px;
            box-shadow: 0 4px 16px rgba(0,0,0,0.05);
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .card-header h2 {
            font-size: 22px;
            color: var(--text);
        }

        .btn-primary {
            background-color: var(--primary);
            color: white;
            padding: 10px 16px;
            border: none;
            border-radius: 8px;
            font-weight: bold;
            text-decoration: none;
            transition: 0.3s;
        }

        .btn-primary:hover {
            background-color: var(--primary-hover);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th, td {
            padding: 14px 12px;
            text-align: center;
            border-bottom: 1px solid #e5e7eb;
        }

        th {
            background-color: var(--primary);
            color: white;
            font-size: 14px;
            text-transform: uppercase;
        }

        tr:nth-child(even) {
            background-color: #f9fafb;
        }

        tr:hover {
            background-color: #f1f5f9;
        }

        .aksi a {
            text-decoration: none;
            padding: 8px 12px;
            border-radius: 6px;
            color: white;
            font-weight: 500;
            margin: 0 3px;
            font-size: 14px;
            display: inline-block;
            transition: 0.2s;
        }

        .edit {
            background-color: var(--success);
        }

        .edit:hover {
            background-color: var(--success-hover);
        }

        .hapus {
            background-color: var(--danger);
        }

        .hapus:hover {
            background-color: var(--danger-hover);
        }

        @media (max-width: 768px) {
            .card-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }

            th, td {
                font-size: 13px;
                padding: 10px 6px;
            }

            .btn-primary {
                width: 100%;
                text-align: center;
            }
        }
    </style>
</head>

<body>

<header>
    Sistem Informasi Mahasiswa
</header>

<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Daftar Mahasiswa</h2>
            <a href="tambah.php" class="btn-primary">+ Tambah Mahasiswa</a>
        </div>

        <table>
            <tr>
                <th>No</th>
                <th>NPM</th>
                <th>Nama</th>
                <th>Program Studi</th>
                <th>Email</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>

            <?php
            include "koneksi.php";
            $query = mysqli_query($conn, "SELECT * FROM tbl_mahasiswa");
            $no = 1;

            while ($data = mysqli_fetch_array($query)) {
                echo "<tr>
                        <td>$no</td>
                        <td>{$data['npm']}</td>
                        <td>{$data['nama']}</td>
                        <td>{$data['prodi']}</td>
                        <td>{$data['email']}</td>
                        <td>{$data['alamat']}</td>
                        <td class='aksi'>
                            <a class='edit' href='edit.php?npm={$data['npm']}'>Edit</a>
                            <a class='hapus' href='hapus.php?npm={$data['npm']}' onclick=\"return confirm('Yakin ingin menghapus data ini?')\">Hapus</a>
                        </td>
                      </tr>";
                $no++;
            }
            ?>
        </table>
    </div>
</div>

</body>
</html>
