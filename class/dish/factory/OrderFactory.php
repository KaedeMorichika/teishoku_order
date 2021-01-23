<?php


namespace dish\factory;

use auth\SingletonPDO;
use dish\factory\Factory;
use dish\Order;

class OrderFactory extends Factory
{
    private Order $order;

    public function makeFromStdObject(Object $std_object)
    {
        $this->makeProduct($std_object->id, $std_object->user_id, $std_object->dish_id, $std_object->dish_num);
        if (!empty($std_object->dish_options)) {
            foreach ($std_object->dish_options as $key => $dish_option) {
                $this->order->addOptionFromAssoc($dish_option->id, $dish_option->option_num);
            }
        }
    }

    private function makeProduct(?int $id, int $user_id, int $dish_id, int $dish_num, ?int $created = null, ?int $updated = null)
    {
        $this->order = new Order($id, $user_id, $dish_id, $dish_num, $created, $updated);
    }

    public function getProduct()
    {
        return $this->order;
    }

    public function makeFromId(int $id)
    {

    }
}