<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            'Refrigerators' => [
                ['name' => 'Sumsang CoolMaster 300L', 'price' => 45999, 'image' => 'images/refrigerator.png'],
                ['name' => 'LG FrostFree 250L', 'price' => 35000, 'image' => 'images/refrigerator.png'],
                ['name' => 'Whirlpool DirectCool 190L', 'price' => 22000, 'image' => 'images/refrigerator.png'],
                ['name' => 'CG Digital Inverter 350L', 'price' => 55000, 'image' => 'images/refrigerator.png'],
                ['name' => 'Haier Side-by-Side 500L', 'price' => 120000, 'image' => 'images/refrigerator.png'],
                ['name' => 'Godrej Edge Pro 200L', 'price' => 24000, 'image' => 'images/refrigerator.png'],
            ],
            'Washing Machines' => [
                ['name' => 'LG Front Load 8kg', 'price' => 65000, 'image' => 'images/washing-machine.png'],
                ['name' => 'Samsung Top Load 7kg', 'price' => 38500, 'image' => 'images/washing-machine.png'],
                ['name' => 'IFB Senator Aqua 8.5kg', 'price' => 70000, 'image' => 'images/washing-machine.png'],
                ['name' => 'CG Semi Automatic 7kg', 'price' => 18000, 'image' => 'images/washing-machine.png'],
                ['name' => 'Whirlpool StainWash 7.5kg', 'price' => 42000, 'image' => 'images/washing-machine.png'],
                ['name' => 'Beko Front Load 9kg', 'price' => 75000, 'image' => 'images/washing-machine.png'],
            ],
            'Microwave Ovens' => [
                ['name' => 'Samsung Convection 28L', 'price' => 22000, 'image' => 'images/oven.png'],
                ['name' => 'LG Grill Microwave 25L', 'price' => 18000, 'image' => 'images/oven.png'],
                ['name' => 'IFB Solo 20L', 'price' => 12499, 'image' => 'images/oven.png'],
                ['name' => 'CG Digital 23L', 'price' => 15000, 'image' => 'images/oven.png'],
                ['name' => 'Whirlpool Magic Cook 30L', 'price' => 28000, 'image' => 'images/oven.png'],
                ['name' => 'Beko Solo 20L', 'price' => 11000, 'image' => 'images/oven.png'],
            ],
            'Smart TVs' => [
                ['name' => 'Sony Bravia 55" 4K', 'price' => 120000, 'image' => 'images/smart-tv.png'],
                ['name' => 'Samsung QLED 50"', 'price' => 95000, 'image' => 'images/smart-tv.png'],
                ['name' => 'LG UHD 43"', 'price' => 62999, 'image' => 'images/smart-tv.png'],
                ['name' => 'CG Android 43"', 'price' => 45000, 'image' => 'images/smart-tv.png'],
                ['name' => 'TCL Smart 32"', 'price' => 25000, 'image' => 'images/smart-tv.png'],
                ['name' => 'Xiaomi Mi TV 55"', 'price' => 65000, 'image' => 'images/smart-tv.png'],
            ],
        ];

        foreach ($categories as $catName => $products) {
            $category = Category::create([
                'name' => $catName,
                'slug' => Str::slug($catName),
            ]);

            foreach ($products as $prod) {
                Product::create([
                    'category_id' => $category->id,
                    'name' => $prod['name'],
                    'slug' => Str::slug($prod['name']),
                    'description' => $prod['name'] . ' - High quality home appliance with manufacturer warranty.',
                    'price' => $prod['price'],
                    'stock' => 10,
                    'image' => $prod['image'],
                ]);
            }
        }
    }
}
