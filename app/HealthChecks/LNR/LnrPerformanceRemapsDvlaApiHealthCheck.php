<?php

namespace App\HealthChecks\LNR;

use App\HealthChecks\PingHealthCheck;

class LnrPerformanceRemapsDvlaApiHealthCheck extends PingHealthCheck
{
    public $name = "lnr-performance-remaps-api";
    public $domain = "https://lnrperformanceremaps.co.uk/api/ping";
}
