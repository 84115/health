<?php

namespace App\HealthChecks\SoftFocus;

use App\HealthChecks\PingHealthCheck;

class VirtuallySoldDevHealthCheck extends PingHealthCheck
{
    public $name = 'virtually-sold-dev';
    public $domain = "http://connells.james-ball.co.uk/api/ping";
}
