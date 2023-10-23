<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder{

    /**
     * Seed the application's database.
     */
    public function run()
    : void{
        $this->call([
            DemandsSeeder::class,
            CategorySeeder::class,
            RolesSeeder::class,
            UsersSeeder::class,
            Transaction_CategoriesSeeder::class,
            TransactionsSeeder::class,
            AcreagesSeeder::class,
            PricesSeeder::class,
            PostsSeeder::class,
            ContactsSeeder::class,
            AnswersSeeder::class,
            VouchersSeeder::class,

        ]);
    }
}
