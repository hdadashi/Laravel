<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    
    public function run()
    {
        DB::table("products")->insert([
            "title" => "Notebook Intel Core i3 7th Gen 4GB RAM",
            "amount" => 2700,
            "description" => "Thank you for using my words in your work. I don't need a big house, just a two-floor condo - you could say I have lofty expectations. Logan Ipsum will loop at some point. I'm in a band that does Metallica covers with our private parts - it's called Myphallica. Petrovache. I have never known a Jack that was in good enough shape to name bodybuilding after him.",
            "thumbs" => json_encode(["image1" => "notebook.webp"]),
            "category" => "Eletrônicos"
        ]);
    }
}
