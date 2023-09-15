<?php

namespace App\HealthChecks\J84115;

use App\HealthChecks\PingHealthCheck;

class JamesBallSiteHealthCheck extends PingHealthCheck
{
    public $name = 'jb-site';
    public $domain = "https://james-ball.co.uk/ping";
}
