<?php

namespace App\Models;

abstract class DAbstractModel
{
    private static $db_host = 'DB_HOST';
    private static $db_user = 'DB_USER';
    private static $db_pass = 'DB_PASS';
    private static $db_name = 'DB_NAME';
    private static $db_port = 'DB_PORT';
}
