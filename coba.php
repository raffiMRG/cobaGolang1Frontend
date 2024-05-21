<?php 
function delete($path, $data){
    $url = $path;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    $result = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    return $result;
}

$setData = [
  'nim' => '231011400005'
];

$setPath = 'http://localhost:1211/api/ListMahasiswa/DeleteData';

$result = delete($setPath, $setData);
var_dump($result);
?>