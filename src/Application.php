<?php

namespace elbaz;

use elbaz\Http\Request;
use elbaz\Http\Response;
use elbaz\Http\Route;
use elbaz\Database\DB;
use elbaz\Database\Managers\MySQLManager;
class Application
{
    protected Route $route;
    protected Request $request;
    protected Response $response;
    public DB $db;
    public function __construct()
    {
        $this->request = new Request;
        $this->response = new Response;
        $this->route = new Route($this->request, $this->response);
        $this->db = new DB($this->getDatabaseDriver());
    }
    public function getDatabaseDriver()
    {
        if (strcmp(env('DB_DRIVER'), 'mysql') == 0 )
        {
            return new MySQLManager;
        }
    }
    protected function loadConfigurations()
    {
        foreach(scandir(config_path()) as $file) {
            if ($file == '.' || $file == '..') {
                continue;
            }
            $filename = explode('.', $file)[0];

            yield $filename => require config_path() . $file;
        }

    }
    public function run()
    {
        // initialize db
        $this->db->init();
        // resolve routes
        $this->route->resolve();
    }

    public function __get($name)
    {
        if (property_exists($this, $name))
        {
            return $this->name;
        }
    }

}