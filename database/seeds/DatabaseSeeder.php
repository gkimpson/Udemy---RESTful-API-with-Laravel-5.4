<?php

use App\User;
use App\Product;
use App\Category;
use App\Transaction;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // disable foreign key check
        DB::statement('SET FOREIGN_KEYS_CHECK = 0');

        User::truncate();
        Category::truncate();
        Product::truncate();
        Transaction::truncate();
        DB::table('category_product')->truncate();

        $usersQuantity = 200;
        $categoriesQuantity = 30;
        $productsQuantity = 1000;
        $transactionsQuantity = 1000;

        factory(User::class, $usersQuantity)->create();
        factory(Category::class, $categoriesQuantity)->create();

        // associate a product to a category
        factory(Product::class, $productsQuantity)->create()->each(
            function ($product) {
                $categories = Category::all()->random(mt_rand(1, 5))->pluck('id');

                $product->categories()->attach($categories);
            });
        );

        factory(Transaction::class, $transactionsQuantity)->create();
    }
}
