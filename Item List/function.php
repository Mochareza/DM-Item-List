<?php
// Koneksi Database
$servername= "localhost";
$username = "root";
$password = "";
$dbname = "item_list";

$koneksi = mysqli_connect("localhost", "root", "", "item_list");

if ($koneksi->connect_error){
    die ("Connection failed: " . koneksi->connect_error);
}

// membuat fungsi query dalam bentuk array
function query($query)
{
    // Koneksi database
    global $koneksi;

    $result = mysqli_query($koneksi, $query);

    // membuat varibale array
    $rows = [];

    // mengambil semua data dalam bentuk array
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

// Membuat fungsi tambah
function tambah($data)
{
    global $koneksi;

    $code = htmlspecialchars($data['code']);
    $nama = htmlspecialchars($data['nama']);
    $deskrpsi= htmlspecialchars($data['deskripsi']);
    


    $sql = "INSERT INTO item(code, nama, deskripsi ) VALUES ('$code','$nama','$deskripsi')";

    mysqli_query($koneksi, $sql);

    return mysqli_affected_rows($koneksi);
}

// Membuat fungsi hapus
function hapus($code)
{
    global $koneksi;

    mysqli_query($koneksi, "DELETE FROM item WHERE code = $code");
    return mysqli_affected_rows($koneksi);
}

// Membuat fungsi ubah
function ubah($data)
{
    global $koneksi;

    $nama = htmlspecialchars($data['nama']);
    $deskripsi = htmlspecialchars($data['deskripsi']);
    $code = htmlspecialchars($data['code']);


    $sql = "UPDATE item SET nama = '$nama', deskripsi = '$deskripsi' WHERE code = $code";

    mysqli_query($koneksi, $sql);

    return mysqli_affected_rows($koneksi);
}

