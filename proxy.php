<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

if (isset($_GET['user']) && isset($_GET['key'])) {
    $user = $_GET['user'];
    $key = $_GET['key'];
    
    // NovaLink API URL
    $url = "https://usageapi.novalink.lk:5003/usage?user=" . urlencode($user) . "&key=" . urlencode($key);
    
    // cURL භාවිතයෙන් දත්ත ලබා ගැනීම
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // SSL error මගහැරීමට
    
    $response = curl_exec($ch);
    curl_close($ch);
    
    echo $response;
} else {
    echo json_encode(["success" => false, "message" => "Missing parameters"]);
}
?>
