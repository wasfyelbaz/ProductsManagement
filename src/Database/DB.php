<?php

namespace elbaz\Database;

use elbaz\Database\Concerns\ConnectsTo;
use elbaz\Database\Managers\Contracts\DatabaseManager;

class DB
{
    protected DatabaseManager $manager;

    public function __construct(DatabaseManager $manager)
    {
        // set manager on init
        $this->manager = $manager;
    }
    public function init()
    {
        // initialize connection
        ConnectsTo::connect($this->manager);
    }
    public function raw(string $query, $value)
    {
        // exec raw sql
        return $this->manager->query($query, $value);
    }
    public function create(array $data)
    {
        return $this->manager->create($data);
    }
    public function read($columns, $filter)
    {
        return $this->manager->read($columns, $filter);
    }
}