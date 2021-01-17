<?php


namespace dish;


class Order
{
    private ?int $id;
    private int $user_id;
    private int $dish_id;
    private int $dish_num;
    private ?int $created;
    private ?int $updated;

    public function __construct(?int $id, int $user_id, int $dish_id, int $dish_num, ?int $created, ?int $updated)
    {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->dish_id = $dish_id;
        $this->dish_num = $dish_num;
        $this->created = $created;
        $this->updated = $created;
    }

    public function save(\PDO $dbh)
    {
        if (empty($this->id)) {
            $result = $this->insert($dbh);
        }
        return $result;
    }

    private function insert(\PDO $dbh)
    {
        try {
            $sql = '
        INSERT INTO orders
        (`user_id`, `dish_id`, `dish_num`, `created`, `updated`)
        VALUES (:user_id, :dish_id, :dish_num, :created, :updated)
        ';

            $created = !empty($this->created) ? $this->created : time();
            $updated = !empty($this->updated) ? $this->updated : time();

            $param = [
                'user_id' => $this->user_id,
                'dish_id' => $this->dish_id,
                'dish_num' => $this->dish_num,
                'created' => $created,
                'updated' => $updated
            ];

            $stmt = $dbh->prepare($sql);
            $result = $stmt->execute($param);

            return $result;
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }
}