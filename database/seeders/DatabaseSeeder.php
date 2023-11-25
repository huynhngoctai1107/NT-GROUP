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
            FollowerSeeder::class,
            Payment_methods::class,
            Transaction_CategoriesSeeder::class,
            TransactionsSeeder::class,
            AcreagesSeeder::class,
            PricesSeeder::class,
            PostsSeeder::class,
            Medias::class,
            Customer_reports::class,
            ContactsSeeder::class,
            Faqs::class,
            VouchersSeeder::class,
            EmailNews::class,
            CategoryBlogSeeder::class,
            BlogSeeder::class,

        ]);
    }
}
