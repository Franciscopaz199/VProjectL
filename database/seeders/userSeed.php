<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class userSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'FP',
            'username' => 'FP',
            'email'=>'josepaz3123@gmail.com',
            'password'=> 'fernanflo199',
        ])->assignRole('admin');
        
        $user = User::create([
            'name' => 'KO',
            'username' => 'KO',
            'email'=>'kenisreyes11@gmail.com',
            'password'=> 'kennedy11',
        ])->assignRole('usser');
    }

}
