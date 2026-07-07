<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Item;
use App\Models\Payment;
use App\Models\Order;
use Illuminate\Support\Facades\Hash;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'Super Admin',
            'phone' => '0987654321',
            'profile' => '/images/profiles/sa.png',
            'email' => 'superadmin@gmail.com',
            'password' => Hash::make('12345678'),
            'role' => 'Super Admin',
        ]);

        // Category::factory(10)->create();

        // Item::factory(20)->create();

        // Payment::factory(10)->create();

        // Order::factory(10)->create();
    }
}
