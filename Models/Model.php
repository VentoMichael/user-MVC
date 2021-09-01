<?php


namespace Models;


class Model
{
    protected $pdo;
    protected $table;
    protected $findKey;

    public function __construct()
    {
        try {
            $pdo = new \PDO('mysql:dbname=users;host=localhost', 'root', '');
            $pdo->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE,
                \PDO::FETCH_OBJ);
        } catch (\PDOException $e) {
            die($e->getMessage());
        }
        $this->pdo = $pdo;
    }

    public function find(string $key): \StdClass
    {
        $request = 'SELECT * FROM '.$this->table.' WHERE '.$this->findKey.' = :'.$this->findKey;
        $pdoSt = $this->pdo->prepare($request);
        $pdoSt->execute([':'.$this->findKey => $key]);

        return $pdoSt->fetch();
    }

    public function all(): array
    {
        $request = 'SELECT * FROM '.$this->table;
        $pdoSt = $this->pdo->prepare($request);
        $pdoSt->execute();

        return $pdoSt->fetchAll();
    }
}