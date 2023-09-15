<?php

namespace App\HealthChecks\SoftFocus;

use App\HealthChecks\PingHealthCheck;

class VirtuallySoldStagingHealthCheck extends PingHealthCheck
{
    public $name = 'virtually-sold-staging';
    public $domain = "https://staging.virtuallysold.io/api/ping";
}
