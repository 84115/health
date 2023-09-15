<?php

namespace App\HealthChecks\LNR;

use App\HealthChecks\PingHealthCheck;

class LnrPerformanceRemapsSiteHealthCheck extends PingHealthCheck
{
    public $name = "lnr-performance-remaps-site";
    public $domain = "https://www.lnrperformanceremaps.co.uk";
}
