<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        	'name' => 'Diego Huacanjulca Ayay',      
            'email' => 'diego@gmail.com',
            'password' => bcrypt('123456789')
        ]);
        User::create([
            'name' => 'Katherine Nuñz Alvarado',      
            'email' => 'kathy@gmail.com',
            'password' => bcrypt('123456789')
        ]);
        User::create([
            'name' => 'Frankie Huacanjulca Nuñez',      
            'email' => 'frankie@gmail.com',
            'password' => bcrypt('123456789')
        ]);
        User::create([
            'name' => 'Nicolas Huacanjulca Nuñez',      
            'email' => 'nicolas@gmail.com',
            'password' => bcrypt('123456789')
        ]);
        User::create([
            'name' => 'Cesar Salgado Castillo',      
            'email' => 'cesar@gmail.com',
            'password' => bcrypt('123456789')
        ]);
    }
}
