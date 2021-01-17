<?php
use auth\SingletonPDO;

$data = json_decode(file_get_contents('php://input'), true);

if (!empty($data['id'])) {

    $dbh = SingletonPDO::connect();
    $id = $data['id'];


}