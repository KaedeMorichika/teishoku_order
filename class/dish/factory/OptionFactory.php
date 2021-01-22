<?php

namespace dish\factory;

use auth\SingletonPDO;
use dish\Option;
use dish\factory\Factory;

class OptionFactory extends Factory
{
    public array $options; /* @var Option[] */

    public function makeFromCategoryId(int $category_id)
    {
        $option_assocs = $this->getByCategoryId($category_id);

        if (!empty($option_assocs)) {
            foreach ($option_assocs as $key => $option_assoc) {
                $this->options[] = new Option($option_assoc['id'], $option_assoc['name'], $option_assoc['price'],
                    $option_assoc['category_id'], $option_assoc['created'], $option_assoc['updated']);
            }
        }
    }

    /**
     * @param int $category_id
     * @return array
     */
    private function getByCategoryId(int $category_id)
    {
        try {
            $dbh = SingletonPDO::connect();

            $sql = '
            SELECT * FROM option_menu
            WHERE category_id = :category_id
            ';

            $param = [
                'category_id' => $category_id
            ];

            $stmt = $dbh->prepare($sql);
            $stmt->execute($param);

            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            $e->getMessage();
        }
    }

    public function getProduct()
    {
        return $this->options;
    }

    public function makeFromId(int $id)
    {
        // TODO: Implement makeFromId() method.
    }
}