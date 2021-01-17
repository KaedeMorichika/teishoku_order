<?php

namespace dish\factory;

use auth\SingletonPDO;
use dish\factory\Factory;
use dish\Dish;

class DishFactory extends Factory
{
    protected Dish $dish;
    protected OptionFactory $optionFactory;
    protected $options;

    public function __construct()
    {
        $this->optionFactory = new OptionFactory();
    }

    public function getProduct()
    {
        if (!empty($this->dish)) {
            return $this->dish;
        }
    }

    /**
     * @param int $id
     */
    public function makeFromId(int $id)
    {
        $dish = self::getByIdFromDB($id);

        if (!empty($dish)) {

            $this->dish = new Dish($dish['id'], $dish['name'], $dish['price'], $dish['main_category_id'], $dish['info'], $dish['created'], $dish['updated']);
        }
    }

    /**
     * @param int $id
     * @return array|bool
     */
    private function getByIdFromDB(int $id)
    {
        try {
            $dbh = SingletonPDO::connect();

            $sql = 'SELECT * FROM dish WHERE id = :id';
            $param = [
                'id' => $id
            ];

            $stmt = $dbh->prepare($sql);
            $stmt->execute($param);

            return $stmt->fetch(\PDO::FETCH_ASSOC);

        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

}