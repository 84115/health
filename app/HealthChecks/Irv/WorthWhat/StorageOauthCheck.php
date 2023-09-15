<?php

namespace App\HealthChecks\Irv\WorthWhat;

use App\HealthChecks\ArchivedHealthCheck;

class StorageOauthCheck extends ArchivedHealthCheck
{
    public $name = 'worth-what-oauth';
    public $domain = "http://oauth.worthwhat.com/ping";
}
