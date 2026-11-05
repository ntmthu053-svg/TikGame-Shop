<?php
header('Content-Type: application/json');

$code = $_GET['code'] ?? '';
$file = 'paid_orders.json';

if (file_exists($file)) {
    $paidOrders = json_decode(file_get_contents($file), true) ?: [];
    if (in_array(strtoupper($code), $paidOrders)) {
        echo json_encode(["paid" => true]);
        exit;
    }
}

echo json_encode(["paid" => false]);
?>
