<?php

namespace App;

use App\Models\MagicTraitModels;

abstract class Model
{
    use MagicTraitModels;

    public $id;

    public static function findAll()
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::$table;
        return $db->query($sql, [], static::class);
    }

    public static function countAll()
    {
        $db = new Db();
        $sql = 'SELECT COUNT(*) AS num FROM ' . static::$table;
        return (int)$db->query($sql, [], static::class)[0]->num;
    }

    /**
     * @return static
     */
    public static function findById($id)
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE id = :id';
        $query_res = $db->query($sql, [':id' => $id], static::class);
        if (empty($query_res)) {
            return false;
        } else {
            return $query_res[0];
        }
    }

    public function update()
    {
        $sets = [];
        $data = [];
        foreach ($this as $key => $value) {
            $data[':' . $key] = $value;
            if ('id' == $key) {
                continue;
            }
            $sets[] = $key . '=:' . $key;
        }
        $db = new Db();
        $sql = 'UPDATE ' . static::$table . ' 
        SET ' . implode(',', $sets) . ' 
        WHERE id=:id';
        return $db->execute($sql, $data);
    }

    public function insert()
    {
        $sets = [];
        $ph_sets = [];
        $data = [];

        foreach ($this as $key => $value) {
            if ('id' == $key) {
                continue;
            }
            $ph_sets[] = ':' . $key;
            $sets[] = $key;
            $data[':' . $key] = $value;
        }

        $db = new Db();
        $sql = 'INSERT INTO ' . static::$table . '
        (' . implode(',', $sets) . ') VALUES (' . implode(',', $ph_sets) . ')';
        return $db->execute($sql, $data);
    }

    public function save()
    {
        if (is_null($this->id)) {
            $this->insert();
            return $this;
        } else {
            return $this->update();
        }
    }

    public function isNew()
    {
        return null === $this->id;
    }

    public function fill($data)
    {
        $me = new MultiException();
        foreach ($data as $key => $value) {
            $validator = 'validate' . ucfirst($key);
            if (method_exists($this, $validator)) {
                $res = $this->$validator($value);
                if (false === $res) {
                    $me->add(new \Exception('Поле ' . $key . ' не корректно!'));
                    continue;
                }
            }
            $this->$key = $value;
        }

        if (!$me->isEmpty()) {
            throw $me;
        }

        return true;
    }

    public function delete(): bool
    {
        $db = new Db();
        $sql = 'DELETE FROM ' . static::$table . ' 
        WHERE id = :id';

        if (is_null($this->id)) {
            return false;
        } else {
            return $db->execute($sql, [':id' => $this->id]);
        }
    }
}