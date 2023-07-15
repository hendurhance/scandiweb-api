<?php

namespace Martian\Scandi\Abstracts;

use Martian\Scandi\Classes\Database;
use Martian\Scandi\Interfaces\ModelInterface;
use PDO;

abstract class BaseModel implements ModelInterface
{
    protected $table;

    protected $primaryKey = 'id';

    protected $fillable = [];

    protected $hidden = [];

    protected $casts = [];

    protected $connection;

    public function __construct()
    {
        $database = new Database();
        $this->connection = $database->connect();
    }

    public function all()
    {
        $columns = implode(', ', $this->fillable);

        $query = $this->connection->prepare("SELECT {$columns} FROM {$this->table}");
        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function find($id)
    {
        $query = $this->connection->prepare("SELECT * FROM {$this->table} WHERE {$this->primaryKey} = :id");
        $query->execute(['id' => $id]);

        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data)
    {
        $columns = implode(', ', array_keys($data));
        $values = implode(', :', array_keys($data));

        $query = $this->connection->prepare("INSERT INTO {$this->table} ({$columns}) VALUES (:{$values})");
        $query->execute($data);

        return $this->find($this->connection->lastInsertId());
    }

    public function update($id, $data)
    {
        $columns = implode(', ', array_keys($data));
        $values = implode(', :', array_keys($data));

        $query = $this->connection->prepare("UPDATE {$this->table} SET {$columns} = :{$values} WHERE {$this->primaryKey} = :id");
        $query->execute(array_merge($data, ['id' => $id]));

        return $this->find($id);
    }

    public function delete(array $ids)
    {
        $placeholders = implode(', ', array_fill(0, count($ids), '?'));

        $query = $this->connection->prepare("DELETE FROM {$this->table} WHERE {$this->primaryKey} IN ({$placeholders})");
        $query->execute($ids);

        return $query->rowCount();
    }    
}