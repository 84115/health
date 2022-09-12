<?php

namespace App\HealthChecks\J84115;

use App\HealthChecks\PingPongHealthCheck;

class EverythingDailyHealthCheck extends PingPongHealthCheck
{
    public $name = 'jb-everything-daily';
    public $domain = "https://everything-daily.co.uk/ping";
}
