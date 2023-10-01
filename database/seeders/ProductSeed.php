<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Product;

class ProductSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->truncate();

        $products = [
            [
                'category_id' => Category::all()->unique()->random()->id,
                'name' => 'laptop',
                'qty' => '5',
                'selling_price' => '5000',
                'description' => ' specializes in elderly care',

            ],
            [
                'category_id' => Category::all()->unique()->random()->id,
                'name' => 'iphon',
                'qty' => '5',
                'selling_price' => '5000',
                'description' => ' specializes in elderly care',

            ],
            [
                'category_id' => Category::all()->unique()->random()->id,
                'name' => 'mobile',
                'qty' => '5',
                'selling_price' => '5000',
                'description' => ' specializes in elderly care',
            ],
        ];

        foreach ($products as $pro) {
            Product::create($pro);
        }
    }
}
