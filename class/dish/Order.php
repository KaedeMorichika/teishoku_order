<?php


namespace dish;


class Order
{
    private ?int $id;
    private int $user_id;
    private int $dish_id;
    private int $dish_num;
    private array $options; /* ここを複雑にしない方が良さそうなので、ただの連想配列で */
    private ?int $created;
    private ?int $updated;

    public function __construct(?int $id, int $user_id, int $dish_id, int $dish_num, ?int $created, ?int $updated)
    {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->dish_id = $dish_id;
        $this->dish_num = $dish_num;
        $this->options = [];
        $this->created = $created;
        $this->updated = $created;
    }

    public function save(\PDO $dbh)
    {
        try {
            $dbh->beginTransaction();
            if (empty($this->id)) {
                $this->id = $this->insertOrder($dbh);
                $result = $this->insertOrderOptions($dbh);
            }
            $dbh->commit();
            return $result;
        } catch (\PDOException $e) {
            $dbh->rollBack();
            return false;
        }
    }

    private function insertOrder(\PDO $dbh)
    {
        $sql = '
            INSERT INTO orders
            (`user_id`, `dish_id`, `dish_num`, `created`, `updated`)
            VALUES (:user_id, :dish_id, :dish_num, :created, :updated)
            ';

        $param = [
            'user_id' => $this->user_id,
            'dish_id' => $this->dish_id,
            'dish_num' => $this->dish_num,
            'created' => time(),
            'updated' => time()
        ];

        $stmt = $dbh->prepare($sql);
        $result = $stmt->execute($param);

        return $dbh->lastInsertId();
    }

    private function insertOrderOptions(\PDO $dbh)
    {
        $sql = '
            INSERT INTO order_options
            (`order_id`, `option_id`, `option_num`, `created`, `updated`)
            VALUES(:order_id, :option_id, :option_num, :created, :updated)
            ';
        $insert = [];
        $param = [];
        foreach ($this->options as $key =>$option) {
            if (!empty($option)) {
                $insert[] = '(:order_id'.$key.', option_id'.$key.', option_num'.$key.', created'.$key.', updated'.$key.')';
                $param = array_merge($param, [
                    'order_id'.$key => $this->id,
                    'option_id'.$key => $option['option_id'],
                    'option_num'.$key => $option['option_num'],
                    'created'.$key => time(),
                    'updated'.$key => time()
                ]);
            }
        }
        if (!empty($insert)) {
            $sql .= implode(',', $insert);
            $stmt = $dbh->prepare($sql);
            return $stmt->execute($param);
        }
    }

    public function addOptionFromAssoc(int $option_id, $option_num)
    {
        $this->options[] = [
            'option_id' => $option_id,
            'option_num' => $option_num
        ];
    }
}