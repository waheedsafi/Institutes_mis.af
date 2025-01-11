<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Subject extends Model
{
    use HasFactory,LogsActivity;



    protected $primaryKey = 'Sid';

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['id','subject_name']);
        // Chain fluent methods for configuration options
    }
    public function delete()
    {
        // Delete the associated PDF file if it exists
        if ($this->pdf && Storage::disk('public')->exists($this->pdf)) {
            Storage::disk('public')->delete($this->pdf);
        }

        // Delete the subject from the database
        return parent::delete();
    }
}
