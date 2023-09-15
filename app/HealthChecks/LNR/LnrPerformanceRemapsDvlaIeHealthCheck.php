<?php

namespace App\HealthChecks\LNR;

use App\HealthChecks\PingHealthCheck;

class LnrPerformanceRemapsDvlaIeHealthCheck extends PingHealthCheck
{
    public $name = "lnr-performance-remaps-dvla-ie";
    public $domain = "https://lnrperformanceremaps.co.uk/dvla/ie/ping";
}
