<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MONEY LOVER APP - Update</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="main.css">
</head>

<body>
    <div class="container">
        <h2>Proses Update</h2>

        <?php
        include('koneksi.php');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $jenis = $_POST['jenis'];
            $tanggal = $_POST['tanggal'];
            $catatan = $_POST['catatan'];
            $nominal = $_POST['nominal'];

            // Simpan data ke database sesuai jenis (pemasukan atau pengeluaran)
            if ($jenis === 'pemasukan') {
                $stmt = $conn->prepare("INSERT INTO pemasukan (tanggal, catatan, nominal) VALUES (?, ?, ?)");
            } elseif ($jenis === 'pengeluaran') {
                $stmt = $conn->prepare("INSERT INTO pengeluaran (tanggal, catatan, nominal) VALUES (?, ?, ?)");
            }

            $stmt->bind_param("ssi", $tanggal, $catatan, $nominal);

            if ($stmt->execute()) {
                echo '<div class="alert alert-success" role="alert">Data berhasil ditambahkan.</div>';
                echo '<a href="index.php" class="btn btn-primary">Kembali ke Home</a>';
            } else {
                echo '<div class="alert alert-danger" role="alert">Terjadi kesalahan: ' . $stmt->error . '</div>';
                echo '<a href="index.php" class="btn btn-primary">Kembali ke Home</a>';
            }

            $stmt->close();
            $conn->close();
        }
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>
