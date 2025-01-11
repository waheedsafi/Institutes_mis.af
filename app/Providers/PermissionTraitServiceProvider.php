<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Permissions\HasPermissionsTrait;


class PermissionTraitServiceProvider extends ServiceProvider
{
    use HasPermissionsTrait;

    public function boot()
    {
        
    }
}
