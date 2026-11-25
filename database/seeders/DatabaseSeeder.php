<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'test@example.com'],
            [
                'name' => 'Test User',
                'password' => bcrypt('password'),
            ]
        );

        $students = [
            ['first_name' => 'Sara', 'last_name' => 'Alaoui', 'email' => 'sara.alaoui@example.com', 'phone' => '0600000001', 'birth_date' => '2002-03-15'],
            ['first_name' => 'Youssef', 'last_name' => 'Amrani', 'email' => 'youssef.amrani@example.com', 'phone' => '0600000002', 'birth_date' => '2001-07-20'],
            ['first_name' => 'Salma', 'last_name' => 'Bennani', 'email' => 'salma.bennani@example.com', 'phone' => '0600000003', 'birth_date' => '2003-01-10'],
            ['first_name' => 'Adam', 'last_name' => 'Idrissi', 'email' => 'adam.idrissi@example.com', 'phone' => '0600000004', 'birth_date' => '2002-11-05'],
            ['first_name' => 'Meryem', 'last_name' => 'Fassi', 'email' => 'meryem.fassi@example.com', 'phone' => '0600000005', 'birth_date' => '2001-09-12'],
            ['first_name' => 'Hamza', 'last_name' => 'Tazi', 'email' => 'hamza.tazi@example.com', 'phone' => '0600000006', 'birth_date' => '2003-05-22'],
            ['first_name' => 'Imane', 'last_name' => 'Berrada', 'email' => 'imane.berrada@example.com', 'phone' => '0600000007', 'birth_date' => '2002-12-01'],
            ['first_name' => 'Omar', 'last_name' => 'Lahlou', 'email' => 'omar.lahlou@example.com', 'phone' => '0600000008', 'birth_date' => '2001-04-18'],
        ];

        foreach ($students as $student) {
            Student::updateOrCreate(
                ['email' => $student['email']],
                $student
            );
        }
    }
}
