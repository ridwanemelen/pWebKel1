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

<div>
    <div class="container">
        <h2>Grafik Pemasukan dan Pengeluaran</h2>
        <canvas id="chart"></canvas>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.6.2"></script>
    <script>
        // Mengambil data pemasukan dan pengeluaran dari server
        fetch('data.php')
            .then(response => response.json())
            .then(data => {
                const labels = data.labels;
                const pemasukanData = data.pemasukan;
                const pengeluaranData = data.pengeluaran;

                // Membuat chart dengan menggunakan Chart.js
                const ctx = document.getElementById('chart').getContext('2d');
                const chart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [
                            {
                                label: 'Pemasukan',
                                data: pemasukanData,
                                backgroundColor: 'rgba(75, 192, 192, 0.6)'
                            },
                            {
                                label: 'Pengeluaran',
                                data: pengeluaranData,
                                backgroundColor: 'rgba(255, 99, 132, 0.6)'
                            }
                        ]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            title: {
                                display: true,
                                text: 'Grafik Pemasukan dan Pengeluaran'
                            },
                            legend: {
                                position: 'bottom'
                            }
                        },
                        scales: {
                            x: {
                                beginAtZero: true,
                                title: {
                                    display: true,
                                    text: 'Index'
                                }
                            },
                            y: {
                                beginAtZero: true,
                                title: {
                                    display: true,
                                    text: 'Nominal'
                                }
                            }
                        }
                    }
                });
            });
    </script>
</div>    
    <div class="navbar">
        <a href="index.php">Home</a>
        <a href="mutasi.php">Mutasi</a>
        <a href="grafik.php" class="active">Grafik</a>
        <a href="update.php">Update</a>
    </div>
</body>

</html>