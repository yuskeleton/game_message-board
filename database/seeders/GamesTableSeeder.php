<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GamesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('games')->insert([
            'category_id' => 1,
            'name' => 'APEX',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
         DB::table('games')->insert([
            'category_id' => 2,
            'name' => 'VALORANT',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
           DB::table('games')->insert([
            'category_id' => 2,
            'name' => 'Overwatch',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

       
    }
}