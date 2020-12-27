<?php
use duncan3dc\Laravel\Blade;

require_once 'action/dish_utils.php';

$dishes = get_all_dishes();

Blade::composer('dishes', $dishes);
Blade::addPath('view');
echo Blade::render($action, [
    'dishes' => $dishes
]);
