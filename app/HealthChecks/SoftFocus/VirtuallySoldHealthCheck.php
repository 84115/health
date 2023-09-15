<?php

namespace App\HealthChecks\SoftFocus;

use App\HealthChecks\PingHealthCheck;

class VirtuallySoldHealthCheck extends PingHealthCheck
{
    public $name = 'virtually-sold-production';
    public $domain = "https://app.virtuallysold.io/api/ping";
}
