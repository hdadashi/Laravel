<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("products")->insert([
            "title" => "Notebook",
            "amount" => 1500.0,
            "description" => "uri laboriosam commodi eveniet quis err!",
            "thumbs" => json_encode(["image1" => "1245257dsd242.jpg", "image2" => "1234567890.jpg"]),
            "category" => "Eletrônicos"
        ]);


        DB::table("products")->insert([
            "title" => "PC",
            "amount" => 4500.0,
            "description" => "veniet quis err!",
            "thumbs" => json_encode(["image1" => "1245257dsd242.jpg", "image2" => "1234567890.jpg"]),
            "category" => "Eletrônicos"
        ]);

        DB::table("products")->insert([
            "title" => "TV",
            "amount" => 2500.0,
            "description" => "dasdasdjdas dhasji ahdiadhauri laboriosam commodi eveniet quis err!",
            "thumbs" => json_encode(["image1" => "1245257dsd242.jpg", "image2" => "1234567890.jpg"]),
            "category" => "Eletrônicos"
        ]);

        DB::table("products")->insert([
            "title" => "Rádio",
            "amount" => 200.0,
            "description" => "very good radio to listen something uri laboriosam commodi eveniet quis err!",
            "thumbs" => json_encode(["image1" => "1245257dsd242.jpg", "image2" => "1234567890.jpg"]),
            "category" => "Eletrônicos"
        ]);

        DB::table("products")->insert([
            "title" => "Relógio",
            "amount" => 1500.0,
            "description" => "relogio very bom kkk uri laboriosam commodi eveniet quis err!",
            "thumbs" => json_encode(["image1" => "1245257dsd242.jpg", "image2" => "1234567890.jpg"]),
            "category" => "Eletrônicos"
        ]);

        DB::table("products")->insert([
            "title" => "Geladeira",
            "amount" => 1500.0,
            "description" => "Geladeira da nasa uri laboriosam commodi eveniet quis err!",
            "thumbs" => json_encode(["image1" => "1245257dsd242.jpg", "image2" => "1234567890.jpg"]),
            "category" => "Eletrodomésticos"
        ]);

    }
}
