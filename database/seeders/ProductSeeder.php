<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::create([
            'name' => 'Wireless Headphones',
            'description' => 'Premium noise-cancelling wireless headphones with 30-hour battery life and rich sound quality.',
            'price' => 79.99,
            'stock' => 25,
        ]);

        Product::create([
            'name' => 'Smart Watch',
            'description' => 'Fitness tracker with heart rate monitor, GPS, and 7-day battery life. Water resistant to 50m.',
            'price' => 149.99,
            'stock' => 15,
        ]);

        Product::create([
            'name' => 'USB-C Hub',
            'description' => '7-in-1 USB-C hub with HDMI 4K, USB 3.0, SD card reader, and 100W Power Delivery.',
            'price' => 34.99,
            'stock' => 50,
        ]);

        Product::create([
            'name' => 'Mechanical Keyboard',
            'description' => 'RGB backlit mechanical keyboard with Cherry MX switches and aluminum frame.',
            'price' => 89.99,
            'stock' => 30,
        ]);

        Product::create([
            'name' => 'Portable Speaker',
            'description' => 'Waterproof Bluetooth speaker with 360-degree sound and 12-hour battery life.',
            'price' => 44.99,
            'stock' => 40,
        ]);

        Product::create([
            'name' => 'Laptop Stand',
            'description' => 'Adjustable aluminum laptop stand with ergonomic design and cable management.',
            'price' => 29.99,
            'stock' => 60,
        ]);
    }
}
