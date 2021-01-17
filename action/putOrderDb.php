<?php
use auth\SingletonPDO;
use dish\factory\OrderFactory;

$data = json_decode(file_get_contents('php://input'), true);

if (!empty($data['user_id'])) {

    $dbh = SingletonPDO::connect();
    $user_id = $data['user_id'];
    $orders = json_decode($data['orders']);
    $response = 'success';

    foreach ($orders as $key => $order) {

        $order->user_id = $user_id;
        $order_factory = new OrderFactory();
        $order_factory->makeFromStdObject($order);
        $order = $order_factory->getProduct();
        $result = $order->save($dbh);

        if (! $result) {
            $response = 'failed';
            break;
        }
    }
}

echo $response;