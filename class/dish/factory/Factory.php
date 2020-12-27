<?php


namespace dish¥factory;

use auth\SingletonPDO;

abstract class Factory
{
    abstract public function getProduct();
    abstract public function makeFromId(int $id);
}