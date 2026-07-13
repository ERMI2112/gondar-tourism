<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Guide;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::create([
            'name' => 'System Admin',
            'email' => 'admin@gondar.gov.et',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'phone' => '0911111111',
        ]);

        User::create([
            'name' => 'Tourism Officer',
            'email' => 'officer@gondar.gov.et',
            'password' => Hash::make('password'),
            'role' => 'tourism_officer',
            'phone' => '0922222222',
        ]);

        $guideUser = User::create([
            'name' => 'Abebe Kebede',
            'email' => 'abebe@guide.com',
            'password' => Hash::make('password'),
            'role' => 'guide',
            'phone' => '0933333333',
        ]);

        Guide::create([
            'user_id' => $guideUser->id,
            'phone' => '0933333333',
            'languages' => 'Amharic, English',
            'specialization' => 'Historical & Religious Sites',
            'license_number' => 'GON-2024-001',
            'bio' => 'Professional tour guide with 5 years of experience in Gondar tourism.',
            'price_range' => '500-1000 ETB per day',
            'availability_status' => 'available',
            'approval_status' => 'approved',
        ]);
    }
}
