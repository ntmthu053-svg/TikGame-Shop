<?php
// sepay_webhook.php
header('Content-Type: application/json');

$input = file_get_contents('php://input');
$data = json_decode($input, true);

if (!$data) {
    http_response_code(400);
    echo json_encode(["success" => false, "message" => "Dữ liệu không hợp lệ"]);
    exit;
}

$content = $data['content'] ?? '';

if (preg_match('/DH[0-9]{6}/i', $content, $matches)) {
    $orderCode = strtoupper($matches[0]);
    $file = 'paid_orders.json';
    $paidOrders = file_exists($file) ? json_decode(file_get_contents($file), true) : [];
    
    if (!in_array($orderCode, $paidOrders)) {
        $paidOrders[] = $orderCode;
        file_put_contents($file, json_encode($paidOrders));
    }

    http_response_code(200);
    echo json_encode(["success" => true, "message" => "Duyệt đơn $orderCode thành công"]);
} else {
    http_response_code(200);
    echo json_encode(["success" => false, "message" => "Không có mã đơn"]);
}
?>
