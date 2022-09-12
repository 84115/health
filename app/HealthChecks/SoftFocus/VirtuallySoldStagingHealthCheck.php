<?php

namespace App\HealthChecks\SoftFocus;

use App\HealthChecks\PingPongHealthCheck;

class VirtuallySoldStagingHealthCheck extends PingPongHealthCheck
{
    public $name = 'virtually-sold-staging';
    public $domain = "https://staging.virtuallysold.io/api/ping";
}
