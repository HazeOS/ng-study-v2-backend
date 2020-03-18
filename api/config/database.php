<?php

namespace Database;
class Database
{
    private $host = 'localhost';
    private $dbname = 'recipe_book';
    private $username = 'userhelper';
    private $password = 'Aa123456';
    public $connection;

    public function connect() {
        $this->connection = null;

        try {
            $this->connection = new \PDO('mysql:host=' . $this->host . ";dbname=" . $this->dbname, $this->username, $this->password);
            $this->connection->exec('set names utf8');
            $this->response("Connected", 200);
        } catch (\PDOException $exception){
            $this->response("Connection error: " . $exception->getMessage(), 500);
        }

        return $this->connection;
    }

    protected function response($data, $status) {
        // header("HTTP/1.1 " . $status . " " . $this->requestStatus($status));
        return json_encode($data);
    }
}
