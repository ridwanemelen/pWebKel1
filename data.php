<?php
// Menghubungkan ke database
include('koneksi.php');

// Query untuk mengambil data pemasukan
$sqlPemasukan = "SELECT tanggal, nominal FROM pemasukan";
$resultPemasukan = mysqli_query($conn, $sqlPemasukan);

// Mengumpulkan data pemasukan dalam array
$pemasukan = [];
while ($row = mysqli_fetch_assoc($resultPemasukan)) {
    $pemasukan[$row['tanggal']] = $row['nominal'];
}

// Query untuk mengambil data pengeluaran
$sqlPengeluaran = "SELECT tanggal, nominal FROM pengeluaran";
$resultPengeluaran = mysqli_query($conn, $sqlPengeluaran);

// Mengumpulkan data pengeluaran dalam array
$pengeluaran = [];
while ($row = mysqli_fetch_assoc($resultPengeluaran)) {
    $pengeluaran[$row['tanggal']] = $row['nominal'];
}

// Menutup koneksi ke database
mysqli_close($conn);

// Menggabungkan data pemasukan dan pengeluaran dalam satu array
$data = [
    'labels' => array_keys($pemasukan + $pengeluaran), // Menggunakan tanggal sebagai label
    'pemasukan' => array_values($pemasukan),
    'pengeluaran' => array_values($pengeluaran)
];

// Mengubah data menjadi format JSON
$jsonData = json_encode($data);

// Mengirim response berupa JSON
header('Content-Type: application/json');
echo $jsonData;
