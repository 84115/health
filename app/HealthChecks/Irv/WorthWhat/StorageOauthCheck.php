<?php

namespace App\HealthChecks\Irv\WorthWhat;

use App\HealthChecks\PingPongHealthCheck;

class StorageOauthCheck extends PingPongHealthCheck
{
    public $name = 'worth-what-oauth';
    public $domain = "http://oauth.worthwhat.com/ping";
}
