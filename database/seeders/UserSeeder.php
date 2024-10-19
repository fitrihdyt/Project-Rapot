<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(User $user): void
    {
        //
        // $user->role_id      = 1;
        //  $user->name         = 'Administrator';
        //  $user->email        = 'admin@gmail.com';
        //  $user->password     = Hash::make('12345678');
        //  $user->save();

        // $user->role_id      = 2;
        //  $user->name         = 'Guru';
        //  $user->email        = 'guru@gmail.com';
        //  $user->password     = Hash::make('12345678');
        //  $user->save();

        $user->role_id      = 3;
         $user->name         = 'Walikelas';
         $user->email        = 'walikelas@gmail.com';
         $user->password     = Hash::make('12345678');
         $user->save();
    }
}
