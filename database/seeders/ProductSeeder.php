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
            "title" => "Produto teste",
            "amount" => 1500.0,
            "description" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro saepe quisquam sit et, expedita nemo excepturi laboriosam commodi eveniet quis err!",
            "thumbs" => json_encode(["image1" => "1245257dsd242.jpg", "image2" => "1234567890.jpg"]),
            "category" => "Eletronicos"
        ]);
    }
}
