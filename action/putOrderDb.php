<?php
use auth\SingletonPDO;
use dish\factory\OrderFactory;

$data = json_decode(file_get_contents('php://input'), true);
echo ($data);
if (!empty($data['id'])) {

    $dbh = SingletonPDO::connect();
    $id = $data['id'];
    $orders = $data['orders'];
    $response = 'success';

    foreach ($orders as $key => $order) {

        $order->id = $id;
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