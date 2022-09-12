<?php

namespace App\HealthChecks\Irv\WorthWhat;

use App\HealthChecks\PingPongHealthCheck;

class ApiHealthCheck extends PingPongHealthCheck
{
    public $name = 'worth-what-api';
    public $domain = "http://app.worthwhat.com/api/ping";
}
