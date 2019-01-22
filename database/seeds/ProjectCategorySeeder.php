<?php

use Illuminate\Database\Seeder;
use App\ProjectCategory;

class ProjectCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('project_category')->insert([
            'category' => 'language',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('project_category')->insert([
            'category' => 'workout',
            'created_at' => now(),
            'updated_at' => now()
        ]);
  
    }
}
