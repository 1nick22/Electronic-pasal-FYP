<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use Illuminate\Support\Str;

class BestDealsSeeder extends Seeder
{
    public function run()
    {
        $deals = [
            [
                'category_id' => 1,
                'name' => 'Premium Double-Door Smart Refrigerator',
                'description' => 'Premium Double-Door Smart Refrigerator with advanced cooling technology.',
                'brand' => 'Samsung',
                'price' => 45999,
                'stock' => 10,
                'image' => 'images/Premium Double-Door Smart Refrigerator.png',
            ],
            [
                'category_id' => 2,
                'name' => 'Front-load Turbo Clean Washing Machine',
                'description' => 'Front-load Turbo Clean Washing Machine for efficient and gentle washing.',
                'brand' => 'LG',
                'price' => 38500,
                'stock' => 10,
                'image' => 'images/Front-load Turbo Clean Washing Machine.png',
            ],
            [
                'category_id' => 3,
                'name' => 'Multi-function Digital Microwave Oven',
                'description' => 'Multi-function Digital Microwave Oven for quick and easy meals.',
                'brand' => 'Whirlpool',
                'price' => 12499,
                'stock' => 15,
                'image' => 'images/Multi-function Digital Microwave.png',
            ],
            [
                'category_id' => 4,
                'name' => '55" Ultra HD 4K Android Smart TV',
                'description' => '55" Ultra HD 4K Android Smart TV with immersive picture quality.',
                'brand' => 'Sony',
                'price' => 62999,
                'stock' => 5,
                'image' => 'images/55" Ultra HD 4K Android Smart TV.png',
            ],
        ];

        foreach ($deals as $deal) {
            Product::updateOrCreate(
                ['name' => $deal['name']],
                [
                    'category_id' => $deal['category_id'],
                    'slug' => Str::slug($deal['name']),
                    'description' => $deal['description'],
                    'brand' => $deal['brand'],
                    'price' => $deal['price'],
                    'stock' => $deal['stock'],
                    'image' => $deal['image']
                ]
            );
        }
    }
}
