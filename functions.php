<?php
function callAPI($method, $url, $data = false)
{
    $curl = curl_init();

    switch ($method) {
        case "POST":
            curl_setopt($curl, CURLOPT_POST, 1);
            if ($data)
                curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
            break;
        case "PUT":
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
            if ($data)
                curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
            break;
        case "DELETE":
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
            if ($data)
                curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
            break;
        case "GET":
            // Untuk GET, tambahkan data ke URL jika ada data yang dikirim
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
            if ($data)
                curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
            break;
        default:
            // Tambahkan handling untuk metode yang tidak dikenali jika perlu
            break;
    }

    // Set opsi umum untuk cURL
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
    ]);

    // Eksekusi permintaan cURL dan ambil responnya
    $result = curl_exec($curl);

    // Cek jika ada kesalahan
    if (curl_errno($curl)) {
        echo 'Curl error: ' . curl_error($curl);
    }

    // Tutup sesi cURL
    curl_close($curl);

    return $result;
}

// Contoh penggunaan
// $url = "https://example.com/api/endpoint";
// $data = ["param1" => "value1", "param2" => "value2"];

// Untuk GET request
// $response = callAPI("GET", $url, $data);
// echo "Response: " . $response;
?>
