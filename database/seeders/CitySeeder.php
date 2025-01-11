<?php

namespace Database\Seeders;

use App\Models\city;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class citySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('citys')->insert(['city'=>'کابل','en_name'=>'Kabul']);
        DB::table('citys')->insert(['city'=>'لوګر','en_name'=>'Loger']);
        DB::table('citys')->insert(['city'=>'پکتیا','en_name'=>'Paktia']);
        DB::table('citys')->insert(['city'=>'خوست','en_name'=>'khost']);
        DB::table('citys')->insert(['city'=>'پکتیکا','en_name'=>'Paktika']);
        DB::table('citys')->insert(['city'=>'غزنی','en_name'=>'Ghazni']);
        DB::table('citys')->insert(['city'=>'کندهار','en_name'=>'Kandahar']);
        DB::table('citys')->insert(['city'=>'ننګرهار','en_name'=>'Nangrahar']);
        DB::table('citys')->insert(['city'=>'هرات','en_name'=>'Herat']);
        DB::table('citys')->insert(['city'=>'بلخ','en_name'=>'Balkh']);
        DB::table('citys')->insert(['city'=>'پروان','en_name'=>'Parwan']);
        
        DB::table('citys')->insert(['city'=>'هلمند','en_name'=>'Helmand']);
        DB::table('citys')->insert(['city'=>'نیمروز','en_name'=>'Nemrooz']);
        DB::table('citys')->insert(['city'=>'بامیان','en_name'=>'Bamyan']);
        DB::table('citys')->insert(['city'=>'لغمان','en_name'=>'Laghman']);
        DB::table('citys')->insert(['city'=>'فاریاب','en_name'=>'Faryab']);
        DB::table('citys')->insert(['city'=>'جوزجان','en_name'=>'Jozjan']);
        DB::table('citys')->insert(['city'=>'کندز','en_name'=>'Kanduz']);
        DB::table('citys')->insert(['city'=>'بدخشان','en_name'=>'Badakhashan']);
        DB::table('citys')->insert(['city'=>'نورستان','en_name'=>'Nuristan']);
        DB::table('citys')->insert(['city'=>'کنړ','en_name'=>'Kunar']);
        DB::table('citys')->insert(['city'=>'تخار','en_name'=>'Takhar']);
        DB::table('citys')->insert(['city'=>'کاپیسا','en_name'=>'Kapisa']);   
        DB::table('citys')->insert(['city'=>'سرپل','en_name'=>'Sarepul']);
        DB::table('citys')->insert(['city'=>'غور','en_name'=>'Ghor']);
        DB::table('citys')->insert(['city'=>'بادغیس','en_name'=>'Badghis']);
        DB::table('citys')->insert(['city'=>'فراه','en_name'=>'Para']);
        DB::table('citys')->insert(['city'=>'ارزګان','en_name'=>'Urzghan']);
        DB::table('citys')->insert(['city'=>'دایکندی','en_name'=>'Diakundi']);
        DB::table('citys')->insert(['city'=>'میدان وردګ','en_name'=>'Maidan Wardag']);
        DB::table('citys')->insert(['city'=>'پنجشیر','en_name'=>'Panshiar']);
        DB::table('citys')->insert(['city'=>'سمنګان','en_name'=>'Samangan']);
        DB::table('citys')->insert(['city'=>'بغلان','en_name'=>'Baghlan']);
        DB::table('citys')->insert(['city'=>'زابل','en_name'=>'Zabul']); 
        
        
      
    }
}
