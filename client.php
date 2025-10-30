<?php
$serverUrl = "http://localhost:8000/api"; // change to your Laravel server
$localFile = __DIR__ . "/file_to_download.txt"; // 100MB file example

// Register client
$ch = curl_init("$serverUrl/register-client");
curl_setopt_array($ch, [
    CURLOPT_POST => true,
    CURLOPT_RETURNTRANSFER => true,
]);
$response = curl_exec($ch);
curl_close($ch);
$data = json_decode($response, true);
$clientId = $data['client_id'];
echo "Registered as $clientId\n";

while (true) {
    sleep(30);
    $status = file_get_contents("$serverUrl/status/$clientId");
    $info = json_decode($status, true);

    if ($info['command'] === 'upload_file') {
        echo "Server requested upload...\n";
        $curl = curl_init();
        $cfile = new CURLFile($localFile, 'application/octet-stream', basename($localFile));
        curl_setopt_array($curl, [
            CURLOPT_URL => "$serverUrl/upload-file/$clientId",
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => ['file' => $cfile],
            CURLOPT_RETURNTRANSFER => true,
        ]);
        $resp = curl_exec($curl);
        curl_close($curl);
        echo "File uploaded. Server response: $resp\n";
    }
}
