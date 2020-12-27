<?php


namespace dish;


class Dish
{
    public int $id;
    public string $name;
    public int $price;
    public int $mainCategoryId;
    public string $info;
    public int $created;
    public int $updated;

    public function __construct(int $id, string $name, int $price, int $main_category_id, string $info, int $created, int $updated)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->mainCategoryId = $main_category_id;
        $this->info = $info;
        $this->created = $created;
        $this->updated = $updated;
    }
}