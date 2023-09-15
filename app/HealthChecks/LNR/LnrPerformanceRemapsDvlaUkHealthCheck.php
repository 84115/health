<?php

namespace App\HealthChecks\LNR;

use App\HealthChecks\PingHealthCheck;

class LnrPerformanceRemapsDvlaUkHealthCheck extends PingHealthCheck
{
    public $name = "lnr-performance-remaps-dvla-uk";
    public $domain = "https://lnrperformanceremaps.co.uk/dvla/ping";
}
