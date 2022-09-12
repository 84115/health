<?php

namespace App\HealthChecks\Irv\WorthWhat;

use App\HealthChecks\PingPongHealthCheck;

class DatabaseHealthCheck extends PingPongHealthCheck
{
    public $name = 'worth-what-database';
    public $domain = "http://app.worthwhat.com/api/ping/database";
}
