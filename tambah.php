<!DOCTYPE html>
<html>

<head>
    <title>Form Tambah Data Mahasiswa</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f1f5f9;
            margin: 0;
            padding: 0;
        }

        h3 {
            text-align: center;
            color: #1e293b;
            margin-top: 30px;
        }

        p {
            text-align: center;
            color: #475569;
        }

        form {
            width: 100%;
            max-width: 480px;
            margin: 30px auto;
            padding: 24px;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.05);
            display: flex;
            flex-direction: column;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            margin-bottom: 16px;
        }

        label {
            margin-bottom: 6px;
            font-weight: 500;
        }

        input[type="text"],
        input[type="email"],
        textarea,
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 14px;
        }

        .form-buttons {
            display: flex;
            justify-content: space-between;
            gap: 10px;
            margin-top: 16px;
        }

        input[type="submit"],
        .btn-cancel {
            padding: 10px 20px;
            font-size: 14px;
            font-weight: bold;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            color: white;
            text-decoration: none;
            width: 48%;
        }

        input[type="submit"] {
            background-color: #2563eb;
        }

        input[type="submit"]:hover {
            background-color: #1d4ed8;
        }

        .btn-cancel {
            background-color: #9ca3af;
        }

        .btn-cancel:hover {
            background-color: #6b7280;
        }

        .back-link {
            text-align: center;
            margin-top: 20px;
        }

        .back-link a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #3b82f6;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            transition: background-color 0.3s ease;
        }

        .back-link a:hover {
            background-color: #2563eb;
        }
    </style>
</head>

<body>
    <h3>Entry Data Mahasiswa</h3>
    <p>Silakan masukkan data mahasiswa berdasarkan formulir berikut:</p>

    <form action="" method="post">
        <div class="form-group">
            <label for="npm">NPM:</label>
            <input type="text" name="npm" id="npm" maxlength="12" required>
        </div>
        <div class="form-group">
            <label for="nama">Nama:</label>
            <input type="text" name="nama" id="nama" required>
        </div>
        <div class="form-group">
            <label for="prodi">Program Studi:</label>
            <select name="prodi" id="prodi" required>
                <option value="">--Pilih Prodi--</option>
                <option value="Pendidikan Informatika">Pendidikan Informatika</option>
                <option value="Teknologi Informasi">Teknologi Informasi</option>
                <option value="Sistem Informasi">Sistem Informasi</option>
                <option value="Teknik Komputer">Teknik Komputer</option>
                <option value="Teknik Informatika">Teknik Informatika</option>
            </select>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email">
        </div>
        <div class="form-group">
            <label for="alamat">Alamat:</label>
            <textarea name="alamat" id="alamat" rows="3"></textarea>
        </div>
        <div class="form-buttons">
            <input type="submit" name="submit" value="Simpan Data">
            <a href="index.php" class="btn-cancel">Batal</a>
        </div>
    </form>

    <div class="back-link">
        <a href="index.php">← Kembali ke Daftar Mahasiswa</a>
    </div>

    <?php
    if (isset($_POST['submit'])) {
        $npm = $_POST['npm'];
        $nama = $_POST['nama'];
        $prodi = $_POST['prodi'];
        $email = $_POST['email'];
        $alamat = $_POST['alamat'];

        include "koneksi.php";

        $hasil = mysqli_query($conn, "INSERT INTO tbl_mahasiswa (npm, nama, prodi, email, alamat) 
                                      VALUES ('$npm', '$nama', '$prodi', '$email', '$alamat')");

        if ($hasil) {
            echo "<script>alert('Data berhasil disimpan'); window.location.href='index.php';</script>";
        } else {
            echo "<script>alert('Data gagal disimpan');</script>";
        }
    }
    ?>
</body>

</html>
