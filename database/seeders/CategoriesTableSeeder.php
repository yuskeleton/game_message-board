<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'FPS',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
         DB::table('categories')->insert([
            'name' => 'TPS',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}