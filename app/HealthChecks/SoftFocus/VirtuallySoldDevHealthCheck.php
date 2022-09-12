<?php

namespace App\HealthChecks\SoftFocus;

use App\HealthChecks\PingPongHealthCheck;

class VirtuallySoldDevHealthCheck extends PingPongHealthCheck
{
    public $name = 'virtually-sold-dev';
    public $domain = "http://connells.james-ball.co.uk/api/ping";
}
