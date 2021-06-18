<?php

namespace Database\Seeders;

use App\Models\Brand;
use Database\Factories\BrandFactory;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Brand::factory()->count(100)->create();
    }
}
