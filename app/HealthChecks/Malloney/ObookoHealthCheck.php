<?php

namespace App\HealthChecks\Malloney;

use App\HealthChecks\PingHealthCheck;

class ObookoHealthCheck extends PingHealthCheck
{
    public $name = "obooko-site";
    public $domain = "https://www.obooko.com";
}
