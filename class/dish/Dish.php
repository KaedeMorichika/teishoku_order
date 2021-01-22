<?php


namespace dish;


class Dish
{
    public int $id;
    public string $name;
    public int $price;
    public string $info;
    public array $options; /* @var $options Option[]*/
    public int $created;
    public int $updated;

    /**
     * Dish constructor.
     * @param int $id
     * @param string $name
     * @param int $price
     * @param string $info
     * @param int $created
     * @param int $updated
     */
    public function __construct(int $id, string $name, int $price, string $info, int $created, int $updated)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->info = $info;
        $this->created = $created;
        $this->updated = $updated;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getPrice(): int
    {
        return $this->price;
    }

    /**
     * @return string
     */
    public function getInfo(): string
    {
        return $this->info;
    }

    /**
     * @return array
     */
    public function getOptions(): array
    {
        return $this->options;
    }

    /**
     * @param Option[] $options
     */
    public function setOptions(array $options): void
    {
        $this->options = $options;
    }

    /**
     * @return int
     */
    public function getCreated(): int
    {
        return $this->created;
    }

    /**
     * @return int
     */
    public function getUpdated(): int
    {
        return $this->updated;
    }
}