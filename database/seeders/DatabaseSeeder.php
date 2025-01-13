<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductCart;
use App\Models\ProductOrder;
use App\Models\ProductSave;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
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
           'name'=>'User One',
           'image'=>'image/user.png',
           'email'=>'userone@gmail.com',
           'password'=>Hash::make('password'),
        ]);
        User::create([
            'name'=>'Admin',
            'image'=>'image/user.png',
            'email'=>'admin@gmail.com',
            'password'=>Hash::make('password'),
            'role'=>'Admin'
         ]);

        Category::factory(5)->create();
        Product::factory(50)->create();
        ProductCart::factory(5)->create();
        ProductOrder::factory(5)->create();
        ProductSave::factory(5)->create();
    }
}
