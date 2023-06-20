<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MONEY LOVER</title>
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


    <div id="wrapperMutasi">
    <!-- TABEL MUTASI PENGELUARAN -->
            <div id="container-tabel-mutasiMutasi">
                <p style="margin-left: 40px; justify-content: center;"><strong>MUTASI PEMASUKAN</strong></p>
                
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
            <div id="container-tabel-mutasiMutasi">
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
        <a href="index.php">Home</a>
        <a href="mutasi.php" class="active">Mutasi</a>
        <a href="grafik.php">Grafik</a>
        <a href="update.php">Update</a>
    </div>
</body>

</html>