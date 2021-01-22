<?php


namespace dish;


class Option
{
    public int $id;
    public string $name;
    public int $price;
    public int $category_id;
    public int $created;
    public int $updated;

    public function __construct(int $id, string $name, int $price, int $category_id, int $created, int $updated)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->category_id = $category_id;
        $this->created = $created;
        $this->updated = $updated;
    }

}