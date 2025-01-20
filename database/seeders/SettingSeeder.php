<?php

namespace Database\Seeders;

use App\Enums\SettingEnum;
use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $this->currentyearsetting();
    }

    protected function currentyearsetting(){


        Setting::create([
            'id' =>SettingEnum::current_year,
            'name' => 'Current Year',
            'value' => '1404',
            'acceptable_value' => 'integer',
            'description' => 'this setting use for use the students table start_year column'
        ]);
    }
}
