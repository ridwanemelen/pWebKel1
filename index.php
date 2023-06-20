<?php
include('koneksi.php');

// Menghitung total pengeluaran
$sqlPengeluaran = "SELECT SUM(nominal) AS total_pengeluaran FROM pengeluaran";
$queryPengeluaran = mysqli_query($conn, $sqlPengeluaran);
$rowPengeluaran = mysqli_fetch_assoc($queryPengeluaran);
$totalPengeluaran = $rowPengeluaran['total_pengeluaran'];

// Menghitung total pemasukan
$sqlPemasukan = "SELECT SUM(nominal) AS total_pemasukan FROM pemasukan";
$queryPemasukan = mysqli_query($conn, $sqlPemasukan);
$rowPemasukan = mysqli_fetch_assoc($queryPemasukan);
$totalPemasukan = $rowPemasukan['total_pemasukan'];
?>

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

<!-- STATUS INCOME AND DEBIT -->
    <div class="container">
        <div class="row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title" style="text-align: right;">Pengeluaran</h6>
                        <p>Rp<?php echo number_format($totalPengeluaran, 2, ',', '.'); ?></p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title" style="text-align: right;">Pemasukan</h6>
                        <p>Rp<?php echo number_format($totalPemasukan, 2, ',', '.'); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- AKHIR STATUS INCOME AND DEBIT -->

    <div id="wrapperMutasi">
    <!-- TABEL MUTASI PENGELUARAN -->
            <div id="container-tabel-mutasi">
                <p style="margin-left: 40px; text-align: center;"><strong>MUTASI PENGELUARAN</strong></p>
                
                <div id="tabel-mutasi-beranda">
                    
                    <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tanggal</th>
                                    <th>Catatan</th>
                                    <th>Nominal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include('koneksi.php');
                                $sql = "SELECT * FROM pengeluaran";                        
                                $query = mysqli_query($conn, $sql);
                                $no = 0;
                                while ($row = mysqli_fetch_array($query)) {
                                    echo "<tr>";
                                    $no++;
                                    echo "<td>" . $no . "</td>";
                                    echo "<td>" . $row['tanggal'] . "</td>";
                                    echo "<td>" . $row['catatan'] . "</td>";
                                    echo "<td>" . $row['nominal'] . "</td>";
                                    echo "</tr>";
                                } ?>
                            </tbody>
                    </table>
                </div>    
            </div>
            <br>
    <!-- AKHIR TABEL MUTASI PENGELUARAN -->

    <!-- TABEL MUTASI PEMASUKAN -->
            <div id="container-tabel-mutasi">
                <p style="margin-left: 40px; text-align: center;"><strong>MUTASI PEMASUKANN</strong></p>
                <div id="tabel-mutasi-beranda">
                    <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tanggal</th>
                                    <th>Catatan</th>
                                    <th>Nominal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include('koneksi.php');
                                $sql = "SELECT * FROM pemasukan";                        
                                $query = mysqli_query($conn, $sql);
                                $no = 0;
                                while ($row = mysqli_fetch_array($query)) {
                                    echo "<tr>";
                                    $no++;
                                    echo "<td>" . $no . "</td>";
                                    echo "<td>" . $row['tanggal'] . "</td>";
                                    echo "<td>" . $row['catatan'] . "</td>";
                                    echo "<td>" . $row['nominal'] . "</td>";
                                    echo "</tr>";
                                } ?>
                            </tbody>
                        </table>
                </div>    
            </div>
    <!-- AKHIR TABEL MUTASI PEMASUKAN -->
    </div>

    <div class="navbar">
        <a href="index.php" class="active">Home</a>
        <a href="mutasi.php">Mutasi</a>
        <a href="grafik.php">Grafik</a>
        <a href="update.php">Update</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>