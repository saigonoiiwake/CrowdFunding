<?php

use Illuminate\Database\Seeder;
use App\ProjectOwner;

class ProjectOwnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('project_owner')->insert([
            'user_id' => 42996400,
            'project_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
