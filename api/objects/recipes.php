<?php

class Recipes
{
    private $connection;

    public function __construct($db)
    {
        $this->connection = $db;
    }
}
