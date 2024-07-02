<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run()
    {
        Admin::create([
            'username' => 'SF_GRAPH',
            'email' => 'sf.graph@outlook.com',
            'password' => Hash::make('Ectnqu001@@*'), // Changez le mot de passe ici
            'role' => 'superadmin',
        ]);
    }
}

