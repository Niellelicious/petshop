<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class petshopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for($i=0;$i<100;$i++)
        {
            DB::table('petshop')->insert([
                'produk' => $faker->word(),
                'kategori' => $faker->word(),
                'stok' => $faker->randomNumber(5, false),
                'gambar' => $faker->ipv4(),
            ]);
        }
    }
}
