<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'username' => 'admin',
               'nama'=>'ini akun Admin',
               'email'=>'admin@example.com',
                'level'=>'admin',
               'password'=> bcrypt('123456'),
            ],
            [
                'username' => 'user',
               'nama'=>'ini akun User (non admin)',
               'email'=>'user@example.com',
                'level'=>'user',
               'password'=> bcrypt('123456'),
            ],
            [
                'username' => 'superadmin',
               'nama'=>'ini akun superadmin (non admin)',
               'email'=>'usuperadmin@example.com',
                'level'=>'superadmin',
               'password'=> bcrypt('123456'),
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
