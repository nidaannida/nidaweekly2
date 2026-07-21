<?php

$koneksi = mysqli_connect("localhost", "root", "", "nidweekly-bti");

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

function hapusdata($id)
{
    global $koneksi;

    mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE id = $id");

    return mysqli_affected_rows($koneksi);
}
?>