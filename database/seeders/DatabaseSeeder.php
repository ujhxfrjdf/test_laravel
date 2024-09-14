<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        
        DB::table('companies')->insert(
            array(
                'name' => 'Default Company',
                'email' => 'company@default.com',
                'website' => 'www.php.net',
                'address' => 'New York',
                'logo' => 'default-company.png'
            )
        );

        DB::table('companies')->insert(
            array(
                'name' => 'Test Company',
                'email' => 'company@test.com',
                'website' => 'www.laravel.com',
                'address' => 'Moscow',
                'logo' => 'banan.jpg'
            )
        );

        DB::table('companies')->insert(
            array(
                'name' => 'Company',
                'email' => 'company@company.com',
                'website' => 'www.google.com',
                'address' => 'Tyumen',
                'logo' => 'logo.png'
            )
        );

        DB::table('employees')->insert(
            array(
                'name' => 'Ivan',
                'surname' => 'Ivanov',
                'email' => 'ivanov@mail.com',
                'phone' => '12345',
                'company_id' => '1'
            )
        );

        DB::table('employees')->insert(
            array(
                'name' => 'Mark',
                'surname' => 'Petrenko',
                'email' => 'petrenko@mail.com',
                'phone' => '111',
                'company_id' => '1'
            )
        );

        DB::table('employees')->insert(
            array(
                'name' => 'Semen',
                'surname' => 'Ivanov',
                'email' => 'ivanov2@mail.com',
                'phone' => '123456',
                'company_id' => '2'
            )
        );

        DB::table('employees')->insert(
            array(
                'name' => 'Jhon',
                'surname' => 'Test',
                'email' => 'test@mail.com',
                'phone' => '222',
                'company_id' => '2'
            )
        );

        DB::table('employees')->insert(
            array(
                'name' => 'Vladimir',
                'surname' => 'Petrov',
                'email' => 'petrov@mail.com',
                'phone' => '1234567',
                'company_id' => '3'
            )
        );
        
        DB::table('users')->insert(
            array(
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'password' => Hash::make('password')
            )
        );
    }
}
