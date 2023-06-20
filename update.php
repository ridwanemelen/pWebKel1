<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="main.css">
</head>
<body>
<!-- INI HEADER WEB -->
    <div>
        <header id="header">
            <div class="container-date">
                <?php
                date_default_timezone_set('Asia/Jakarta');
                $today = date("F j, Y || g:i a");
                echo $today;
                ?>
            </div>
            <div class="tag_judul">
                    <strong>MONEY LOVER APP</strong>
            </div>
        </header>
    </div>
<!--AKHIR HEADER -->

    <div id="containerForm">
        <h2>Update Pemasukan atau Pengeluaran</h2>
        <form action="proses_update.php" method="POST">
            <div class="mb-3">
                <label for="jenis">Jenis:</label>
                <select name="jenis" id="jenis">
                    <option value="pemasukan">Pemasukan</option>
                    <option value="pengeluaran">Pengeluaran</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="tanggal">Tanggal:</label>
                <input type="date" name="tanggal" id="tanggal" required>
            </div>
            <div class="mb-3">
                <label for="catatan">Catatan:</label>
                <input type="text" name="catatan" id="catatan" required>
            </div>
            <div class="mb-3">
                <label for="nominal">Nominal:</label>
                <input type="number" name="nominal" id="nominal" required>
            </div>
            <button type="submit" class="btn btn-primary">Tambahkan</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>


    <div class="navbar">
        <a href="index.php">Home</a>
        <a href="mutasi.php">Mutasi</a>
        <a href="grafik.php">Grafik</a>
        <a href="update.php" class="active">Update</a>
    </div>
</body>
</html>