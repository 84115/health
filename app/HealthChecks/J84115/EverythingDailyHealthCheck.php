<?php

namespace App\HealthChecks\J84115;

use App\HealthChecks\PingHealthCheck;

class EverythingDailyHealthCheck extends PingHealthCheck
{
    public $name = 'jb-everything-daily';
    public $domain = "https://everything-daily.co.uk/ping";
}
