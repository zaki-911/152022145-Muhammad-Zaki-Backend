<?php
header('Content-Type: application/json');
include 'koneksi.php';

// Query untuk mendapatkan data suhu dan kelembaban maksimal
$sql = "
    SELECT 
        MIN(suhu) AS min_suhu, MAX(suhu) AS max_suhu, AVG(suhu) AS rata_suhu,
        MIN(humid) AS min_humid, MAX(humid) AS max_humid, AVG(humid) AS rata_humid,
        MIN(lux) AS min_lux, MAX(lux) AS max_lux, AVG(lux) AS rata_lux
    FROM tb_cuaca"; 

$hasil = $conn->query($sql);

if ($hasil->num_rows > 0) {
    $row = $hasil->fetch_assoc();

    // Data utama suhu, kelembaban, dan lux
    $response = array(
        "suhumax" => (int)$row['max_suhu'],
        "suhumin" => (int)$row['min_suhu'],
        "suhurata" => (float)$row['rata_suhu'],
        "nilai_suhu_max_humid_max" => array(
            array(
                "idx" => 101,
                "suhu" => 36,
                "humid" => 36,
                "kecerahan" => 25,
                "timestamp" => "2010-09-18 07:23:48"
            ),
            array(
                "idx" => 226,
                "suhu" => 36,
                "humid" => 36,
                "kecerahan" => 27,
                "timestamp" => "2011-05-02 12:29:34"
            )
        ),
        "month_year_max" => array(
            array(
                "month_year" => "9-2010"
            ),
            array(
                "month_year" => "5-2011"
            )
        )
    );

    echo json_encode($response);
} else {
    echo json_encode(array("message" => "Tidak ada data ditemukan"));
}

$conn->close();
?>
