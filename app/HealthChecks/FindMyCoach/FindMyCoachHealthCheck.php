<?php

namespace App\HealthChecks\FindMyCoach;

use App\HealthChecks\PingHealthCheck;

class FindMyCoachHealthCheck extends PingHealthCheck
{
    public $name = "findmycoach-site";
    public $domain = "https://findmycoach.com";
}
