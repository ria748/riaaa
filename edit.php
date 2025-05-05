<?php
include "koneksi.php";

if (isset($_GET['npm'])) {
    $npm = $_GET['npm'];
    $query = mysqli_query($conn, "SELECT * FROM tbl_mahasiswa WHERE npm='$npm'");
    $data = mysqli_fetch_assoc($query);
} else {
    echo "<script>alert('NPM tidak ditemukan'); window.location.href='index.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Mahasiswa</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f4faff;
            margin: 0;
            padding: 0;
        }

        h3, p {
            text-align: center;
            margin-bottom: 20px;
            color: #003366;
        }

        form {
            max-width: 500px;
            margin: 40px auto;
            background-color: #ffffff;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.05);
            box-sizing: border-box;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            margin-bottom: 16px;
        }

        label {
            margin-bottom: 6px;
            font-weight: 500;
            color: #333;
        }

        input[type="text"],
        input[type="email"],
        textarea,
        select {
            width: 100%;
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box;
        }

        .form-actions {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .form-actions input,
        .form-actions a.button {
            padding: 10px 20px;
            font-size: 14px;
            border-radius: 6px;
            text-decoration: none;
            text-align: center;
            cursor: pointer;
        }

        input[type="submit"] {
            background-color: #007BFF;
            border: none;
            color: white;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        a.button {
            background-color: #6c757d;
            color: white;
        }

        a.button:hover {
            background-color: #5a6268;
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
        }

        .back-link a {
            text-decoration: none;
            color: white;
            background-color: #007BFF;
            padding: 10px 18px;
            border-radius: 6px;
            display: inline-block;
        }

        .back-link a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <form action="" method="post">
        <h3>Edit Data Mahasiswa</h3>

        <div class="form-group">
            <label for="npm">NPM:</label>
            <input type="text" name="npm" id="npm" value="<?= $data['npm'] ?>" readonly>
        </div>

        <div class="form-group">
            <label for="nama">Nama:</label>
            <input type="text" name="nama" id="nama" value="<?= $data['nama'] ?>" required>
        </div>

        <div class="form-group">
            <label for="prodi">Program Studi:</label>
            <select name="prodi" id="prodi" required>
                <option value="">--Pilih Prodi--</option>
                <?php
                $prodi_list = ["Pendidikan Informatika", "Teknologi Informasi", "Sistem Informasi", "Teknik Komputer", "Teknik Informatika"];
                foreach ($prodi_list as $p) {
                    $selected = ($p == $data['prodi']) ? "selected" : "";
                    echo "<option value='$p' $selected>$p</option>";
                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="<?= $data['email'] ?>">
        </div>

        <div class="form-group">
            <label for="alamat">Alamat:</label>
            <textarea name="alamat" id="alamat" rows="3"><?= $data['alamat'] ?></textarea>
        </div>

        <div class="form-actions">
            <input type="submit" name="update" value="Update Data">
            <a href="index.php" class="button">Batal</a>
        </div>
    </form>

    <div class="back-link">
        <a href="index.php">← Kembali ke Daftar Mahasiswa</a>
    </div>

    <?php
    if (isset($_POST['update'])) {
        $nama = $_POST['nama'];
        $prodi = $_POST['prodi'];
        $email = $_POST['email'];
        $alamat = $_POST['alamat'];

        $update = mysqli_query($conn, "UPDATE tbl_mahasiswa SET 
        nama='$nama',
        prodi='$prodi',
        email='$email',
        alamat='$alamat' 
        WHERE npm='$npm'");

        if ($update) {
            echo "<script>alert('Data berhasil diperbarui'); window.location.href='index.php';</script>";
        } else {
            echo "<script>alert('Data gagal diperbarui');</script>";
        }
    }
    ?>

</body>
</html>
