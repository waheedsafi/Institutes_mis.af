<?php

namespace App\Models;

use App\Enums\SettingEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Setting extends Model
{
    use HasFactory;




     public static function getCurrentYear(): ?string
    {   
       

      return Cache::remember('current_year', now()->addHours(1), function () {
        return Setting::find(SettingEnum::current_year)->value ?? null;
        });
    }
}

