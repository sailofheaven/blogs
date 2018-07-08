<?php

namespace Core;

/**
 * Class Model
 * @package Core
 */
class Model
{
    protected $table;
    public $id;
    public $fields = [];

    /**
     * Model constructor.
     * @param null $id
     */
    public function __construct($id = null)
    {
        $this->set($this->fields);

        if ($id) {
            $this->findByID($id);
        }

        $this->table = $this->table ?? (new \ReflectionClass(get_called_class()))->getShortName();
    }

    /**
     * @return mixed
     */
    public function findAll()
    {
        $query = "SELECT * FROM {$this->table}";
        return DB::query($query)->fetchAll();
    }

    /**
     * @param $id
     * @return $this
     */
    public function findByID($id)
    {
        $query = "SELECT * FROM {$this->table} WHERE ID = :id";

        $data = DB::query($query, ['id' => $id])->fetch();
        $this->set($data);

        return $this;
    }

    /**
     * @param $data
     * @param null $val
     */
    public function set($data, $val = null)
    {
        if (is_array($data)) {
            foreach ($data as $key => $value) {
                if (array_key_exists($key, $this->fields)) {
                    $this->{$key} = $value;
                }
            }
        } else {
            $this->{$data} = $val;
        }
    }

    /**
     * @return $this|Model
     */
    public function save()
    {
        if ($this->id === null) {
            $data = [];
            foreach ($this->fields as $key => $item) {
                $data[$key] = $this->{$key};
            }

            $sql = "INSERT INTO {$this->table}";
            $sql .= " (`" . implode("`, `", array_keys($data)) . "`)";
            $sql .= " VALUES ('" . implode("', '", $data) . "') ";

            $res = DB::query($sql);
            $this->id = DB::getLastInsID();
            return $this;
        } else {
            return $this->update();
        }
    }

    /**
     * @return $this
     */
    public function update()
    {
        $updates = [];
        foreach ($this as $key => $value) {
            if (array_key_exists($key, $this->fields)) {
                $value = "'$value'";
                $updates[] = "{$key} = {$value}";
            }
        }
        $implodeArray = implode(', ', $updates);
        $sql = ("UPDATE {$this->table} WHERE userID={$this->id} SET $implodeArray");
        $res = DB::query($sql);
        return $this;
    }

    /**
     * @return $this
     */
    public function remove()
    {
        $sql = "DELETE FROM {$this->table} WHERE id={$this->id}";
        $res = DB::query($sql);
        return $this;
    }

    /**
     *
     */
    public function validate()
    {

    }
}