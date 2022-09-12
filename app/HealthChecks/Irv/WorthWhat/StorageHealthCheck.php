<?php

namespace App\HealthChecks\Irv\WorthWhat;

use App\HealthChecks\PingPongHealthCheck;

class StorageHealthCheck extends PingPongHealthCheck
{
    public $name = 'worth-what-storage';
    public $domain = "http://app.worthwhat.com/api/ping/storage";
}
