<?php


class QueryBuilder {

    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function selectAll($table)
    {
        $statment = $this->pdo->prepare("SELECT * FROM {$table}");
        $statment->execute();

        return $statment->fetchAll(PDO::FETCH_CLASS);
    }


    public function create($table, $parameters =[])
    {

        $sql = sprintf(
            "INSERT INTO %s (%s) VALUES(%s)",
            $table,
            implode(',', array_keys($parameters)),
            ':' . implode(', :', array_keys($parameters))
        );

        $statment = $this->pdo->prepare($sql);
        try {
            $statment->execute($parameters);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


}