<?php

namespace App\HealthChecks\J84115;

use App\HealthChecks\ArchivedHealthCheck;

class SkateableDotUkHealthCheck extends ArchivedHealthCheck
{
    public $name = 'skateable-dot-uk';
    public $domain = "https://www.skateable.uk";
}
