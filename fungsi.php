<?php

$koneksi = mysqli_connect("localhost", "root", "", "nidweekly_bti");

// Cek koneksi
if (!$koneksi) {
    die("Koneksi gagal : " . mysqli_connect_error());
}

function tampildata($query)
{
    global $koneksi;

    $result = mysqli_query($koneksi, $query);

    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}
?>