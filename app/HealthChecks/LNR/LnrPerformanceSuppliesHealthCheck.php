<?php

namespace App\HealthChecks\LNR;

use App\HealthChecks\PingHealthCheck;

class LnrPerformanceSuppliesHealthCheck extends PingHealthCheck
{
    public $name = "lnrps-performance-supplies-site";
    public $domain = "https://lnrperformancesupplies.co.uk";
}
