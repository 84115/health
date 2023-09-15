<?php

namespace App\HealthChecks\J84115;

use App\HealthChecks\ArchivedHealthCheck;

class EverythingDailyHealthCheck extends ArchivedHealthCheck
{
    public $name = 'jb-everything-daily';
    public $domain = "https://everything-daily.co.uk/ping";
}
