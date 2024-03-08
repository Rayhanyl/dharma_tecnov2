<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'email'             => 'admin@mail.com',
                'password'          => 'qwerty',
                'first_name'        => 'Admin',
                'last_name'         => 'DTI',
                'phone_number'      => '08129312399',
                'role'              => 'admin'
            ],
            [
                'email'             => 'general@mail.com',
                'password'          => 'qwerty',
                'first_name'        => 'General',
                'last_name'         => 'Affair',
                'phone_number'      => '08129312399',
                'role'              => 'general'
            ],
            [
                'email'             => 'applicant@mail.com',
                'password'          => 'qwerty',
                'first_name'        => 'Pelamar',
                'last_name'         => '1',
                'phone_number'      => '+6285282205728',
                'role'              => 'applicant'
            ],
            [
                'email'             => 'recruiter@mail.com',
                'password'          => 'qwerty',
                'first_name'        => 'Recruiter',
                'last_name'         => 'TDI',
                'phone_number'      => '+6285282205728',
                'role'              => 'recruiter'
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        };
    }
}
