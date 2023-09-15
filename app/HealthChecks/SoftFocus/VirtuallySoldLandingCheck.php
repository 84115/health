<?php

namespace App\HealthChecks\SoftFocus;

use App\HealthChecks\PingHealthCheck;

class VirtuallySoldLandingCheck extends PingHealthCheck
{
    public $name = 'virtually-sold-landing';
    public $domain = "https://virtuallysold.io";
}
