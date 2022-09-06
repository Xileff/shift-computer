<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Brand;
use App\Models\Gallery;
use App\Models\Picture;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Felix Savero',
            'username' => 'Styx',
            'email' => 'felixsavero@gmail.com',
            'password' => Hash::make('password')
        ]);

        Category::create(["name" => "GPU"]);
        Category::create(["name" => "CPU"]);
        Category::create(["name" => "Motherboard"]);

        Brand::create(["name" => "Nvidia"]);
        Brand::create(["name" => "AMD"]);
        Brand::create(["name" => "Gigabyte"]);

        Product::create([
            'name' => 'Nvidia GeForce RTX 3090 24GB',
            'slug' => 'nvidia-geforce-rtx-3090-24gb',
            'gallery_id' => '1',
            'price' => '27000000',
            'discounted_price' => '24900000',
            'weight_in_grams' => '1500',
            'category_id' => '2',
            'brand_id' => '1',
            'description' => '<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quas voluptate et repellat minima dolores ratione quos quae similique aliquid praesentium enim necessitatibus, animi aliquam quaerat reprehenderit nihil earum nisi inventore quasi corporis eum at possimus. Molestias perferendis quod quae corporis, enim dolor ipsam sed eligendi laudantium adipisci maxime dolore perspiciatis!</p><br><p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Porro dignissimos, quis, beatae maxime neque illo ipsum cumque doloremque harum culpa, optio similique alias? Vel ipsa dolores commodi nulla magni, omnis, reiciendis quibusdam, nobis quia reprehenderit quod nihil doloribus neque! Adipisci, illum! Dolorum voluptas tenetur obcaecati laudantium sunt distinctio delectus ipsa omnis quas, aliquam cumque itaque quo. Molestiae quam quidem amet.</p>'
        ]);

        Product::create([
            'name' => 'AMD Ryzen 5 2600 3.4-3.9GHz 6C 12T',
            'slug' => 'amd-ryzen-5-2600-3.4-3.9GHz-6c-12t',
            'gallery_id' => '2',
            'price' => '2500000',
            'discounted_price' => '2100000',
            'weight_in_grams' => '1000',
            'category_id' => '1',
            'brand_id' => '2',
            'description' => '<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quas voluptate et repellat minima dolores ratione quos quae similique aliquid praesentium enim necessitatibus, animi aliquam quaerat reprehenderit nihil earum nisi inventore quasi corporis eum at possimus. Molestias perferendis quod quae corporis, enim dolor ipsam sed eligendi laudantium adipisci maxime dolore perspiciatis!</p><br><p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Porro dignissimos, quis, beatae maxime neque illo ipsum cumque doloremque harum culpa, optio similique alias? Vel ipsa dolores commodi nulla magni, omnis, reiciendis quibusdam, nobis quia reprehenderit quod nihil doloribus neque! Adipisci, illum! Dolorum voluptas tenetur obcaecati laudantium sunt distinctio delectus ipsa omnis quas, aliquam cumque itaque quo. Molestiae quam quidem amet.</p>'
        ]);

        Product::create([
            'name' => 'Gigabyte B450M DS3H V2',
            'slug' => 'gigabyte-b450m-ds3h-v2',
            'gallery_id' => '3',
            'price' => '1300000',
            'discounted_price' => '1200000',
            'weight_in_grams' => '1500',
            'category_id' => '4',
            'brand_id' => '3',
            'description' => '<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quas voluptate et repellat minima dolores ratione quos quae similique aliquid praesentium enim necessitatibus, animi aliquam quaerat reprehenderit nihil earum nisi inventore quasi corporis eum at possimus. Molestias perferendis quod quae corporis, enim dolor ipsam sed eligendi laudantium adipisci maxime dolore perspiciatis!</p><br><p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Porro dignissimos, quis, beatae maxime neque illo ipsum cumque doloremque harum culpa, optio similique alias? Vel ipsa dolores commodi nulla magni, omnis, reiciendis quibusdam, nobis quia reprehenderit quod nihil doloribus neque! Adipisci, illum! Dolorum voluptas tenetur obcaecati laudantium sunt distinctio delectus ipsa omnis quas, aliquam cumque itaque quo. Molestiae quam quidem amet.</p>'
        ]);

        Gallery::create(['product_id' => '1']);
        Gallery::create(['product_id' => '2']);
        Gallery::create(['product_id' => '3']);

        Picture::create([
            "name" => "/storage/img/products/rtx3090(1).jpg",
            "gallery_id" => "1"
        ]);
        Picture::create([
            "name" => "/storage/img/products/rtx3090(2).jpg",
            "gallery_id" => "1"
        ]);
        Picture::create([
            "name" => "/storage/img/products/rtx3090(3).jpg",
            "gallery_id" => "1"
        ]);

        Picture::create([
            "name" => "/storage/img/products/ryzen5(1).jpg",
            "gallery_id" => "2"
        ]);
        Picture::create([
            "name" => "/storage/img/products/ryzen5(2).jpg",
            "gallery_id" => "2"
        ]);
        Picture::create([
            "name" => "/storage/img/products/ryzen5(3).jpg",
            "gallery_id" => "2"
        ]);

        Picture::create([
            "name" => "/storage/img/products/b450m(1).jpg",
            "gallery_id" => "3"
        ]);
        Picture::create([
            "name" => "/storage/img/products/b450m(2).jpg",
            "gallery_id" => "3"
        ]);
        Picture::create([
            "name" => "/storage/img/products/b450m(3).jpg",
            "gallery_id" => "3"
        ]);
    }
}
