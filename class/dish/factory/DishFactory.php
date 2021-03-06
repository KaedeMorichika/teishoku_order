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
        $this->options = [];
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
            $this->dish = new Dish($dish['id'], $dish['name'], $dish['price'], $dish['info'], $dish['created'], $dish['updated']);
            $categories = $this->getCategoriesById($id);

            if (!empty($categories)){
                foreach ($categories as $key => $category_id) {
                    $this->optionFactory->makeFromCategoryId($category_id);
                    $this->options = array_merge($this->options, $this->optionFactory->getProduct());
                }
            }
            $this->dish->setOptions($this->options);
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

    /**
     * @param int $dish_id
     * @return array
     */
    private function getCategoriesById(int $dish_id)
    {
        try {
            $dbh = SingletonPDO::connect();

            $sql = '
            SELECT category.id FROM category
            LEFT JOIN relate_dish_category
            ON category.id = relate_dish_category.category_id
            WHERE relate_dish_category.dish_id = :dish_id
            ';

            $param = [
                'dish_id' => $dish_id
            ];

            $stmt = $dbh->prepare($sql);
            $stmt->execute($param);

            return $stmt->fetchAll(\PDO::FETCH_COLUMN);

        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

}