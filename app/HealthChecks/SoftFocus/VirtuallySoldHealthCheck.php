<?php

namespace App\HealthChecks\SoftFocus;

use App\HealthChecks\PingPongHealthCheck;

class VirtuallySoldHealthCheck extends PingPongHealthCheck
{
    public $name = 'virtually-sold-production';
    public $domain = "https://app.virtuallysold.io/api/ping";
}
