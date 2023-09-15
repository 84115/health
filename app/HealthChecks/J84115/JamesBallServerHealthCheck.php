<?php

namespace App\HealthChecks\J84115;

use App\HealthChecks\ArchivedHealthCheck;

class JamesBallServerHealthCheck extends ArchivedHealthCheck
{
    public $name = 'jb-server';
    public $domain = "http://dev.james-ball.co.uk/ping";
}
