<?php

use auth\SingletonPDO;
use dish¥factory\DishFactory;

function get_all_dishes() {

    $dbh = SingletonPDO::connect();

    $sql = 'SELECT id FROM dish';

    $stmt = $dbh->prepare($sql);
    $stmt->execute();

    $dish_ids = $stmt->fetchAll(PDO::FETCH_COLUMN);

    $dishes = [];

    foreach ($dish_ids as $dish_id) {

        $dish_factory = new DishFactory();
        $dish_factory->makeFromId($dish_id);
        $dishes[] = $dish_factory->getProduct();
    }

    return $dishes;
}