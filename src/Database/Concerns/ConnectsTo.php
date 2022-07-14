<?php

namespace elbaz\Database\Concerns;

use elbaz\Database\Managers\Contracts\DatabaseManager;

trait ConnectsTo
{
    public static function connect(DatabaseManager $manager)
    {
        return $manager->connect();
    }
}