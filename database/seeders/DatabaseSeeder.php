<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Entities\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' =>           'gabriel',
            'cpf' =>            '41018846840',
            'email' =>          'gabrielsaturi11@gmail.com',
            'password' =>       bcrypt('123456'),
            'phone' =>          '16981544216',
            'birth' =>          '2001-06-06',
        ]);
    }
}
