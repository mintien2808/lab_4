<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'name' => 'Smartphone',
                'description' => 'A high-quality smartphone',
                'price' => 599,
                'image' => 'smartphone.jpg',
                'category_id' => 1,
            ],
            [
                'name' => 'Novel Book',
                'description' => 'An interesting novel',
                'price' => 20,
                'image' => 'book.jpg',
                'category_id' => 2,
            ],
            [
                'name' => 'T-Shirt',
                'description' => 'Comfortable cotton T-shirt',
                'price' => 15,
                'image' => 'tshirt.jpg',
                'category_id' => 3,
            ],
        ]);
    }
}
