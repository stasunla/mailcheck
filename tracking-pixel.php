<?php
// Отправляем GA Measurement Protocol
$url = "https://www.google-analytics.com/mp/collect?measurement_id=G-S99DYBDT18&api_secret=c7jDPHO0S4-2godLuOGJoA";

$data = [
  "client_id" => uniqid(),
  "events" => [
    [
      "name" => "email_opened",
      "params" => []
    ]
  ]
];

$options = [
  'http' => [
    'header'  => "Content-type: application/json",
    'method'  => 'POST',
    'content' => json_encode($data)
  ]
];

$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);

// Отдаём пиксель
header("Content-Type: image/png");
readfile("tracking-pixel.png");
