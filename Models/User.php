<?php

namespace Models;

class User extends Model
{
    protected $table = 'users';
    protected $findKey = 'id';

    public function all(): array
    {
        $statement = $this->pdo->query('SELECT * FROM users ORDER BY name');
        $statement->execute();
        return $statement->fetchAll();
    }

    public function find(string $key): \stdClass
    {
        $statement = $this->pdo->prepare('SELECT * FROM users WHERE id = :id');
        $statement->execute([':id' => $key]);
        return $statement->fetch();
    }
}