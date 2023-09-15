<?php

namespace App\HealthChecks\LNR;

use App\HealthChecks\ArchivedHealthCheck;

class LnrPerformanceRemapsDvlaSlaveHealthCheck extends ArchivedHealthCheck
{
    public $name = "lnrps-performance-remaps-slave";
    public $domain = "http://slave.lnrperformanceremaps.co.uk";
}
