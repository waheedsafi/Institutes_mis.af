<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Role;
use App\Models\User;
use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       
        Role::create(['role_name' => 'super admin', 'access_level' => 1]);
        Role::create(['role_name' => 'Institute Manager', 'access_level' => 8]);
        Role::create(['role_name' => 'editor', 'access_level' => 2]);

       User::create([
            'name' => 'waheed',
            'email' => 'waheed@gmail.com',
            'password' => Hash::make('admin'),
            'city'=>1,
            'role' => 1, // Assuming 'super admin' role has an id of 1

        ]);
        Permission::create(['name'=>'View Home','slag'=>'view-home']);
        Permission::create(['name'=>'View Student','slag'=>'view-student']);
        Permission::create(['name'=>'Add Student','slag'=>'add-student']);
        Permission::create(['name'=>'Delete Student','slag'=>'delete-student']);
        Permission::create(['name'=>'Edit Student','slag'=>'edit-student']);
        Permission::create(['name'=>'View Teacher','slag'=>'view-teacher']);
        Permission::create(['name'=>'Edit Teacher','slag'=>'edit-teacher']);
        Permission::create(['name'=>'Add Teacher','slag'=>'add-teacher']);
        Permission::create(['name'=>'Delete Teacher','slag'=>'delete-teacher']);
        Permission::create(['name'=>'View User','slag'=>'view-user']);
        Permission::create(['name'=>'Add User','slag'=>'add-user']);
        Permission::create(['name'=>'Edit User','slag'=>'edit-user']);
        Permission::create(['name'=>'Delete User','slag'=>'delete-user']);
        Permission::create(['name'=>'View Institute','slag'=>'view-institute']);
        Permission::create(['name'=>'Add Institute','slag'=>'add-institute']);
        Permission::create(['name'=>'Edit Institute','slag'=>'edit-institute']);
        Permission::create(['name'=>'Delete Institute','slag'=>'delete-institute']);
        Permission::create(['name'=>'View Score','slag'=>'view-score']);
        Permission::create(['name'=>'Add Score','slag'=>'add-score']);
        Permission::create(['name'=>'Edit Score','slag'=>'edit-score']);
        Permission::create(['name'=>'Download Card','slag'=>'download-card']);
        Permission::create(['name'=>'Change Password','slag'=>'change-password']);
        Permission::create(['name'=>'Change Password','slag'=>'change-photo']);
        Permission::create(['name'=>'View Setting','slag'=>'view-setting']);
        Permission::create(['name'=>'View curriculum','slag'=>'view-curriculum']);
        Permission::create(['name'=>'Add curriculum','slag'=>'add-curriculum']);
        Permission::create(['name'=>'Delete curriculum','slag'=>'delete-curriculum']);
        Permission::create(['name'=>'Edit curriculum','slag'=>'edit-curriculum']);
        Permission::create(['name'=>'View Subject','slag'=>'view-subject']);
        Permission::create(['name'=>'Edit Subject','slag'=>'edit-Subject']);
        Permission::create(['name'=>'Add Subject','slag'=>'add-Subject']);
        Permission::create(['name'=>'Delete Subject','slag'=>'delete-Subject']);
        Permission::create(['name'=>'View TimeTable','slag'=>'view-timetable']);
        Permission::create(['name'=>'Add TimeTable','slag'=>'add-timetable']);
        Permission::create(['name'=>'Edit TimeTable','slag'=>'edit-timetable']);
        Permission::create(['name'=>'Delete TimeTable','slag'=>'delete-timetable']);
        Permission::create(['name'=>'Add Study Plan','slag'=>'add-studyplan']);
        Permission::create(['name'=>'Edit Study Plan','slag'=>'edit-studyplan']);
    
        
     
    }
}
