<?php

namespace App\Models;

abstract class DAbstractModel
{
    private static $db_host = 'DB_HOST';
    private static $db_user = 'DB_USER';
    private static $db_pass = 'DB_PASS';
    private static $db_name = 'DB_NAME';
    private static $db_port = 'DB_PORT';

    private static $conection = null;

    protected $message = "";
    protected $query;
    protected $params = [];
    protected $rows = [];
    protected $afected_rows = 0;

    abstract protected function get($id = "");
    abstract protected function set();
    abstract protected function edit();
    abstract protected function delete($id = "");
}
